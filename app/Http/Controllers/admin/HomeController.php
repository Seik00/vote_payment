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
        $user = auth()->user();
        $rate = DB::table('global_setting')->where('global_key', 'EXCHANG_RATE')->first();
        // dump($rate);exit();
        return view('admin.home.index')
            ->with('rate',$rate)
            ->with('output_data',$this->output_data);
    }

 

    public function do_setting(Request $request)
    {
        // dump('a');
        if ($request->has('rate')) {
            $rate = $request->get('rate');
            DB::table('global_setting')->where('global_key', 'EXCHANG_RATE')->update(['key_value' => $rate]);
            
            return redirect()->route('index_home')->with('message', 'Update successfully !!!');;
        }
    }

}
