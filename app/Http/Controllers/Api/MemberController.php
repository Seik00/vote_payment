<?php
namespace App\Http\Controllers\Api;

use App\Helper\Bonus;
use App\Http\Controllers\Controller;
use App\Models\DynamicBonus;
use App\Models\GlobalCountry;
use App\Models\ProductRedeem;
use App\Models\SpecialBonus;
use App\Models\StaticBonus;
use App\Models\Ticket;
use App\Models\UserAddress;
use App\Models\UserBank;
use App\Models\UserGroup;
use App\Models\UserPackage;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;

//project model//
class MemberController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/member/home-page",
     *     tags={"Member"},
     *     summary="",
     *     description="Home page",
     *     operationId="homepage",
     *     deprecated=false,
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="successful operation"
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(
     *         response=422,
     *         description="Error"
     *     )
     * )
     */
    public function homePage(Request $request)
    {
        $user = auth()->user();
        $total_asset = $user->point1;
        $bonus_type = $this->bonus_type();

        $static_today = StaticBonus::where('user_id', auth()->user()->id)->whereDate('created_at', date('Y-m-d'))->sum('founds');

        //$sponsor_total = SponsorBonus::where('user_id',auth()->user()->id)->orderBy('id', 'desc')->paginate(10);
        $dynamic_today = DynamicBonus::where('user_id', auth()->user()->id)->whereDate('created_at', date('Y-m-d'))->sum('founds');
        $special_today = SpecialBonus::where('user_id', auth()->user()->id)->whereDate('created_at', date('Y-m-d'))->sum('founds');
        $static = StaticBonus::where('user_id', auth()->user()->id)->sum('founds');
        //$sponsor_total = SponsorBonus::where('user_id',auth()->user()->id)->paginate(10);
        $dynamic = DynamicBonus::where('user_id', auth()->user()->id)->sum('founds');
        $special = SpecialBonus::where('user_id', auth()->user()->id)->sum('founds');
        $total_income = $static + $dynamic + $special;
        $total_income_today = $static_today + $dynamic_today + $special_today;
        $country = GlobalCountry::where('id', $user->country_id)->first();
        $total_asset_currency = $total_asset * $country->buy;
        $notice = Ticket::where([
            'user_id' => $user->id,
            'user_read' => 0,
        ])->count();

        return $this->jsonResponse([
            'code' => 0,
            'data' => [
                'total_asset' => number_format($total_asset, 2, '.', ''),
                'total_asset_currency' => $country->short_form . ' ' . number_format($total_asset_currency, 2, '.', ''),
                'total_income' => number_format($total_income, 2, '.', ''),
                'total_income_today' => number_format($total_income_today, 2, '.', ''),
                'static_bonus' => number_format($static, 2, '.', ''),
                'special_bonus' => number_format($special, 2, '.', ''),
                'dynamic_bonus' => number_format($dynamic, 2, '.', ''),
                'notice' => $notice,
            ],
            'message' => '',
        ]);
    }
    public function changeIcon(Request $request)
    {
        $this->validate($request, [
            'icon' => 'required',
        ]);
        $user = auth()->user();
        $user->icon = $request->get('icon');
        $user->save();

        return $this->jsonResponse([
            'code' => 0,
            'data' => $user,
            'message' => 'REQUEST_COMPLETE',
        ]);
    }
    /**
     * @OA\Get(
     *     path="/api/member/get-member-info",
     *     tags={"Member"},
     *     summary="",
     *     description="member info",
     *     operationId="getMemberInfo",
     *     deprecated=false,
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="successful operation"
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(
     *         response=422,
     *         description="Error"
     *     )
     * )
     */
    public function getMemberInfo(Request $request)
    {
        $user = auth()->user();
        $user->team = DB::table('u_all')->where('p', 'like', '%' . $user->id . '%')->count('user_id');
        $active = DB::select(DB::raw("SELECT count('id') as total FROM users WHERE id in (select user_id from u_all where p like '%" . $user->id . "%') "));
        $user->active_downline = $active[0]->total;
        return $this->jsonResponse([
            'code' => 0,
            'data' => $user,
            'message' => '',
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/member/change-password",
     *     tags={"Member"},
     *     summary="change password ",
     *     description="change password",
     *     operationId="changePassword",
     *     deprecated=false,
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="password",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *  *     @OA\Parameter(
     *         name="old_password",
     *         in="query",
     *         description="old_password",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *  *     @OA\Parameter(
     *         name="password_confirmation",
     *         in="query",
     *         description="password_confirmation",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     security={ {"bearerAuth": {}} },
     *     @OA\Response(
     *         response=200,
     *         description="successful operation"
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(
     *         response=422,
     *         description="Error"
     *     )
     * )
     */
    public function changePassword(Request $request)
    {
        Validator::validate($request->all(), [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'old_password' => 'required',
        ]);

        $user = auth()->user();
        if (!Hash::check($request->get('old_password'), $user->password)) {
            return $this->jsonResponse([
                'code' => 1,
                'data' => false,
                'message' => 'INCORRECT_PASSWORD',
            ]);
        }
        $user->password = bcrypt($request->get('password'));
        $user->d_password = $request->get('password');
        $user->save();
        return $this->jsonResponse([
            'code' => 0,
            'data' => $user,
            'message' => 'REQUEST_COMPLETE',
        ]);
    }
    /**
     * @OA\Post(
     *     path="/api/member/set-secpassword",
     *     tags={"Member"},
     *     summary="set sec password ",
     *     description="set sec password",
     *     operationId="setSecPassword",
     *     deprecated=false,
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="password",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *  *     @OA\Parameter(
     *         name="password_confirmation",
     *         in="query",
     *         description="password_confirmation",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     security={ {"bearerAuth": {}} },
     *     @OA\Response(
     *         response=200,
     *         description="successful operation"
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(
     *         response=422,
     *         description="Error"
     *     )
     * )
     */
    public function setSecPassword(Request $request)
    {
        Validator::validate($request->all(), [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = auth()->user();
        $user->password2 = bcrypt($request->get('password'));
        $user->d_password2 = $request->get('password');
        $user->save();

        return $this->jsonResponse([
            'code' => 0,
            'data' => $user,
            'message' => 'REQUEST_COMPLETE',
        ]);
    }
    /**
     * @OA\Post(
     *     path="/api/member/change-secpassword",
     *     tags={"Member"},
     *     summary="change sec password ",
     *     description="change sec password",
     *     operationId="changeSecPassword",
     *     deprecated=false,
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="password",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *  *     @OA\Parameter(
     *         name="sec_password",
     *         in="query",
     *         description="sec_password",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *  *     @OA\Parameter(
     *         name="password_confirmation",
     *         in="query",
     *         description="password_confirmation",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     security={ {"bearerAuth": {}} },
     *     @OA\Response(
     *         response=200,
     *         description="successful operation"
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(
     *         response=422,
     *         description="Error"
     *     )
     * )
     */
    public function changeSecPassword(Request $request)
    {
        Validator::validate($request->all(), [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'sec_password' => 'required',
        ]);

        $user = auth()->user();
        $error = $this->check_secpass($request->get('sec_password'));
        if ($error) {
            return $error;
        }

        $user->password2 = bcrypt($request->get('password'));
        $user->d_password2 = $request->get('password');
        $user->save();

        return $this->jsonResponse([
            'code' => 0,
            'data' => $user,
            'message' => 'REQUEST_COMPLETE',
        ]);
    }
    /**
     * @OA\Post(
     *     path="/api/member/register-member",
     *     tags={"Member"},
     *     summary="Register member",
     *     description="Register member",
     *     operationId="Register member",
     *      security={{"bearerAuth":{}}},
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="username",
     *         in="query",
     *         description="username",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="user_group",
     *         in="query",
     *         description="package id",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="country_id",
     *         in="query",
     *         description="country_id",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="email",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="contact_number",
     *         in="query",
     *         description="contact_number",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="password",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="password_confirmation",
     *         in="query",
     *         description="password_confirmation",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *  *     @OA\Parameter(
     *         name="sec_password",
     *         in="query",
     *         description="sec_password",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="ref_id",
     *         in="query",
     *         description="ref_id",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="jid",
     *         in="query",
     *         description="jid now no need",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *  *      @OA\Parameter(
     *         name="group_type",
     *         in="query",
     *         description="A ==left /B == right",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="pay_type",
     *         in="query",
     *         description="point1/point1&pin",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error"
     *     )
     * )
     */
    public function registerMember(Request $request)
    {
        Validator::validate($request->all(), [
            'username' => 'required',
            'fullname' => 'required',
            'ic' => 'required',
            'user_group' => 'required',
            'country_id' => 'required',
            'contact_number' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'sec_password' => 'required',
            'ref_id' => 'required',
        ]);
        $user = auth()->user();
        $error = $this->check_secpass($request->get('sec_password'));
        if ($error) {
            return $error;
        }
        $check_limit = User::where('ic', $request->get('ic'))->count();
        if ($check_limit >= 3) {
            return $this->jsonResponse([
                'code' => 1,
                'data' => false,
                'message' => 'REACHED_MAXIMUM',
            ]);
        }

        if ($request->get('user_group')) {
            $package = UserGroup::where('display', 1)->where('id', '=', $request->get('user_group'))->first();

            if (!$package) {
                return $this->jsonResponse([
                    'code' => 1,
                    'data' => false,
                    'message' => 'INCORRECT_PACKAGE',
                ]);
            }
        }
        // check member existed by username and email
        $username = $request->get('username');
        $email = $request->get('email');
        $existedUser = User::where('username', $username)->first();
        if ($existedUser) {
            return $this->jsonResponse([
                'code' => 2,
                'data' => false,
                'message' => 'MEMBER_EXITS',
            ]);
        }

        // extract user data, hash password and trim contact number
        $userData = $request->only('username', 'fullname', 'contact_number', 'ic', 'email', 'password', 'country_id');
        $userData['password'] = bcrypt($request->password);
        $userData['role_id'] = 2;
        $userData['user_group_id'] = $package->id;
        $userData['d_password'] = $request->password;
        $ref = User::where('username', $request->ref_id)->first();
        if ($ref) {

            $userData['pid'] = $ref->id;
            $userData['p_level'] = $ref->p_level + 1;
        } else {
            return $this->jsonResponse([
                'code' => 2,
                'data' => false,
                'message' => 'INCORRECT_SPONSOR',
            ]);
        }

        $request->merge($this->find_end($ref->id, $request->get('group_type')));
        $juser = User::where('username', $request->get('jid'))->first();
        $error = '';
        if (empty($juser)) {
            $juser = User::where('id', $request->get('jid'))->first();
            if (empty($juser)) {
                $error = 'PLACEMENT_USER_ERROR';
            }
        }
        if ($juser) {
            if ($request->get('group_type') == 'A' && $juser->group_left != 0) {
                $error = 'PLACEMENT_GOT_USER';
            } elseif ($request->get('group_type') == 'B' && $juser->group_right != 0) {
                $error = 'PLACEMENT_GOT_USER';
            }
        }
        if ($request->get('group_type') == 'A') {
            $userData['group_type'] = 'A';
            $group = 'group_left';
        } elseif ($request->get('group_type') == 'B') {
            $userData['group_type'] = 'B';
            $group = 'group_right';
        } else {
            $error = 'PLACEMENT_GOT_USER';
        }
        /*if ($juser->group_left == 0) {
        $userData['group_type'] = 'A';
        $group = 'group_left';
        } elseif ($juser->group_right == 0) {
        $userData['group_type'] = 'B';
        $group = 'group_right';
        } else {
        $error = 'PLACEMENT_GOT_USER';
        }*/
        if ($request->get('country_id') == 2) {
            $pay = $package->price; // - $currect->price;
        } else {
            $pay = $package->international_price; // - $currect->price;
        }

        if ($request->get('pay_type') == 'point3') {
            $wallet = 'point3';
            $wallet_type = 3;
            $pay1 = $pay;
            $wallet2 = 'point2';
            $wallet_type2 = 2;
            $pay2 = 0;

        } elseif ($request->get('pay_type') == 'point3&pin') {
            $wallet = 'point3';
            $wallet_type = 3;
            $pay1 = $pay * 0.5;
            $wallet2 = 'pin';
            $wallet_type2 = 10;
            $pay2 = $pay * 0.5;

        } else {
            $error = 'INSUFFICIAN_BALANCE';
        }

        if ($user->$wallet < $pay1 || $user->$wallet2 < $pay2) {
            $error = 'INSUFFICIAN_BALANCE';
        }

        if ($error) {
            return $this->jsonResponse([
                'code' => 2,
                'data' => false,
                'message' => $error,
            ]);
        }

        $userData['jid'] = $juser->id;
        $userData['j_level'] = $juser->j_level + 1;

        // create user base on submitted data
        $new = User::create($userData);

        /* update placement*/
        $juser->$group = $new->id;
        $juser->save();
        DB::select('call rw102("' . $new->id . '")');
        $email = $new->email;
        if ($email) {
            $this->smtp_mail($email, 'Welcome to Rifineria Resources', '<h1>CONGRATULATIONS!</h1>Your Rifineria account has been set up successfully and you are able to log in using the details below. Please keep your login details safe for future reference.
            <br>

            <p style="color:black;margin-bottom:-10px;"><span>Username</span> <span>:</span><span style="margin-left: 5px;">' . $new->username . '</span></p>

            <p style="color:black"><span>Password</span> <span style="margin-left: 5px;">:</span><span style="margin-left: 5px;">' . $new->d_password . '</span></p>

            <br><a href="https://rifineria.com/" style="padding: 13px;background: #980102;border-radius: 5px;color: white;text-decoration: none;">Login me in Rifineria</a>
                <br><br>
                <p style="color:black;">
                    Kind regards.<br/> Rifineria Resources Management
                </p>
                <p style="color:black;">
                    Note : System generated email, please do not reply this email.
                </p>'
            );
        }

        if ($package->price > 0) {
            $record['user_id'] = $new->id;
            $record['user_group_id'] = $package->id;
            $record['price'] = $package->price;
            $record['bv'] = $package->bv;
            $record['pay'] = $pay;
            $record['pay_type'] = $wallet;
            $user_package = UserPackage::create($record);

            for ($i = 0; $i < $package->package_get; $i++) {
                $redeem['user_id'] = $new->id;
                $redeem['user_package_id'] = $user_package->id;

                ProductRedeem::create($redeem);
            }

            $this->create_transaction($user->id, '-', $wallet, 11, $wallet_type, $pay1, $userData['username'] . ',购买配套' . $package->package_name, 'Purchase Of New ' . $package->package_name_en . ' Package By = ' . $userData['username'], $userData['username'] . ',Beli paket ' . $package->package_name_en);
            if ($pay2 > 0) {
                $this->create_transaction($user->id, '-', $wallet2, 11, $wallet_type2, $pay2, $userData['username'] . ',购买配套' . $package->package_name, 'Purchase Of New ' . $package->package_name_en . ' Package By = ' . $userData['username'], $userData['username'] . ',Beli paket ' . $package->package_name_en);
            }

            DB::select('call sendBV("' . $new->id . '","' . $package->bv . '")');
            Bonus::sponsor_bonus($new->id, $package->bv);
        }

        return $this->jsonResponse([
            'code' => 0,
            'data' => true,
            'message' => 'REQUEST_COMPLETE',
        ]);

    }
    /**
     * @OA\Post(
     *     path="/api/member/user-bank",
     *     tags={"Member"},
     *     summary="set user bank ",
     *     description="set user bank",
     *     operationId="userBank",
     *     deprecated=false,
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="sec_password",
     *         in="query",
     *         description="sec_password",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *  *     @OA\Parameter(
     *         name="bank_country",
     *         in="query",
     *         description="country id",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="bank_name",
     *         in="query",
     *         description="",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *          name="bank_user",
     *         in="query",
     *         description="",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *  @OA\Parameter(
     *          name="bank_number",
     *         in="query",
     *         description="",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ), @OA\Parameter(
     *          name="branch",
     *         in="query",
     *         description="",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),@OA\Parameter(
     *          name="swift_code",
     *         in="query",
     *         description="",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     security={ {"bearerAuth": {}} },
     *     @OA\Response(
     *         response=200,
     *         description="successful operation"
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(
     *         response=422,
     *         description="Error"
     *     )
     * )
     */
    public function userBank(Request $request)
    {
        Validator::validate($request->all(), [
            'sec_password' => 'required',
            'bank_country' => 'required',
            'bank_name' => 'required',
            'bank_user' => 'required',
            'bank_number' => 'required',
            'branch' => 'required',
        ]);
        $error = $this->check_secpass($request->get('sec_password'));
        if ($error) {
            return $error;
        }
        $user = auth()->user();
        $record = $request->only(
            'amount',
            'bank_country',
            'bank_name',
            'bank_user',
            'bank_number',
            'branch',
            'swift_code');
        $r = UserBank::updateOrCreate(['user_id' => $user->id], $record);
        return $this->jsonResponse([
            'code' => 0,
            'data' => $r,
            'message' => 'REQUEST_COMPLETE',
        ]);
    }
    /**
     * @OA\get(
     *     path="/api/member/get-bank-info",
     *     tags={"Member"},
     *     summary="get user bank ",
     *     description="get user bank",
     *     operationId="getBankInfo",
     *     deprecated=false,
     *     security={{"bearerAuth":{}}},
     *     security={ {"bearerAuth": {}} },
     *     @OA\Response(
     *         response=200,
     *         description="successful operation"
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(
     *         response=422,
     *         description="Error"
     *     )
     * )
     */
    public function getBankInfo(Request $request)
    {
        $user = auth()->user();

        $bank = UserBank::where('user_id', $user->id)->first();
        return $this->jsonResponse([
            'code' => 0,
            'data' => $bank,
            'message' => 'REQUEST_COMPLETE',
        ]);
    }
    /**
     * @OA\Post(
     *     path="/api/member/update-member-info",
     *     tags={"Member"},
     *     summary="update user info ",
     *     description="update user info",
     *     operationId="updateMemberInfo",
     *     deprecated=false,
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="sec_password",
     *         in="query",
     *         description="sec_password",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="country_id",
     *         in="query",
     *         description="country id",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     security={ {"bearerAuth": {}} },
     *     @OA\Response(
     *         response=200,
     *         description="successful operation"
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(
     *         response=422,
     *         description="Error"
     *     )
     * )
     */
    public function updateMemberInfo(Request $request)
    {
        /*Validator::validate($request->all(), [
        'sec_password' => 'required',
        ]);
        $error = $this->check_secpass($request->get('sec_password'));
        if ($error) {
        return $error;
        }*/
        $user = auth()->user();

        if ($request->get('country_id')) {
            $user->country_id = $request->get('country_id');
        }

        $user->save();

        return $this->jsonResponse([
            'code' => 0,
            'data' => $user,
            'message' => 'REQUEST_COMPLETE',
        ]);
    }

    public function updateUserAddress(Request $request)
    {
        /*Validator::validate($request->all(), [
        'sec_password' => 'required',
        ]);
        $error = $this->check_secpass($request->get('sec_password'));
        if ($error) {
        return $error;
        }*/
        $user = auth()->user();
        $data['address'] = $request->get('address');
        $data['poscode'] = $request->get('poscode');
        $data['state'] = $request->get('state');
        $data['ic'] = $request->get('ic');
        $data['fullname'] = $request->get('fullname');
        $deviceToken = UserAddress::updateOrCreate([
            'user_id' => $user->id,
        ], $data);
        return $this->jsonResponse([
            'code' => 0,
            'data' => $user,
            'message' => 'REQUEST_COMPLETE',
        ]);
    }
    public function profileInfo(Request $request)
    {
        $user = auth()->user();

        $bank = UserAddress::where('user_id', $user->id)->first();
        return $this->jsonResponse([
            'code' => 0,
            'data' => $bank,
            'message' => 'REQUEST_COMPLETE',
        ]);
    }
    public function find_end($userid = 99999, $group_type = 'A')
    {
        $position = '';
        $result = array();
        $result['group_type'] = $group_type;
        if ($group_type == 'A') {
            $position = 'group_left';
        } else {
            $position = 'group_right';
        }

        $placement = User::where('id', $userid)->first();

        if ($placement->$position == 0) {
            $result['jid'] = $placement->id;

        } else {
            for ($i = 0; $i < 99; $i++) {
                $placement = User::where('id', $placement->$position)->first();
                if ($placement->$position == 0) {
                    $result['jid'] = $placement->id;
                    break;
                }
            }
        }
        return $result;
    }
}
