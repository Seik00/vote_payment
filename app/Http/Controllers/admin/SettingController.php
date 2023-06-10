<?php

namespace App\Http\Controllers\admin;
use Auth;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Common\AdminBaseController;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Validator;
use App\Models\GlobalSetting;
use App\Models\UserGroup;

class SettingController extends AdminBaseController
{
    public function systemConfig(Request $request){
		$global = GlobalSetting::get()->toArray();
		
        foreach($global as $x => $val) {
           $key_value[ $val['global_key']] = $val['key_value'];
        }

		return view('admin.setting.systemConfig', [
			'output_data' => $this->output_data,
			'key_value' => $key_value,
		]);
	}
	
	public function saveConfig(Request $request) {
		$rules = [
			'BONUS_SWITCH' => 'required|regex:/[0-9]/|min:1',
            'SPECIAL_BONUS' => 'required|regex:/[0-9]/|min:1'
		];
		
		$validator = Validator::make($request->all(), $rules);
		
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		} else {
            $userInput = $request->all();
          

            foreach( $userInput as $key=>$item){
                $model = GlobalSetting::where('global_key',$key)->first();
                if($model){
                    $model->key_value =$item;
                    $model->save();
                }
            }
			
			return redirect()->route('systemConfig')->with('success', '更新成功.');
		}
		
		return redirect()->route('systemConfig');
	}

	public function packageConfig(Request $request)
    {
        $db = UserGroup::select('*');
        $record = $db->where('display',1)->get();

        return view('admin.setting.packageConfig')
            ->with('record', $record);
    }

    public function savePackage(Request $request)
    {
        $data = $request->only('package_name_en', 'package_name');

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $filename = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploaded_package/' . date("Y-m-d"), $filename);
            $path = 'public/uploaded_package/' . date("Y-m-d") . '/' . $filename;
            $data['icon'] = $path;
        }

        UserGroup::where('id', $request->get('package_id'))->update($data);

        return Response::json(array(
            'success' => true,
            'message' => 'Successful Operation',
        ));
    }
}
