<?php

namespace App\Http\Controllers\admin;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\AdminBaseController;
use App\Models\Deposit;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;
use DataTables;


class HomeController extends AdminBaseController
{
   
    public function index()
    {
      
        $orders = DB::table('payment_gateway_order')->orderByDesc('id')->get();

        // dump($rate);exit();
        return view('admin.home.index')
            ->with('orders',$orders)
            ->with('output_data',$this->output_data);
    }


    public function setting()
    {

        $rate = DB::table('global_setting')->where('global_key', 'EXCHANG_RATE')->first();
        // dump($rate);exit();
        return view('admin.home.setting')
            ->with('rate',$rate)
            ->with('output_data',$this->output_data);
    }

    public function do_setting(Request $request)
    {
        // dump('a');
        if ($request->has('rate')) {
            $rate = $request->get('rate');
            DB::table('global_setting')->where('global_key', 'EXCHANG_RATE')->update(['key_value' => $rate]);
            
            return redirect()->route('setting_home')->with('message', 'Update successfully !!!');;
        }
    }

}
