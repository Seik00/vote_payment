<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Common\AdminBaseController;
use App\Models\GlobalCountry;
use App\Models\Role;
use App\Models\UserGroup;
use App\Models\UserPackage;
use App\Models\UserAddress;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UserController extends AdminBaseController
{
    public function user_list()
    {
        $mobile = '';
        $has_search = false;

        $user = Auth::user();
        $db = User::select('*')->where('role_id', 2);

        if (request('f_mobile_no')) {
            $mobile = substr(request('f_mobile_no'), -5);
            $db->where('mobile_no', 'like', '%' . $mobile);
            $has_search = true;
        }
        if (request('f_username')) {
            $db->where('username', 'like', '%' . request('f_username') . '%');
            $has_search = true;
        }
      
        $order = (request('order') != '') ? request('order') : 'id';
        $sort = (request('sort') != '') ? request('sort') : 'desc';

        if ($user->role_id == 1) {
            $record = $db->orderBy($order, $sort)->paginate(10);
        } else if ($has_search == true) {
            $record = $db->orderBy($order, $sort)->paginate(10);
        } else {
            $record = $db->where('id', '-1')->paginate(10);
        }

         $country = GlobalCountry::where('status', '1')->orderByRaw('sort=0, sort ASC')->orderBy('name_en', 'ASC')->get();
        $package = UserGroup::get();

        return view('admin.user.user_list')
            ->with('output_data', $this->output_data)
            ->with('user', $user)
            ->with('country', $country)
            ->with('package', $package)
            ->with('record', $record);
    }
    public function set_blacklist(Request $request)
    {
        try {

            $user = User::select('*')->where('id', $request->id)->first();

            if (!$user) {
                return Response::json(array(
                    'success' => false,
                    'message' => 'Incorrect User',
                ));
            }
            if ($user->is_active == 1) {
                $user->is_active = 0;
            } else {
                $user->is_active = 1;
            }
            $user->save();

            return Response::json(array(
                'success' => true,
                'message' => 'User status is updated',
            ));
        } catch (\Exception $e) {

            return Response::json(array(
                'success' => false,
                'message' => 'Fail to create employee ' . $e->getMessage(),
            ));
        }
    }
    public function admin_list()
    {
        $user = Auth::user();
        $record = User::where('role_id', '!=', 2)->orderBy('id', 'desc')->paginate(10);
        $role = Role::where('id', '!=', 2)->get();
        return view('admin.user.admin_list')
            ->with('user', $user)
            ->with('role', $role)
            ->with('record', $record);
    }

    public function setUserPwd(Request $request)
    {
        $user = Auth::user();
        return view('admin.user.setUserPwd');
    }

    public function updatePwd(Request $request)
    {
		$user = User::where('username', request('username'))->first();
		if (!$user) {
			return redirect()->back()->withErrors('用户名错误')->withInput();
		}
		if ($request->get('pwd_type') == 'pwd') {
			$user->password = bcrypt($request->get('password'));
			$user->d_password = $request->get('password');
		} else {
			$user->password2 = bcrypt($request->get('password'));
			$user->d_password2 = $request->get('password');
		}

		$user->save();

		return redirect()->route('setUserPwd')->with('success', '更新成功.');
    }
    public function create_admin()
    {
        try {

            $name_count = User::where('name', request('username'))->where('is_active', 1)->count();
            if ($name_count > 0) {
                return Response::json(array(
                    'success' => false,
                    'message' => 'Username already registered',
                ));
            }
            $user = Auth::user();
            if ($user->role_id > 3) {
                return Response::json(array(
                    'success' => false,
                    'message' => 'Incorrect Role',
                ));
            }
            if ($user->role_id != 1 && request("role_id") < $user->role_id) {
                return Response::json(array(
                    'success' => false,
                    'message' => 'Incorrect Role',
                ));
            }
            $ref_id = 0;
            $batch_id = 0;
            $user = User::create([
                'role_id' => request("role_id"),
                'name' => request("username"),
                'ref_id' => $ref_id,
                'batch_id' => $batch_id,
                'password' => bcrypt(request("password")),
                //'email' => request("email"),
                'mobile_no' => request("mobile_no"),
                'user_login_id' => 'user',
            ]);

            $this->activities_log('CREAT_ADMIN', 'Create admin' . request("username") . ' admin id :' . $user->id);
            return Response::json(array(
                'success' => true,
                'message' => 'Username already registered',
            ));
        } catch (\Exception $e) {

            return Response::json(array(
                'success' => false,
                'message' => 'Fail to create employee ' . $e->getMessage(),
            ));
        }
    }
    public function update_admin()
    {
        try {
            $name_count = User::where('name', request('name'))->where('id', '!=', request('id'))->count();
            if ($name_count > 0) {
                return Response::json(array(
                    'success' => false,
                    'message' => 'Username already registered',
                ));
            }

            $update = [];
            $update['name'] = request('name');
            $update['role_id'] = request('role_id');

            $password = request('password');

            if ($password != '') {
                $update['password'] = bcrypt($password);
            }

            User::where('id', request('id'))->update($update);

            $this->activities_log('UDPATE_ADMIN', 'Update admin' . request("name") . ' admin id :' . request('id'));

            return Response::json(array(
                'success' => true,
                'message' => '',
            ));
        } catch (\Exception $e) {

            return Response::json(array(
                'success' => false,
                'message' => 'Fail to update employee ' . $e->getMessage(),
            ));
        }
    }
    public function updateUser(Request $request)
    {
        try {
            $user = User::where('id', '=', $request->get('user_id'))->first();
            if (!$user) {
                return Response::json(array(
                    'success' => false,
                    'message' => 'Username already registered',
                ));
            }
            $update = $request->only('username', 'contact_number', 'country_id', 'user_group_id', 'wr', 'rb', 'wt');

            User::where('id', $request->get('user_id'))->update($update);

            $this->activities_log('UDPATE_User', 'Update user:' . json_encode($request->all()));

            return Response::json(array(
                'success' => true,
                'message' => '',
            ));
        } catch (\Exception $e) {

            return Response::json(array(
                'success' => false,
                'message' => 'Fail to update employee ' . $e->getMessage(),
            ));
        }
    }
    public function delete_admin()
    {
        try {
            $name_count = User::where('id', '=', request('id'))->where('is_active', 1)->first();
            if (!$name_count) {
                return Response::json(array(
                    'success' => false,
                    'message' => 'Username already registered',
                ));
            }

            $user = Auth::user();

            $update = [];
            $update['is_active'] = 0;

            User::where('id', request('id'))->update($update);

            $this->activities_log('DELETE_ADMIN', 'Delete admin' . request("name") . ' admin id :' . request('id'));

            return Response::json(array(
                'success' => true,
                'message' => '',
            ));
        } catch (\Exception $e) {

            return Response::json(array(
                'success' => false,
                'message' => 'Fail to update employee ' . $e->getMessage(),
            ));
        }
    }
    public function get_user_info()
    {
        $user = User::where('id', request('search_id'))->first();

        return Response::json(array(
            'success' => true,
            'user' => $user,
        ));
    }
    public function userPackage(Request $request)
    {
        $db = UserPackage::select('*');
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
        $wallet = $this->wallet_type();
       
        return view('admin.user.userPackage')
            ->with('record', $record)
            ->with('wallet', $wallet)
            ->with('output_data', $this->output_data);
    }
    public function userAddress()
    {
        $db = UserAddress::select('*');
        $record = $db->orderBy('user_id', 'desc')->paginate(10);
       
        return view('admin.user.userAddress')
            ->with('record', $record);
    }
}
