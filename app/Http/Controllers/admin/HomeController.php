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
        $users = DB::table('users')->where('role_id',2)->get();
        // dump($users);exit();
        return view('admin.home.index')
            ->with('users',$users)
            ->with('output_data',$this->output_data);
    }

    public function getData()
    {
        $users = DB::table('users')->where('role_id',2)->get();
        $agree['agree'] = User::where('status',1)->where('role_id',2)->count();
        $disagree['disagree'] = User::where('status',2)->where('role_id',2)->count();
        $total_vote['total_vote'] = User::where('role_id',2)->count();

        return [
            'users' => $users,
            'agree' => $agree,
            'disagree' => $disagree,
            'total_vote' => $total_vote,
        ];
    }


    public function setting()
    {
        $settings = DB::table('global_setting')
        ->whereIn('global_key', ['START_TIME', 'END_TIME', 'SITE_STATUS'])
        ->get();
        return view('admin.home.setting', ['settings' => $settings])
            ->with('output_data',$this->output_data);
    }

    public function do_setting(Request $request)
    {
        // dump('a');
        if ($request->has('start_time') && $request->has('end_time') && $request->has('site')) {

            $start_time = Carbon::createFromFormat('Y-m-d\TH:i',$request->get('start_time'));
            $end_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->get('end_time'));
           
            if ($end_time < $start_time) {
                return redirect()->route('setting_home')->with('error_message', 'Setting unsuccessfully !!!');;
            }
            
            DB::table('global_setting')->where('global_key', 'START_TIME')->update(['key_value' => $start_time]);
            DB::table('global_setting')->where('global_key', 'END_TIME')->update(['key_value' => $end_time]);
            DB::table('global_setting')->where('global_key', 'SITE_STATUS')->update(['key_value' => $request->get('site')]);
            
            return redirect()->route('setting_home')->with('message', 'Setting successfully !!!');;
        }
    }

    public function do_add_users(Request $request)
    {
        if($request->get('wallet_address')){
            $total_vote = DB::table('users')->where('role_id', '2')->count();

            $wallet_address = $request->get('wallet_address');
            $existingUser = DB::table('users')->where('username', $wallet_address)->first();
            
            if($total_vote < 180){

                if ($existingUser) {
                    return redirect()->route('setting_home')->with('error_add_users_message', 'Wallet address already exists !!!');
                }
                DB::table('users')->insert([
                    'username' => $wallet_address,
                ]);
                return redirect()->route('setting_home')->with('add_users_message', 'Add successfully !!!');

            }else{
                return redirect()->route('setting_home')->with('error_add_users_message', 'unsuccessfully !!!');                
            }
            
        }
    }

    public function table_action(Request $request)
    {
        // var_dump('a');
        if ($request->get('button_action')) {
            $buttonAction = $request->input('button_action');
            $username = $request->get('username');
            if ($buttonAction === 'disagree') {
                DB::table('users')->where('username', $username)->update(['status' => '2']);
            } elseif ($buttonAction === 'agree') {
                DB::table('users')->where('username', $username)->update(['status' => '1']);
            }
            return redirect()->route('index_home')->with('message', 'Successfully !!!');
        }

    }

}
