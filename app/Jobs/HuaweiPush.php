<?php

namespace App\HMS;

/**
 * https://developer.huawei.com/consumer/en/doc/development/HMS-3-References/push-server-send#AndroidNotification
 * above are the document for available format to be refer.
 */
class HuaweiPush {
  private $tokenUrl;
  private $pushApiUrl;
  private $appId;
  private $appSecret;

  public function __construct()
  {
    $this->tokenUrl = config('huawei-push.TOKEN_URL');
    $this->pushApiUrl = config('huawei-push.API_URL');
    $this->appId = config('huawei-push.APP_ID');
    $this->appSecret = config('huawei-push.APP_SECRET');
  }

  private function curl_https_post($url, $data = array(), $header = array())
  {
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    
    // resolve SSL: no alternative certificate subject name matches target host name
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // check verify
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_POST, 1); // regular post request
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // Post submit data

    $ret = @curl_exec($ch);
    if ($ret === false) {
        return null;
    }

    $info = curl_getinfo($ch);

    curl_close($ch);

    return $ret;
  }

  private function getAccessToken() {
    $result = json_decode($this->curl_https_post($this->tokenUrl, http_build_query(array(
        "grant_type" => "client_credentials",
        "client_secret" => $this->appSecret,
        "client_id" => $this->appId,
    )), array(
        "Content-Type: application/x-www-form-urlencoded;charset=utf-8",
    )));

    if ($result == null || !isset($result->access_token)) {
        return $result;
    }

    return $result;
  }
  
  public function push_send_msg($msg)
  {
    $body = array(
        "validate_only" => false,
        "message" => $msg
    );

    $response = $this->getAccessToken();

    if (is_null($response) || !isset($response->access_token)) {
      return $response;
    }

    $result = json_decode($this->curl_https_post(str_replace('{appid}', $this->appId, $this->pushApiUrl), json_encode($body), array(
        "Content-Type: application/json",
        "Authorization: Bearer {$response->access_token}",
        ) // Use bearer auth
      )
    );

    return $result;
  }
}