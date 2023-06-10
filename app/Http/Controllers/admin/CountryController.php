<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Common\AdminBaseController;
use App\Models\GlobalCountry;
use App\Models\SystemBank;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CountryController extends AdminBaseController
{
    public function countryConfig(Request $request)
    {
        $db = GlobalCountry::select('*');
        if ($request->get('username')) {

            $user = User::where('username', $request->get('username'))->where('role_id', 2)->first();
            if (!$user) {
                $user = User::where('id', $request->get('username'))->where('role_id', 2)->first();
            }

            if ($user) {
                $db->where('user_id', $user->id);
            } else {
                $db->where('user_id', -1);
            }

        }
        $record = $db->orderByRaw('status Desc')->orderBy('name_en', 'ASC')->paginate(10);
        return view('admin.country.countryConfig')
            ->with('record', $record)
            ->with('output_data', $this->output_data);
    }
    public function countryInfo(Request $request)
    {
        $info = GlobalCountry::where('id', $request->get('id'))->first();
        
        return $info;
    }
    public function countryControl(Request $request)
    {
        $data = $request->only('name','short_form', 'buy', 'sell','status');
       
        if ($request->get('id')) {
            GlobalCountry::where('id', $request->get('id'))->update($data);
        } else {
            GlobalCountry::create($data);
        }
        return Response::json(array(
            'success' => true,
            'message' => 'Successful Operation',
        ));
    }
    public function bankConfig(Request $request)
    {
        $db = SystemBank::select('*');
        if ($request->get('username')) {

            $user = User::where('username', $request->get('username'))->where('role_id', 2)->first();
            if (!$user) {
                $user = User::where('id', $request->get('username'))->where('role_id', 2)->first();
            }

            if ($user) {
                $db->where('user_id', $user->id);
            } else {
                $db->where('user_id', -1);
            }

        }
        $record = $db->orderBy('id', 'desc')->paginate(10);
        $country = GlobalCountry::where('status',1)->orderByRaw('sort=0, sort ASC')->orderBy('name_en', 'ASC')->paginate(10);
        return view('admin.country.bankConfig')
            ->with('record', $record)
            ->with('country', $country)
            ->with('output_data', $this->output_data);
    }
    public function bankInfo(Request $request)
    {
        $info = SystemBank::where('id', $request->get('id'))->first();
        
        return $info;
    }
    public function bankControl(Request $request)
    {
        
        $data = $request->only('bank_country', 'bank_name', 'bank_user', 'bank_number', 'branch', 'swift_code');
        if( $request->get('bank_id')){
            $bank = SystemBank::where('id', $request->get('bank_id'))->first();
            if (!$bank) {
                return Response::json(array(
                    'success' => false,
                    'message' => '操作失败',
                ));
            }
            SystemBank::where('id', $request->get('bank_id'))->update($data);
        }else{
            SystemBank::create($data);
        }
        
        return Response::json(array(
            'success' => true,
            'message' => 'Successful Operation',
        ));
    }
}
