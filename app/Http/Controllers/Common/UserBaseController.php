<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Helper;
use App\User;
use Auth;
use Illuminate\Support\Facades\Route;

class UserBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $user = Auth::user();

            if (!$this->global_key('SITE_ON')) {
                return redirect()->route('loginPage')->withErrors(['active' => 'System is under maintainace.']);;
            }
            if (!$user) {
                return redirect()->route('loginPage');
            }

            if ($user->password2 == null && Route::currentRouteName() != 'websetSecPwd' && Route::currentRouteName() != 'dosetSecPwd') {

                return redirect()->route('websetSecPwd');
            }

            if ($user->role_id == 2) {
                $menu = Helper::path_now('menu_user');
            } else {
                $menu = array();
            }
            $this->output_data['notice'] = 0; //Ticket::whereNull('rebody')->count();

            $this->output_data['main_title'] = $menu['main_title'];
            $this->output_data['sub_title'] = $menu['sub_title'];
            unset($menu['sub_title']);
            unset($menu['main_title']);
            $this->output_data['menu'] = $menu;
            view()->share([
                'output_data' => $this->output_data,
                'user' => $user,
            ]);
            return $next($request);

        });
    }
}
