<?php
namespace App\Helper;

use App\User;
use DB;

class Juhesms
{
    public static function send_sms($country='',$phone,$otp,$lang='en')
    {
        if($lang=='cn'){
            $template_id = '11854';
        }else{
            $template_id = '11853';
        }
        if($country=='+86'){
            static::send_china_sms($phone,$otp);
        }else{
            static::send_global_sms($phone,$country,$otp,$template_id);
        }
    }
    public static function send_china_sms($number,$code){
		
		$url = "http://v.juhe.cn/sms/send";
		$params = array(
			'key'   => '068c0474ceb724188225b5134aec5835', //您申请的APPKEY
			'mobile'    => $number, //接受短信的用户手机号码
			'tpl_id'    => 206752, //您申请的短信模板ID，根据实际情况修改 // 213508	
			'tpl_value' =>'#code#='.$code //您设置的模板变量，根据实际情况修改
		);
//"tplId":11344 你的验证码是
//"tplId":11338 Your varification code is #code#
		$paramstring = http_build_query($params); 
		$content = static::juheCurl($url, $paramstring);
		$result = json_decode($content, true);
		var_dump($result);
		if ($result) {
			//var_dump($result);
		} else {
			//请求异常
		}
	}
	public static function send_global_sms($number,$country,$code,$template){
		
		$url = "http://v.juhe.cn/smsInternational/send.php";
		$params = array(
			'key'   => 'a0136711dec62b19788a491eef27b4c5', //您申请的APPKEY
			'areaNum'    =>$country, //接受短信的用户手机号码
			'mobile'    => $number, //接受短信的用户手机号码
			'tplId'    => $template, //您申请的短信模板ID，根据实际情况修改
			'tplValue' =>'#code#='.$code //您设置的模板变量，根据实际情况修改
		);
//"tplId":11344 你的验证码是
//"tplId":11338 Your varification code is #code#
		$paramstring = http_build_query($params); 
		$content = static::juheCurl($url, $paramstring);
		$result = json_decode($content, true);
		//var_dump($result);
		if ($result) {
			return $result;
		} else {
			//请求异常
		}
	}
    public static function juheCurl($url, $params = false, $ispost = 0)
{
    $httpInfo = array();
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'JuheData');
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    if ($ispost) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_URL, $url);
    } else {
        if ($params) {
            curl_setopt($ch, CURLOPT_URL, $url.'?'.$params);
        } else {
            curl_setopt($ch, CURLOPT_URL, $url);
        }
    }
    $response = curl_exec($ch);
    if ($response === FALSE) {
        //echo "cURL Error: " . curl_error($ch);
        return false;
    }
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
    curl_close($ch);
    return $response;
} 
}
