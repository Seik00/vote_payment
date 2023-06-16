<?php

namespace App\Http\Controllers;

use App\Exports\RecordExport;
use App\HMS\HuaweiPush;
use App\Http\Helper;
use App\Models\FundTransfer;
use App\Models\GlobalSetting;
use App\Models\Notification;
use App\Models\UserDevice;
use App\User;
use Auth;
use FCM;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use Maatwebsite\Excel\Facades\Excel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function global_key($key)
    {
        $GLOBAL = GlobalSetting::where('global_key', $key)->first();
        if ($GLOBAL) {
            return $GLOBAL->key_value;
        } else {
            return '';
        }
    }

    public function __construct()
    {

        $this->middleware(function ($request, $next) {

            $user = Auth::user();
            if ($user) {
                if ($user->role_id == 1) {
                    $menu = Helper::path_now('menu_admin');
                    $this->output_data['main_title'] = $menu['main_title'];
                    $this->output_data['sub_title'] = $menu['sub_title'];
                    unset($menu['sub_title']);
                    unset($menu['main_title']);
                    $this->output_data['menu'] = $menu;
                }
            } else {
                $menu = array();
            }
            return $next($request);
        });
    }
    
    // public function global_key($key, $value = '')
    // {
    //     $GLOBAL = GlobalSetting::where('global_key', $key)->first();
    //     if ($GLOBAL) {
    //         return $GLOBAL->key_value;
    //     } else {
    //         return '';
    //     }
    // }
    public function set_key($key, $value)
    {
        $GLOBAL = GlobalSetting::where('global_key', $key)->first();

        if ($GLOBAL) {
            $GLOBAL->key_value = $value;
            $GLOBAL->save();

        } else {
            return '';
        }
    }
    public function check_login()
    {
        $user = Auth::user();
        if (!$user) {
            echo '<script>alert("Please Login to continue");
			location.replace("/login");</script>';
        }
    }
    public function check_secpass($secpass)
    {
        $user = auth()->user();
        if (!Hash::check($secpass, $user->password2)) {
            return $this->jsonResponse([
                'code' => 1,
                'data' => false,
                'message' => 'INCORRECT_SEC_PASSWORD',
            ]);
        } else {
            return false;
        }
    }
    protected function jsonResponse($data, $code = 200)
    {
        return response()->json($data, $code);
    }

    protected function pushUserNotice($user_id, $token, $title, $body, $notification_type)
    {
        if ($user_id > 0) {
            $batch = UserDevice::where('user_id', $user_id)->get()->toArray();
            if ($batch) {
                $notice_record['title'] = $title;
                $notice_record['notice_type'] = $notification_type;
                $notice_record['description'] = $body;
                $notice_record['users_id'] = $user_id;
                Notification::Create($notice_record);
                for ($i = 0; $i < count($batch); $i++) {
                    $this->pushNotification($title, $body, $batch[$i]['device_token'], $notification_type, $batch[$i]['os_type']);
                }

            }
        } elseif ($token != 0) {
            $device = UserDevice::where('device_token', $token)->first();
            if ($device) {
                $notice_record['title'] = $title;
                $notice_record['notice_type'] = $notification_type;
                $notice_record['description'] = $body;
                $notice_record['users_id'] = $user_id;
                Notification::Create($notice_record);
                $this->pushNotification($title, $body, $device->device_token, $notification_type, $device->os_type);
            }

        } else {
            $batch = UserDevice::get()->toArray();
            if ($batch) {
                for ($i = 0; $i < count($batch); $i++) {
                    $this->pushNotification($title, $body, $batch[$i]['device_token'], $notification_type, $batch[$i]['os_type']);
                    $notice_record['title'] = $title;
                    $notice_record['notice_type'] = $notification_type;
                    $notice_record['description'] = $body;
                    $notice_record['users_id'] = $batch[$i]['user_id'];
                    Notification::firstOrCreate($notice_record);
                }

            }
        }
    }
    protected function pushNotification($title, $body, $device_token, $notification_type = 1, $device_type = 'IOS')
    {
        /**
         * this is huawei push notification
         */
        if ($device_type == 'HUAWEI') {
            $push = new HuaweiPush();

            // // notification message
            $message = [
                "notification" => [
                    "title" => $title,
                    "body" => $body,
                ],
                "android" => [
                    "data" => "hi there",
                    "notification" => [
                        "title" => $title,
                        "body" => $body,
                        "click_action" => [
                            "type" => 1,
                            "intent" => "#Intent;compo=com.rvr/.Activity;S.W=U;end",
                        ],
                    ],
                ],
                "token" => array($device_token),
            ];

            $result = $push->push_send_msg($message);
            return response()->json([
                'data' => $result,
            ]);
        } else {
            $optionBuilder = new OptionsBuilder();
            $optionBuilder->setTimeToLive(0);

            $notificationBuilder = new PayloadNotificationBuilder($title);
            $notificationBuilder->setBody($body)
                ->setClickAction('FLUTTER_NOTIFICATION_CLICK')
                ->setSound('default');

            $dataBuilder = new PayloadDataBuilder();
            $dataBuilder->addData([
                'notification_type' => $notification_type,
                'title' => $title,
                'body' => $body,
            ]);

            $option = $optionBuilder->build();
            $notification = $notificationBuilder->build();
            $data = $dataBuilder->build();

            $downstreamResponse = FCM::sendTo($device_token, $option, $notification, $data);

            return response()->json([
                'data' => array(
                    'success' => $downstreamResponse->numberSuccess(),
                    'failure' => $downstreamResponse->numberFailure(),
                    'modification' => $downstreamResponse->numberModification(),
                ),
            ]);
        }
    }

    protected function activities_log($log_name, $description, $changed_data = '', $causer_type = 'App\User')
    {
        $user = Auth::user();
        $r = DB::table('activity_log')->insert([
            'causer_id' => $user->id,
            'log_name' => $log_name,
            'causer_type' => $causer_type,
            'ip_address' => \Request::ip(),
            'properties' => json_encode($changed_data),
            'description' => $description,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        return $r;
    }
    protected function check_number($founds)
    {
        if (!is_numeric($founds) || !preg_match('/^[0-9]+(\\.[0-9]+)?$/', $founds)) {
            return false;
        } else {
            return true;
        }
    }
    protected function generate_password($length)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $password = "";
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $password;
    }
    protected function generate_number($length)
    {
        $chars = '1234567890';
        $password = "";
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $password;
    }
    public function is_decimal($val)
    {
        return is_numeric($val) && floor($val) != $val;
    }

    public function exportExcel($title = ['tital', 'username'], $data, $fileName = '')
    {
        $record['title'] = $title;
        $record['data'] = $data;

        return Excel::download(new RecordExport(
            $record,
            '',
            '',
            ''
        ), $fileName . '_' . date("YmdHi") . '.xlsx');
    }
    public function search_record($db, $request)
    {
        if ($request->get('username')) {

            $user = User::where('username', $request->get('username'))->where('role_id', 2)->first();
            if (!$user) {
                $user = User::where('id', $request->get('username'))->where('role_id', 2)->first();
            }

            if ($user) {
                $db->where('user_id', $user->id);
            } else {
                $db->where('user_id', -1);
            }
        }
        if ($request->get('from')) {
            $db->whereBetween('created_at', [$request->get('from') . ' 00:00:00', $request->get('to') . ' 23:59:59']);

        }
        return $db;
    }
    public function create_transaction($user_id, $act, $wallet, $found_type, $wallet_type, $amount, $detail, $detailen, $detailin = '', $detailth = '', $detailvn = '', $remark = '')
    {
        $user = User::where('id', $user_id)->first();

        if (!$user) {
            return response()->json(false);
        }

        if ($amount < 0) {
            return response()->json(false);
        }

        if ($act == '+') {
            $add['current'] = $user->$wallet + $amount;
            $add['in_type'] = $wallet_type;

        } else {
            $add['current'] = $user->$wallet - $amount;
            $add['out_type'] = $wallet_type;
        }
        if ($add['current'] < 0) {
            return response()->json(false);
        }

        $add['previous'] = $user->$wallet;
        $add['action'] = $act;
        $add['user_id'] = $user_id;
        $add['found_type'] = $found_type;
        $add['found'] = $amount;
        $add['detail'] = $detail;
        $add['detailen'] = $detailen;
        $add['detailth'] = $detailth;
        $add['detailvn'] = $detailvn;
        $add['detailin'] = $detailin;
        $add['remark'] = $remark;

        $r = DB::table('users')->where('id', $user_id)->update([$wallet => $add['current']]);
        $r = FundTransfer::create($add);
        return response()->json($r);
    }
    public function wallet_type()
    {
        return array
            (
            1 => array('id' => "point1", 'found_type' => "1", 'lan_key' => "POINT1", 'comments_cn' => "现金钱包", 'comments_en' => "Cash Wallet"),
            2 => array('id' => "point2", 'found_type' => "2", 'lan_key' => "POINT2", 'comments_cn' => "兑换钱包", 'comments_en' => "Redeem Wallet"),
            3 => array('id' => "point3", 'found_type' => "3", 'lan_key' => "POINT3", 'comments_cn' => "注册钱包", 'comments_en' => "Registration Wallet"),
            10 => array('id' => "pin", 'found_type' => "10", 'lan_key' => "pin", 'comments_cn' => "PIN", 'comments_en' => "Activation Wallet"),
        );
    }
    public function bonus_type()
    {
        return array
            (
            // 1 => array('key' => "static_bonus", 'bonus_cn' => "分享收益", 'bonus_en' => "Share Bonus"),
            1 => array('key' => "dynamic_bonus", 'bonus_cn' => "代数收益", 'bonus_en' => "Matching Development Bonus"),
            2 => array('key' => "special_bonus", 'bonus_cn' => "活动收益", 'bonus_en' => "Daily Trading PV Bonus"),
            3 => array('key' => "matching_bonus", 'bonus_cn' => "活动收益", 'bonus_en' => "Team Development Bonus"),
            4 => array('key' => "sponsor_bonus", 'bonus_cn' => "推荐收益", 'bonus_en' => "Referral Bonus"),
        );
    }

    public function smtp_mail($to_email, $title, $message)
    {
        $content = "<tr>
                        <td style='padding-bottom: 30px;padding-top:30px;font-family: monospace;font-size: 15px;font-weight: bold;color:black;'>
                            <p>" . $message . "</p>

                        </td>
                    </tr>
                   ";
        $backgroundUrl = url('/assets/img/app/forgot%20password%202/bg-email.jpg');
        $details = [
            'title' => $title,
            'body' => $content,
            'backgroundUrl' => $backgroundUrl,
        ];

        /*view()->share([
        'details' => $details,
        ]);

        return view('mail_template');*/
        $r = \Mail::to($to_email)->send(new \App\Mail\Send_Mail($details));

        return response()->json([
            'data' => $r,
            'status' => true,
        ]);
    }
}
