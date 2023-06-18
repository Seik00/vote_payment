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
            Name: 123
            <br>
            Bank Account: 000
            <br>
            Coin Type: TRC20
            <br>
            Address: 321
            <br>
            Amount: 123
            <br>
            Exchange Rate: 7%
            <br>
            Sumbit Amount: 321
            <br>
            ID: 123
            <br>
            Email: test@gmail.com
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
