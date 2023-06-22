<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserOtpCode;
use DB;
use Illuminate\Http\Request;

//project model//
class APIController extends Controller
{
    public function test(Request $request)
    {

        return $this->smtp_mail('seikyusiang@gmail.com', 'Title', '<h1>CONGRATULATIONS!</h1>body
        <br><br>Username :123
        <br>Password :321
        <br><a href="https://fizz.greatwallsolution.com/">https://fizz.greatwallsolution.com/</a>
            <br><br>
            Kind regards.<br> Management<br><br><br>Note : System generated email, please do not reply this email.');
        exit;
       
    }
    public function requestEmailOtp(Request $request)
    {
       
        $email = $request->get('email');
        $rate = $request->get('rate');
        $pay_user_name = $request->get('pay_user_name');
        $pay_user_id = $request->get('pay_user_id');
        $bank_account = $request->get('bank_account');
        $currency = $request->get('currency');
        $phone = $request->get('phone');
        $usdt_address = $request->get('usdt_address');
        $order_amount = $request->get('order_amount');
        $submit_amount = $request->get('submit_amount');

        if(empty($email)){
            return $this->jsonResponse([
                'code' => 1,
                'message' => __('site.email_empty'),
            ]);
        }
        $code = mt_rand(100000, 999999);
   
        $r = UserOtpCode::updateOrCreate([
            'email' => $request->get('email'),
        ], [
            'code' => $code,
            'expiry_date' => now()->addMinutes(5),
        ]);
        if($r){
            $this->smtp_mail($email, '请验证您的验证码', '<h4 style="text-align:center;color:#cbcbcb">Verification Code</h4><h1 style="text-align:center;font-family:Roboto; color: white;"> '. $code.' </h1> <br/><br/> 
            <div style="text-align: left;color: white!important;">
            转款人姓名: '. $pay_user_name.'
            <br>
            银行账号: '. $bank_account.'
            <br>
            币种: '. $currency.'
            <br>
            收款方地址: '. $usdt_address.'
            <br>
            需付金额: '. $order_amount.' RMB
            <br>
            汇率: '. $rate.' 
            <br>
            提交金额: '. $submit_amount.' USD
            <br>
            收款方 ID: '. $pay_user_id.'
            <br>
            邮箱地址: '. $email.'
            </div>
            <br>
            <div style="text-align: left;color: white!important;">
            亲切的问候。<br> FIZZ 团队管理
            </div>
            <br>
            <br>
            <div style="text-align: left; color: white!important;">
            注意：系统生成的邮件，请不要回复此邮件。
            </div>
            ');
        }

        return response()->json([
            'code' => 0,
            'data' => $code,
            'message' => 'OTP_sent',
        ]);

    }

    public function successEmail()
    {
        

        $this->smtp_mail(["chienming9895@gmail.com", "chienmingwoo@gmail.com"], '订单支付成功', '
        Order No: qq
        <br>
        Amount: aa
        <br>
        USDT Amount: aa
        </div>
        <br>
        <div style="text-align: left;color: white!important;">
        亲切的问候。<br> FIZZ 团队管理
        </div>
        <br>
        <br>
        <div style="text-align: left; color: white!important;">
        注意：系统生成的邮件，请不要回复此邮件。
        </div>
        ');
        

        return response()->json([
            'code' => 0,
            'message' => 'Email_sent',
        ]);

    }

    public function checkOTP(Request $request){

        $email = $request->get('email');

        $otp = UserOtpCode::where([
            'email' => $email,
            'code' => $request->get('otp'),
        ])->first();

        if ($otp) {
            $otp = UserOtpCode::where([
                'email' => $email,
                'code' => $request->get('otp'),
            ])->delete();
            return response()->json([
                'code' => 0,
                'message' => 'OTP_OK',
            ]);
        } else {
            return response()->json([
                'code' => 1,
                'message' => 'INCORRECT_OTP',
            ]);
        }
    }


    public function get_rate()
    {
        $rate = DB::table('global_setting')->where('global_key', 'EXCHANG_RATE')->first();

        return [
            'admin_rate' => $rate->key_value,
        ];
    }

}
