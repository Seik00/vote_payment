<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Helper;
use App\Http\SiteHelper;
use App\Models\Ticket;
use App\User;
use Auth;

class AdminBaseController extends Controller
{

    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            $lang = SiteHelper::getLang();
            $role = auth()->user()->role_type();
            //$user = User::where('id',$user->id)->with('role_detail')->first();
            if ($role == 'admin') {
                $menu = Helper::path_now('menu_admin');
            }
            $this->output_data['notice'] = Ticket::whereNull('rebody')->count();
            $this->output_data['main_title'] = $menu['main_title'];

            $this->output_data['main_title'] = $menu['main_title'];
            $this->output_data['sub_title'] = $menu['sub_title'];
            unset($menu['sub_title']);
            unset($menu['main_title']);
            $this->output_data['menu'] = $menu;
            view()->share([
                'output_data' => $this->output_data,
            ]);
            return $next($request);

        });
    }

}
