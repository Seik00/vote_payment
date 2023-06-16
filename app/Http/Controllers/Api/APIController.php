<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserOtpCode;
use App\User;
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
       
        $code = mt_rand(100000, 999999);
   
        $r = UserOtpCode::updateOrCreate([
            'email' => $request->get('email'),
        ], [
            'code' => $code,
            'expiry_date' => now()->addMinutes(5),
        ]);
        $email = $request->get('email');
        if($r){
            $this->smtp_mail('seikyusiang@gmail.com', 'Please verify your code', '<h4>Verification Code</h4> <br/> <h1> '. $code.' </h1> <br/><br/> 
            Username :123
            <br>Password :321
            <br><a href="https://fizz.greatwallsolution.com/">https://fizz.greatwallsolution.com/</a>
                <br><br>
                Kind regards.<br> Management<br><br><br>Note : System generated email, please do not reply this email.');
        }

        return response()->json([
            'code' => 0,
            'data' => $code,
            'message' => 'OTP_sent',
        ]);

    }

}
