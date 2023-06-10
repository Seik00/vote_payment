<?php
namespace App\Http;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class SiteHelper
{

    public static function callApi($path, $method = '', $params = [])
    {
        $url = config('app.api_url') . $path;
        $header = [];
        $token = self::getToken();
        if ($token) {
            $header[] = 'Authorization: Bearer' . $token;
        }
        array_push($header, 'Accept: application/json');
        array_push($header, 'X-Requested-Wit: XMLHttpRequest');
        $ch = curl_init();

        if ($method == 'post') {
            if (!empty($params)) {
                $query = http_build_query($params);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
            }
        } else if ($method == 'put') {
            if (!empty($params)) {
                $query = http_build_query($params);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
            }
        } else if ($method == 'get') {
            if (!empty($params)) {
                $query = http_build_query($params);
                $url .= '?' . $query;
            }
        } else if ($method == 'delete') {
            if (!empty($params)) {
                $query = http_build_query($params);
                $url .= '?' . $query;
            }

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        } else if ($method == 'upload') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
        $output = curl_exec($ch);
        $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ['status' => $response, 'data' => $output];
    }

    public static function isLogin()
    {
        if (Cookie::has('user') && Cookie::has('token')) {
            return true;
        }

        return false;
    }

    public static function setAuth($data)
    {
        Cookie::queue('user', json_encode($data['data']), 1440);
        Cookie::queue('token', $data['token'], 1440);
    }

    public static function clearAuth()
    {
        Cookie::queue(Cookie::forget('user'));
        Cookie::queue(Cookie::forget('token'));
    }

    public static function getToken()
    {
        if (Cookie::has('token') && Cookie::has('token')) {
            return Cookie::get('token');
        }

        return false;
    }

    public static function getLang()
    {
        $lang_lists = ['en', 'cn', 'my'];

        if (isset($_GET['lang']) && $_GET['lang'] != '') {
            $lang = $_GET['lang'];

            if (in_array($lang, $lang_lists)) {
                App::setLocale($lang);
                Cookie::queue('lang', $lang, (1440 * 365));
            }
        } else if (Cookie::get('lang') != '') {
            $lang = Crypt::decrypt(Cookie::get('lang'), false);

            if (in_array($lang, $lang_lists)) {
                App::setLocale($lang);
            }
        } else {
            $lang = 'en';
        }

        return $lang;
    }

    public static function setReferralId($ref)
    {
        Cookie::queue('referral', $ref, (1440 * 365));
    }

    public static function getReferralId()
    {
        if (Cookie::has('referral') && Cookie::has('referral')) {
            return Cookie::get('referral');
        }

        return '';
    }

    public static function getUserCookie()
    {
        if (Cookie::has('user') && Cookie::has('user')) {
            return json_decode(Cookie::get('user'), true);
        }

        return [];
    }

}
