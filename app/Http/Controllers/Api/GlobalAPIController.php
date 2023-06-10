<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Log;

use App\User;
use App\Models\Notification;

use App\Models\Otp;
use App\Models\UserDevice;

use App\Models\GlobalCountry;

use App\Models\AdoptionCenter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Role;
use DB, Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\ReferenceHelper;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use App\Helper\Juhesms;
use App\Models\UserOtpCode;
use App\Exports\RecordExport;
use Maatwebsite\Excel\Facades\Excel;

class GlobalAPIController extends Controller
{
   
	 
    /**
     * @OA\Post(
     *     path="/api/global/add_device_token",
     *     tags={"Common"},
     *     summary="add_device_token",
     *     description="add_device_token",
     *     operationId="add_device_token",
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="device_token",
     *         in="query",
     *         description="device token",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),  
     *       @OA\Parameter(
     *         name="old_token",
     *         in="query",
     *         description="old device token will remove",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),  
     *      @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         description="User Id if not logined just pass 0",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ), 
     *      @OA\Parameter(
     *         name="os_type",
     *         in="query",
     *         description="HUAWEI,IOS,ANDROID",
     *          required=true,
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
    public function add_device_token(Request $request)
    {
        if ($request->old_token) {
            $token = UserDevice::where('device_token', $request->old_token)->where('user_id', request('user_id'))
                ->update(['device_token' => request('device_token')]);
        } else {
            $token = UserDevice::firstOrCreate([
                'device_token' => request('device_token'),
                'user_id' => request('user_id'),
                'os_type' => request('os_type'),
            ]);
        }
        return response()->json([
            'data' => $token, //do not return otp code
            'status' => true
        ]);
    }
   
    /**
     * @OA\Post(
     *     path="/api/global/banner",
     *     tags={"Common"},
     *     summary="Banner",
     *     description="Use key to get global setting value",
     *     operationId="banner",
     *     deprecated=false,
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
    public function banner(Request $request)
    {

        $value = OnboardingImg::orderBy('id', 'asc')->get();
        $login_banner = GlobalSetting::where('key','=','login_banner')->first();
        $pre_login_wallpaper = GlobalSetting::where('key','=','pre_login_wallpaper')->first();
        $homescreen_wallpaper = GlobalSetting::where('key','=','homescreen_wallpaper')->first();
        return response()->json([
            'banner' => $value,
            'pre_login_wallpaper' => url('storage'.$pre_login_wallpaper->value),
            'login_banner' => url('storage'.$login_banner->value),
            'home_background' => url('storage'.$homescreen_wallpaper->value),
            'status' => true
        ]);
    }
    
    /**
     * @OA\GET(
     *     path="/api/global/country_list",
     *     tags={"Common"},
     *     summary="list of country",
     *     description="list of country",
     *     operationId="country_list",
     *     deprecated=false,
     *      
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
    public function country_list(Request $request)
    {
            
        $country = GlobalCountry::orderByRaw('sort=0, sort ASC')->orderBy('name_en', 'ASC')->get();
        return response()->json([
            'data' => $country, //do not return otp code
            'status' => true
        ]);
    }
    public function testExcel(Request $request)
    {
            $fileName = 'tasks';
            $tasks = User::get()->toarray();
            for($i=0;$i<count($tasks);$i++){
                $record['data'][$i]['id']=$tasks[$i]['id'];
                $record['data'][$i]['username']=$tasks[$i]['username'];
            }
            $record['title']=['tital','username'];
           return  $this->exportExcel( $record['title'], $record['data'], 'testfile');
    }
    /** 
     * @OA\POST(
     *     path="/api/global/sent-otp",
     *     tags={"Common"},
     *     summary="send otp",
     *     description="list of country",
     *     operationId="sentOTP",
     *     deprecated=false,
     *     @OA\Parameter(
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
     *      @OA\Parameter(
     *         name="contact_number",
     *         in="query",
     *         description="contact_number",
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
    public function sentOTP(Request $request)
    {
        Validator::validate($request->all(), [
            'contact_number' => 'required',
        ]);

        $contactNumber = $request->get('contact_number');

        
        $country = GlobalCountry::where('id',$request->get('country_id'))->first();
        
        $code = mt_rand(100000, 999999);
        UserOtpCode::create([
            'user_id' => 0,
            'contact_number' => $contactNumber,
            'code' => $code,
            'expiry_date' => now()->addMinutes(5),
        ]);
        
       // Juhesms::send_sms(str_replace("+","",$country->country_code),$contactNumber,$code,$request->get('lang'));

        return response()->json([
            'code' => 0,
            'data' => null,
            'message' => 'OTP_sent',
        ]);
    }

}
