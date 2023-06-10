<?php
namespace App\Http\Controllers\web;

use App\Http\Controllers\Common\UserBaseController;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MemberController extends UserBaseController
{

    public function memberRegister(Request $request)
    {
        if ($request->get('jid')) {
            view()->share([
                'jid' => $request->get('jid'),
                'group_type' => $request->get('group_type'),
            ]);
        } else {
            view()->share([
                'jid' => '',
                'group_type' => 'A',
            ]);
        }
        $apiReturn = app('App\Http\Controllers\Api\PackageController')->getPackage($request)->getOriginalContent();
        $apiReturn2 = app('App\Http\Controllers\Api\GlobalAPIController')->country_list($request)->getOriginalContent();
        $apiReturn3 = app('App\Http\Controllers\Api\MemberController')->getMemberInfo($request)->getOriginalContent();

        view()->share([
            'package' => $apiReturn['data'],
            'country' => $apiReturn2['data'],
            'info' => $apiReturn3['data'],
        ]);

        return view('web.member.register');
    }

    public function domemberRegister(Request $request)
    {
        $apiReturn = app('App\Http\Controllers\Api\MemberController')->registerMember($request)->getOriginalContent();
        return $apiReturn;
    }

    public function setSecPwd(Request $request)
    {
        return view('web.member.setSecPwd');
    }

    public function dosetSecPwd(Request $request)
    {
        $apiReturn = app('App\Http\Controllers\Api\MemberController')->setSecPassword($request)->getOriginalContent();
        return $apiReturn;
    }

    public function secPwd(Request $request)
    {

        return view('web.member.changeSecPwd');
    }

    public function doChgPwd(Request $request)
    {
        $apiReturn = app('App\Http\Controllers\Api\MemberController')->changePassword($request)->getOriginalContent();
        return $apiReturn;
    }

    public function chgSecPwd(Request $request)
    {

        return view('web.member.changeSecPwd');
    }

    public function dochgSecPwd(Request $request)
    {
        $apiReturn = app('App\Http\Controllers\Api\MemberController')->changeSecPassword($request)->getOriginalContent();
        return $apiReturn;
    }

    public function userBank(Request $request)
    {
        $user = auth()->user();
        $apiReturn = app('App\Http\Controllers\Api\GlobalAPIController')->country_list($request)->getOriginalContent();
        $apiReturn2 = app('App\Http\Controllers\Api\MemberController')->getBankInfo($request)->getOriginalContent();
        $apiReturn3 = app('App\Http\Controllers\Api\MemberController')->profileInfo($request)->getOriginalContent();
     
        view()->share([
            'country' => $apiReturn['data'],
            'bank_info' => $apiReturn2['data'],
            'profile_info' => $apiReturn3['data'],
        ]);

        return view('web.member.userBank');
    }
    public function userBankInfo(Request $request)
    {
        $apiReturn2 = app('App\Http\Controllers\Api\MemberController')->getBankInfo($request)->getOriginalContent();
        return $apiReturn2;
    }
    public function douserBank(Request $request)
    {
        $apiReturn = app('App\Http\Controllers\Api\MemberController')->userBank($request)->getOriginalContent();
        return $apiReturn;
    }
    public function memberuploadFile(Request $request)
    {
        $apiReturn = app('App\Http\Controllers\Api\AttachmentController')->uploadFile($request)->getOriginalContent();
        return $apiReturn;
    }
    public function updateAddress(Request $request)
    {
        $apiReturn = app('App\Http\Controllers\Api\MemberController')->updateUserAddress($request)->getOriginalContent();
        return $apiReturn;
    }
    public function doUploadIcon(Request $request)
    {
        $apiReturn = app('App\Http\Controllers\Api\MemberController')->changeIcon($request)->getOriginalContent();
        return $apiReturn;
    }
}
