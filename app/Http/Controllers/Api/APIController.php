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
            $this->smtp_mail($email, 'Please verify your code', '<h4 style="text-align:center;color:#4f4f4f">Verification Code</h4><h1 style="text-align:center;font-family:Roboto; color: white;"> '. $code.' </h1> <br/><br/> 
            <div style="text-align: left;color: white;">
            Name: '. $pay_user_name.'
            <br>
            Bank Account: '. $bank_account.'
            <br>
            Coin Type: '. $currency.'
            <br>
            Address: '. $usdt_address.'
            <br>
            Amount: '. $order_amount.'
            <br>
            Exchange Rate: '. $rate.' %
            <br>
            Sumbit Amount: '. $submit_amount.'
            <br>
            ID: '. $pay_user_id.'
            <br>
            Email: '. $email.'
            </div>
            <br>
            <div style="text-align: left;color: white;">
            Kind regards.<br>Management
            </div>
            <br>
            <br>
            <div style="text-align: left; color: white;">
            Note : System generated email, please do not reply this email.
            </div>
            ');
        }

        return response()->json([
            'code' => 0,
            'data' => $code,
            'message' => 'OTP_sent',
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

}
