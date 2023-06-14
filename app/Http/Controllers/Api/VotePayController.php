<?php

namespace App\Http\Controllers\Api;

use App\Helper\Bonus;
use App\Http\Controllers\Controller;
use App\Models\GlobalSetting;
use App\User;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VotePayController extends Controller
{

    public function get_info(Request $request)
    {
        
        // var_dump($request->ip());
        $order_id = '020211001';
        $order_amount = '100';
        $sys_no = '602121';
        $user_id = '0001';
        $order_ip = $request->ip();
        $order_time = Carbon::now()->format('Y-m-d H:i:s');
        $pay_user_name = 'test';
        $signKey = '181bfcf101aba6d84e508507d9c2f57d';

        // 按照参数名的升序排序
        $params = [
            'order_amount' => $order_amount,
            'order_id' => $order_id,
            'order_ip' => $order_ip,
            'order_time' => $order_time,
            'pay_user_name' => $pay_user_name,
            'sys_no' => $sys_no,
            'user_id' => $user_id,
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

        // 去除末尾的&符号，并拼接signKey
        $signString = rtrim($signString, '&') . $signKey;

        // 计算签名
        $sign = md5($signString);

        // 构建请求参数
        $data = [
            'order_id' => $order_id,
            'order_amount' => $order_amount,
            'sys_no' => $sys_no,
            'user_id' => $user_id,
            'order_ip' => $order_ip,
            'order_time' => $order_time,
            'pay_user_name' => $pay_user_name,
            'sign' => $sign,
        ];

        // 构建请求URL和请求数据
        $url = 'https://swpapi.jy6989.com/UtInRecordApi/orderGateWay';
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/x-www-form-urlencoded',
                'content' => http_build_query($data),
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
            // 跳转到支付页面
            header('Location: ' . $redirectUrl);
            exit;
        } else {
            $errorMsg = $responseData['msg'];
            // 处理入金失败的情况
            echo $errorMsg;
        }


    }

    public function successPayment(Request $request)
    {
        $billNo = $request->input('bill_no');
        $amount = $request->input('amount');
        $sysNo = $request->input('sys_no');
        $sign = $request->input('sign');
        
        $signKey = '181bfcf101aba6d84e508507d9c2f57d';
        $expectedSign = md5($billNo . $signKey);
        
        if ($sign === $expectedSign) {
            // 验签成功 insert log
            Log::info('订单支付成功：' . $billNo . ', 金额：' . $amount);
            return 'success';
        } else {
            // 验签失败 insert log
            // ('验签失败：' . $billNo);
            return 'false';
        }
    }

    public function cancelPayment(Request $request)
    {
        $billNo = $request->input('bill_no');
        $billStatus = $request->input('bill_status');
        $sysNo = $request->input('sys_no');
        $sign = $request->input('sign');
        
        $signKey = '181bfcf101aba6d84e508507d9c2f57d';
        $expectedSign = md5(urlencode($billNo) . '&' . urlencode($billStatus) . '&' . urlencode($sysNo) . $signKey);
        
        if ($sign === $expectedSign) {
            // 验签成功，执行取消支付逻辑
            if ($billStatus == 1) {
                // 订单已取消 insert log
                // ('订单已取消：' . $billNo);
                return 'success';
            } else {
                // 订单未取消，处理其他逻辑
                return 'false';
            }
        } else {
            // 验签失败, Insert log
            // ('验签失败：' . $billNo);
            return 'false';
        }
    }
    

}
