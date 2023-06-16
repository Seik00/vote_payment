<?php
namespace App\Http\Controllers\Api;

use App\Helper\Bonus;
use App\Http\Controllers\Controller;
use App\Models\GlobalSetting;
use App\Models\Product;
use App\Models\ProductPurchase;
use App\Models\ProductRedeem;
use App\Models\SystemBank;
use App\User;
use DB;
use Illuminate\Http\Request;

//project model//
class APIController extends Controller
{
    public function test(Request $request)
    {
        $new = User::where('id', 1000000)->first();

        return $this->smtp_mail('seikyusiang@gmail.com', 'Title', '<h1>CONGRATULATIONS!</h1>body
        <br><br>Username : ' . $new->username . '
        <br>Password : ' . $new->d_password . '
        <br><a href="https://fizz.greatwallsolution.com/">https://fizz.greatwallsolution.com/</a>
            <br><br>
            Kind regards.<br> Management<br><br><br>Note : System generated email, please do not reply this email.');
        dump($new);exit;
        //return $user->checkDownline(1000045,'j');
        //DB::select('call sendBV("' . $user->id . '","' . (int)$user->package->bv . '")');
        // $r = Bonus::special_bonus();
        // $r = Bonus::single_static_bonus(1000007);
        // echo $r;
    }
    /**
     * @OA\GET(
     *     path="/api/project/lookup",
     *     tags={"Project"},
     *     summary="get system setting",
     *     description="get notice,system setting",
     *     operationId="lookup",
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
    public function lookup(Request $request)
    {
        $global = GlobalSetting::get()->toArray();

        foreach ($global as $x => $val) {
            $system[$val['global_key']] = $val['key_value'];
        }

        return $this->jsonResponse([
            'code' => 0,
            'data' => [
                'system' => $system,
            ],
            'message' => '',
        ]);
    }
    /**
     * @OA\GET(
     *     path="/api/project/productList",
     *     tags={"Project"},
     *     summary="get product list",
     *     description="get notice,system setting",
     *     operationId="productList",
     *      security={{"bearerAuth":{}}},
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
    public function productList(Request $request)
    {
        $user = auth()->user();

        $product = Product::where('is_display', 1)->get();

        return $this->jsonResponse([
            'code' => 0,
            'data' => [
                'product' => $product,
            ],
            'message' => '',
        ]);
    }
    /**
     * @OA\Post(
     *     path="/api/project/purchaseProduct",
     *     tags={"Project"},
     *     summary="purchaseProduct",
     *     description="Register member",
     *     operationId="submitShareRecord",
     *      security={{"bearerAuth":{}}},
     *     deprecated=false,
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
     *         name="product_id",
     *         in="query",
     *         description="product_id",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="pay_type",
     *         in="query",
     *         description="pay_type",
     *         required=true,
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
    public function purchaseProduct(Request $request)
    {
        $user = auth()->user();
        $error = $this->check_secpass($request->get('sec_password'));
        if ($error) {
            return $error;
        }
        $product = Product::where('id', $request->get('product_id'))->where('is_display', 1)->first();
        if (!$product) {
            return $this->jsonResponse([
                'code' => 2,
                'data' => false,
                'message' => 'Incorrect Product',
            ]);
        }
        $pay = $request->get('quantity') * $product->price;

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
        $r = $this->create_transaction($user->id, '-', $wallet, 10, $wallet_type, $pay1, '购买产品' . $product->product_name, 'Repurchase Of ' . $product->product_name_en . '  Product = ' . $request->get('quantity') . ' Bottle', 'Beli paket ' . $product->product_name_en . ' dengan kuantiti ' . $request->get('quantity'), );
        if ($pay2 > 0) {
            $this->create_transaction($user->id, '-', $wallet2, 11, $wallet_type2, $pay2, '购买产品' . $product->product_name, 'Repurchase Of ' . $product->product_name_en . ' Product = ' . $request->get('quantity') . ' Bottle', 'Beli paket ' . $product->product_name_en . ' dengan kuantiti ' . $request->get('quantity'), );
        }
        ProductRedeem::create([
            'user_id' => $user->id,
            'user_package_id' => 0,
            'product_id' => $product->id,
            'quantity' => $request->get('quantity'),
        ]);
        $purchase = ProductPurchase::create([
            'user_id' => $user->id,
            'pv' => $request->get('quantity') * $product->pv,
            'product_id' => $product->id,
            'quantity' => $request->get('quantity'),
        ]);

        DB::select('call sendBV("' . $user->id . '","' . $purchase->pv . '")');
        $user->today_purchase = 1;
        $user->save();
        // - $currect->price;
        /* if ($request->get('pay_type') == 'point2') {

        } else {

        }*/

        if ($r) {
            return $this->jsonResponse([
                'code' => 0,
                'data' => true,
                'message' => 'REQUEST_COMPLETE',
            ]);
        } else {
            return $this->jsonResponse([
                'code' => 1,
                'data' => false,
                'message' => 'REQUEST_FAIL',
            ]);
        }
    }
    /**
     * @OA\GET(
     *     path="/api/project/get-share-record",
     *     tags={"Project"},
     *     summary="getShareRecord",
     *     description="Register member",
     *     operationId="getShareRecord",
     *      security={{"bearerAuth":{}}},

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

    public function getProductRedeem(Request $request)
    {

        $user = auth()->user();

        $record = ProductRedeem::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(10);

        return $this->jsonResponse([
            'code' => 0,
            'data' => $record,
            'message' => '',
        ]);
    }

    public function getShareRecord(Request $request)
    {

        $user = auth()->user();

        $record = ProjectShare::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(10);

        return $this->jsonResponse([
            'code' => 0,
            'data' => $record,
            'message' => '',
        ]);
    }

    /**
     * @OA\GET(
     *     path="/api/project/get-deposit-bank",
     *     tags={"Project"},
     *     summary="getDepositBank",
     *     description="get deposit bank",
     *     operationId="getDepositBank",
     *      security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="country_id",
     *         in="query",
     *         description="country_id",
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
    public function getDepositBank(Request $request)
    {

        $user = auth()->user();
        if ($request->get('country_id')) {
            $record = SystemBank::where('is_display', 1)->where('bank_country', $request->get('country_id'))->orderBy('id', 'desc')->get();
        } else {
            $record = SystemBank::where('is_display', 1)->orderBy('id', 'desc')->get();
        }

        return $this->jsonResponse([
            'code' => 0,
            'data' => [
                'system_bank' => $record,
            ],
            'message' => '',
        ]);
    }

}
