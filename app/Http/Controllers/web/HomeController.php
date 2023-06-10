<?php
namespace App\Http\Controllers\web;

use App\Http\Controllers\Common\UserBaseController;
use App\Models\News;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends UserBaseController
{
    public function index(Request $request)
    {
        //    $apiApp = app('App\Http\Controllers\Api\APIController')->lookup($request);]
        $news = News::where('is_display', 1)->orderBy('id', 'desc')->limit(5)->get();

        $user = auth()->user();
        $apiReturn = app('App\Http\Controllers\Api\MemberController')->getMemberInfo($request)->getOriginalContent();
        view()->share([
            'info' => $apiReturn['data'],
            'news' => $news,
        ]);

        return view('web.home.index');
    }
}
