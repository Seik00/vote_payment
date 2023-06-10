<?php

namespace App\Http\Controllers\Api;

use App\Helper\Bonus;
use App\Http\Controllers\Controller;
use App\Models\GlobalSetting;
use App\User;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VoteController extends Controller
{

    public function vote(Request $request)
    {   
        app()->setLocale($_POST['language']);
        $site_status = DB::table('global_setting')->where('global_key', 'SITE_STATUS')->where('key_value', '0')->get();

        if($site_status->isNotEmpty()){

            if($request->get('username')){

                $currentDateTime = Carbon::now()->format('Y-m-d H:i:s');
                $start_time = Carbon::createFromFormat('Y-m-d H:i:s', $this->global_key('START_TIME'));
                $end_time = Carbon::createFromFormat('Y-m-d H:i:s', $this->global_key('END_TIME'));
    
                if($currentDateTime > $start_time){
                    
                    if($currentDateTime < $end_time){
    
                        $count1 = DB::table('users')->where('status', '1')->where('role_id', '2')->count();
                        $count2 = DB::table('users')->where('status', '2')->where('role_id', '2')->count();
                        // $total_vote = DB::table('users')->where('role_id', '2')->count();
                        $total_vote = '180';
                        $vote_half = round($total_vote / 2);
                        if ($count1 > $vote_half) {
                            return $this->jsonResponse([
                                'code' => 1,
                                'message' => __('site.vote_close'),
                            ]);
                        } elseif ($count2 > $vote_half) {
                            return $this->jsonResponse([
                                'code' => 1,
                                'message' => __('site.vote_close'),
                            ]);
                        } else {
                            $vote = $request->get('vote_status');
                            $user_wallet = $request->get('username');
                            $exists = User::where('username', $user_wallet)->where('role_id', 2)->first();
                            if($exists){
                                if ($exists->status == 0) {
                                    // 1=agree 2=disagree
                                    $exists->status = $vote;
                                    $exists->save();
                    
                                    return $this->jsonResponse([
                                        'code' => 0,
                                        'message' => 'REQUEST_COMPLETE',
                                    ]);
                                } else {
                                    return $this->jsonResponse([
                                        'code' => 1,
                                        'message' => __('site.not_allowed_second_time'),
                                    ]);
                                } 
                            }else{
                                return $this->jsonResponse([
                                    'code' => 1,
                                    'message' => __('site.invalid_address'),
                                ]);
                            }
    
                        }
                    }
    
                    return $this->jsonResponse([
                        'code' => 1,
                        'message' => __('site.vote_end'),
                    ]);
    
                }elseif($currentDateTime > $end_time){
    
                    return $this->jsonResponse([
                        'code' => 1,
                        'message' => __('site.vote_end'),
                    ]);
    
                }else{
    
                    return $this->jsonResponse([
                        'code' => 1,
                        'message' => __('site.vote_hasnt_start'),
                    ]);
    
                }
                
            }else{
                return $this->jsonResponse([
                    'code' => 1,
                    'message' => __('site.invalid_address'),
                ]);
            }
        }else{

            return $this->jsonResponse([
                'code' => 1,
                'message' => __('site.vote_end'),
            ]);

        }
        
    }

    public function get_user_info(Request $request){  
        
        $data = [];
        $currentDateTime = Carbon::now()->format('Y-m-d H:i:s');
        $start_time = Carbon::createFromFormat('Y-m-d H:i:s', $this->global_key('START_TIME'));
        $end_time = Carbon::createFromFormat('Y-m-d H:i:s', $this->global_key('END_TIME'));
        
        $data['start_time'] = Carbon::parse($start_time)->format('Y-m-d H:i:s');
        $data['end_time'] = Carbon::parse($end_time)->format('Y-m-d H:i:s');

        if($currentDateTime > $start_time){
            if($currentDateTime < $end_time){
                $data['status_admin'] = 0;
            }
            $data['status_admin'] = 1;
        }elseif($currentDateTime > $end_time){
            $data['status_admin'] = 1;
        }else{
            $data['status_admin'] = 1;
        }
        
        $count1 = DB::table('users')->where('status', '1')->where('role_id', '2')->count();
        $count2 = DB::table('users')->where('status', '2')->where('role_id', '2')->count();
        $total_vote = DB::table('users')->where('role_id', '2')->count();
        $vote_half = round($total_vote / 2);
        if ($count1 > $vote_half) {
            $data['status'] = 1;
        } elseif ($count2 > $vote_half) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }
        return $this->jsonResponse([
            'code' => 0,
            'data' => $data,
        ]);
        
    }

    public function users_voted(){

        $vote_user['total_vote'] = DB::table('users')->where('role_id',2)->count();
        $vote_user['agree'] = User::where('status',1)->where('role_id',2)->count();
        $vote_user['disagree'] = User::where('status',2)->where('role_id',2)->count();
        $vote_user['user_data'] = DB::table('users')->where('status', '!=', 0)->where('role_id', 2)->orderByDesc('updated_at')->get();
        
        return $this->jsonResponse([
            'voted' => $vote_user,
        ]);
    }

}
