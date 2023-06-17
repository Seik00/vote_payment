<?php

namespace App\Http\Controllers\Api;

use App\Helper\Bonus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Paymentlog;
use App\User;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VotePayController extends Controller
{

    public function get_info(Request $request)
    {

        $usdt_address = "0xasasas";
        $bank_account = "111";
        $email = "test@gmail.com";
        $currency = "USDT";

        $order_id = date('Ymd') . '_' . uniqid();
        $order_amount = '50';
        $sys_no = '602121';
        $user_id = uniqid();
        $order_ip = $request->ip();
        $order_time = Carbon::now()->format('Y-m-d H:i:s');
        $pay_user_name = '张三';
        $signKey = '181bfcf101aba6d84e508507d9c2f57d';

        // 按照参数名的升序排序
        $params = [
            'order_id' => $order_id,
            'order_amount' => $order_amount,
            'sys_no' => $sys_no,
            'user_id' => $user_id,
            'order_ip' => $order_ip,
            'order_time' => $order_time,
            'pay_user_name' => $pay_user_name,
        ];

        // 对参数值进行urlencode
        foreach ($params as $key => $value) {
            $params[$key] = urlencode($value);
        }

        // 按照参数名的升序拼接参数字符串
        ksort($params);
        $signString = '';
        foreach ($params as $key => $value) {
            $signString .= $key . '=' . $value . '&';
        }

        $signString = rtrim($signString, '&') . $signKey;
        $sign = md5($signString);

        $signParams = ['sign' => $sign];
        $params = $params + $signParams;
        
        foreach ($params as $key => $value) {
            $params[$key] = urldecode($value);
        }

        // dump($params);
        // // dump($data);
        // dump($order_time);
        // exit();

        $db_params = [
            'usdt_address' => $usdt_address,
            'username' => $pay_user_name,
            'email' => $email,
            'currency'=> $currency,
            'bank_account_number'=> $bank_account,
            'order_no' => $order_id,
            'amount' => $order_amount,
            'merchant_code' => $sys_no,
            'created_at' => $order_time,
        ];

        $order = new Order($db_params);
        $order->save();

        if ($order->save()) {
           
            // 构建请求URL和请求数据
            $url = 'https://swpapi.jy6989.com/UtInRecordApi/orderGateWay';
            $options = [
                'http' => [
                    'method' => 'POST',
                    'header' => 'Content-Type: application/x-www-form-urlencoded',
                    'content' => http_build_query($params),
                ],
            ];

            // 发起请求
            $context = stream_context_create($options);
            $response = file_get_contents($url, false, $context);

            // 处理响应
            $responseData = json_decode($response, true);
            if ($responseData['status'] === 'success') {
                $order_no = $responseData['data']['order_no'];
                $send_url = $responseData['data']['send_url'];
                $user_id = $responseData['data']['user_id'];
                
                // 拼接跳转URL
                $redirectUrl = $send_url . '?in_order_id=' . $order_no . '&user_id=' . $user_id;

                $paymentlog_db = [
                    'platform' => 'redirectUrl',
                    'order_no' => $order_id,
                    'respond_log' => json_encode($responseData),
                    'message'=> $responseData['msg'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ];
                

                // 跳转到支付页面
                header('Location: ' . $redirectUrl);
                exit;

            } else {
                $errorMsg = $responseData['msg'];
                $paymentlog_db = [
                    'platform' => 'redirectUrl',
                    'order_no' => $order_id,
                    'respond_log' => json_encode($responseData),
                    'message'=> $errorMsg,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ];
            }

            Paymentlog::create($paymentlog_db);

        }
    }

    public function successPayment(Request $request)
    {
        $billNo = $request->input('bill_no');
        $amount = $request->input('amount');
        $sysNo = $request->input('sys_no');
        $sign = $request->input('sign');
        
        // 回调密钥
        $signKey = 'D8A119A2-AF46-ECBF-26FC-BA1E8097306F';
        $expectedSign = md5($billNo . $signKey);
        
        if ($sign === $expectedSign) {
            // 验签成功, 订单支付成功 insert log
            $paymentlog_db = [
                'platform' => 'return_success_Url',
                'order_no' => $billNo,
                'respond_log' => json_encode([
                    'request_data' => $request->all(),
                    'expectedSign' => $expectedSign,
                ]),
                'message'=> ' 验签成功, 订单支付成功',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];

            $updated = DB::table('payment_gateway_order')
                ->where('order_no', $billNo)
                ->update(['payment_status' => '2']);

            return 'success';

        } else {
            // 验签失败 insert log
            $paymentlog_db = [
                'platform' => 'return_success_Url',
                'order_no' => $billNo,
                'respond_log' => json_encode([
                    'request_data' => $request->all(),
                    'expectedSign' => $expectedSign,
                ]),
                'message'=> ' 验签失败',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];

            $updated = DB::table('payment_gateway_order')
                ->where('order_no', $billNo)
                ->update(['payment_status' => '3']);
                
            return 'false';
        }
        Paymentlog::create($paymentlog_db);

        // return redirect('/web');
    }

    public function cancelPayment(Request $request)
    {

        $billNo = $request->input('bill_no');
        $billStatus = $request->input('bill_status');
        $sysNo = $request->input('sys_no');
        $sign = $request->input('sign');
        
        // 回调密钥
        $signKey = 'D8A119A2-AF46-ECBF-26FC-BA1E8097306F';
        // $expectedSign = md5(urlencode($billNo) . '&' . urlencode($billStatus) . '&' . urlencode($sysNo) . $signKey);
        $expectedSign = md5('bill_no=' . $billNo . '&bill_status=' . $billStatus . '&sys_no=' . $sysNo . $signKey);

        
        if ($sign === $expectedSign) {
            // 验签成功，执行取消支付逻辑
            if ($billStatus == 1) {
                // 订单已取消 insert log
                $paymentlog_db = [
                    'platform' => 'return_cancel_Url',
                    'order_no' => $billNo,
                    'respond_log' => json_encode([
                        'request_data' => $request->all(),
                        'expectedSign' => $expectedSign,
                    ]),
                    'message'=> ' 验签成功，订单已取消',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ];

            }else{
                $paymentlog_db = [
                    'platform' => 'return_cancel_Url',
                    'order_no' => $billNo,
                    'respond_log' => json_encode([
                        'request_data' => $request->all(),
                        'expectedSign' => $expectedSign,
                    ]),
                    'message'=> ' 验签成功，订单已激活',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ];
            }

            $updated = DB::table('payment_gateway_order')
                ->where('order_no', $billNo)
                ->update(['payment_status' => $billStatus]);
            
        } else {
            // 验签失败, Insert log
            $paymentlog_db = [
                'platform' => 'return_cancel_Url',
                'order_no' => $billNo,
                'respond_log' => json_encode([
                    'request_data' => $request->all(),
                    'expectedSign' => $expectedSign,
                ]),
                'message'=> ' 验签失败',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];

            $updated = DB::table('payment_gateway_order')
                ->where('order_no', $billNo)
                ->update(['payment_status' => '3']);
        }
        Paymentlog::create($paymentlog_db);

        // return redirect('/web');
    }
    

}
