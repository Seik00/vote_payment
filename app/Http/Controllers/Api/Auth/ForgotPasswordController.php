<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\GlobalCountry;
use App\Models\UserOtpCode;
use App\User;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
     */
    //use SendsPasswordResetEmails;
    /**
     * @OA\POST(
     *     path="/api/auth/check-otp",
     *     tags={"Auth"},
     *     summary="send otp",
     *     description="check otp",
     *     operationId="checkOtp",
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="mobile_no",
     *         in="query",
     *         description="mobile_no without +60",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     * *     @OA\Parameter(
     *         name="otp",
     *         in="query",
     *         description="otp",
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
    public function checkOtp(Request $request)
    {
        $this->validate($request, [
            'mobile_no' => 'required',
            'otp' => 'required',
        ]);

        $country = GlobalCountry::where('id', $request->get('country_id'))->first();

        $code = mt_rand(100000, 999999);
        $r = UserOtpCode::where([
            'code' => $request->get('otp'),
            'contact_number' => $request->get('mobile_no'),
        ])->first();

        if (!$r) {
            return $this->jsonResponse([
                'code' => 2,
                'message' => 'Incorrect_otp',
            ]);
        } else {
            return response()->json([
                'code' => 0,
                'data' => $code,
                'message' => 'OTP_OK',
            ]);

        }

    }
    /**
     * @OA\POST(
     *     path="/api/auth/request-otp",
     *     tags={"Auth"},
     *     summary="send otp",
     *     description="request otp with number",
     *     operationId="requestOtp",
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="mobile_no",
     *         in="query",
     *         description="mobile_no without +60",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     * *     @OA\Parameter(
     *         name="country_id",
     *         in="query",
     *         description="country_id",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *  *      @OA\Parameter(
     *         name="lang",
     *         in="query",
     *         description="cn/en",
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
    public function requestOtp(Request $request)
    {
        $this->validate($request, [
            'mobile_no' => 'required',
            'country_id' => 'required',
        ]);

        $country = GlobalCountry::where('id', $request->get('country_id'))->first();

        $code = mt_rand(100000, 999999);
        $r = UserOtpCode::updateOrCreate([
            'user_id' => 0,
            'contact_number' => $request->get('mobile_no'),
        ],
            [
                'code' => $code,
                'expiry_date' => now()->addMinutes(5),
            ]);

        //Juhesms::send_sms(str_replace("+", "", $country->country_code),  $request->get('mobile_no'), $code, $request->get('lang'));

        return response()->json([
            'code' => 0,
            'data' => $code,
            'message' => 'OTP_sent',
        ]);

    }
    public function requestEmailOtp(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',

        ]);
        $user = User::where('username', $request->get('username'))->first();
        $code = mt_rand(100000, 999999);
        if ($user) {
            $r = UserOtpCode::updateOrCreate([
                'user_id' => $user->id,
                'contact_number' => $request->get('username'),
            ], [
                'code' => $code,
                'expiry_date' => now()->addMinutes(5),
            ]);
            $email = $user->email;
            $this->smtp_mail($email, 'Forget Password', 'Your Otp code is ' . $code);
        }

        //Juhesms::send_sms(str_replace("+", "", $country->country_code),  $request->get('mobile_no'), $code, $request->get('lang'));

        return response()->json([
            'code' => 0,
            'data' => $code,
            'message' => 'OTP_sent',
        ]);

    }
    //use SendsPasswordResetEmails;
    /**
     * @OA\POST(
     *     path="/api/auth/request-user-otp",
     *     tags={"Auth"},
     *     summary="send otp",
     *     description="request otp with username",
     *     operationId="requestUserOtp",
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="username",
     *         in="query",
     *         description="username",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *  *      @OA\Parameter(
     *         name="lang",
     *         in="query",
     *         description="cn/en",
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
    public function requestUserOtp(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();
        if (!$user) {
            return $this->jsonResponse([
                'code' => 2,
                'message' => 'INCORRECT_USERNAME',
            ]);
        }
        if (!$user->contact_number) {
            return $this->jsonResponse([
                'code' => 2,
                'message' => 'USER_NO_MOBILE',
            ]);
        }

        $country = GlobalCountry::where('id', $user->country_id)->first();

        $code = mt_rand(100000, 999999);
        $r = UserOtpCode::updateOrCreate([
            'user_id' => $user->id,
        ],
            [
                'contact_number' => $user->contact_number,
                'code' => $code,
                'expiry_date' => now()->addMinutes(5),
            ]);

        //Juhesms::send_sms(str_replace("+", "", $country->country_code), $user->contact_number, $code, $request->get('lang'));

        return response()->json([
            'code' => 0,
            'data' => null,
            'message' => 'OTP_sent',
        ]);

    }
    /**
     * @OA\POST(
     *     path="/api/auth/reset-password",
     *     tags={"Auth"},
     *     summary="send otp",
     *     description="request user otp",
     *     operationId="resetPassword",
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="username",
     *         in="query",
     *         description="username",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="passcode",
     *         in="query",
     *         description="otp",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="password",
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
    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'passcode' => 'required|numeric',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();
        if (!$user) {
            return $this->jsonResponse([
                'code' => 2,
                'message' => 'INCORRECT_USERNAME',
            ]);
        }

        $otp = UserOtpCode::where([
            'user_id' => $user->id,
            'code' => $request->get('passcode'),
        ])->first();

        if (!$otp) {
            return $this->jsonResponse([
                'code' => 2,
                'message' => 'Incorrect_otp',
            ]);
        }

        $otp->delete();
        $user->d_password = $request->password;
        $user->password = bcrypt($request->password);
        $user->save();

        return $this->jsonResponse([
            'code' => 0,
            'data' => true,
            'message' => 'Password_reset_success',
        ]);

    }
}
