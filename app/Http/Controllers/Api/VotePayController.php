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
use Illuminate\Support\Facades\Session;

class VotePayController extends Controller
{

    public function get_info(Request $request)
    {
        // $request->session()->flash('message', 'Your message here');

        // return redirect('/web');
        // return redirect('/web')->with('success', 'The item has been saved successfully.');
        // Session::put('success', 'pundekss');
        // $value = Session::get('success');
        // return redirect('/web');
        // dump($value);exit;
        // if (Session::has('success') && Session::get('success') == 'Your desired value') {
        //     dump('yes');exit;
        // }else{
        //     dump('no');exit;
        // }
        $this->validate($request,[
            'usdt_address' => 'required',
            'bank_account' => 'required',
            'email' => 'required',
            'currency' => 'required',
            'order_amount' => 'required',
            'pay_user_name' => 'required',
            'phone' => 'required',
            'payee_id' => 'required',
        ]);

        $usdt_address = $request->get('usdt_address');
        $bank_account = $request->get('bank_account');
        $email =  $request->get('email');
        $currency = $request->get('currency');
        $phone =  $request->get('phone');
        $payee_id = $request->get('payee_id');

        // $usdt_address = "0xx";
        // $bank_account = "123";
        // $email =  "test@gmail.com";
        // $currency = "USDT";

        $order_id = date('Ymd') . '_' . uniqid();
        $order_amount = $request->get('order_amount');
        // $order_amount = "50";
        $sys_no = '602121';
        $user_id = $payee_id;
        $order_ip = $request->ip();
        $order_time = Carbon::now()->format('Y-m-d H:i:s');
        $pay_user_name = $request->get('pay_user_name');
        // $pay_user_name = "张三";
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

        $db_params = [
            'usdt_address' => $usdt_address,
            'username' => $pay_user_name,
            'phone' => $phone,
            'payee_id' => $payee_id,
            'email' => $email,
            'currency'=> $currency,
            'bank_account_number'=> $bank_account,
            'order_no' => $order_id,
            'amount' => $order_amount,
            'merchant_code' => $sys_no,
            'created_at' => $order_time,
        ];

        $order = new Order($db_params);
        $r = $order->save();

        if ($r) {
           
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
                Paymentlog::create($paymentlog_db);

                // 跳转到支付页面
                return response()->json([
                    'code' => 0,
                    'data' => $redirectUrl,
                    'message' => 'redirectUrl',
                ]);
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
                Paymentlog::create($paymentlog_db);
            }

            

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

            // payment_status (66) == 订单支付成功
            $updated = DB::table('payment_gateway_order')
                ->where('order_no', $billNo)
                ->update(['payment_status' => '66']);

            Paymentlog::create($paymentlog_db);
            $this->handleNextRequest("订单支付成功");
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
            // payment_status (999) 验签失败
            $updated = DB::table('payment_gateway_order')
                ->where('order_no', $billNo)
                ->update(['payment_status' => '999']);

            Paymentlog::create($paymentlog_db);
            $this->handleNextRequest("验签失败_999");
            return 'false';
        }
        
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

                $updated = DB::table('payment_gateway_order')
                ->where('order_no', $billNo)
                ->update(['payment_status' => $billStatus]);

                Paymentlog::create($paymentlog_db);
                $this->handleNextRequest("验签成功_订单已取消");
                return 'success';
                
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

                Paymentlog::create($paymentlog_db);
                $this->handleNextRequest("验签成功_订单已激活");
                return 'false';

            }
            
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

            Paymentlog::create($paymentlog_db);
            $this->handleNextRequest("验签失败");
            return 'false';
        }
        // return redirect('/web');
    }    


    private function handleNextRequest($message)
    {
        if ($message == "订单支付成功" || $message == "验签成功_订单已取消") {
            return redirect()->route('home.index');
        }
    }


}
