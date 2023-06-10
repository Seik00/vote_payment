<?php

namespace App\Http\Controllers;
use App\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
Use Auth;
use App\Http\SiteHelper; 
class LoginController extends Controller
{
    

    public function loginPage(Request $request){
        
        $postRoute = '';
        if ($request->segment(1) == 'admin') {
            $postRoute = url('admin/validate_login');
			 return view('auth.login')
            ->with('postRoute', $postRoute);
        } else{
            $postRoute = url('home/validate_login');
			return view('home.login')
            ->with('postRoute', $postRoute);
        }
    }
    
    public function validate_login(Request $request){
      
        $role_ids = Role::whereIn('name', ['admin'])->pluck('id');

        $this->validate($request,[
            'name' => 'required',
            'password' => 'required|alphaNum|min:3'
            ]);
			
        $user_data = array(
            'username' => $request->get('name'),
            'password' => $request->get('password')
         ) ;
        if(auth()->attempt($user_data, ($request->get('remember') == 'on') ? true : false)){
			$user = auth()->user();

			$this->activities_log($user->id,'Login','Login to system');
            
            if (!in_array(auth()->user()->role_id, $role_ids->toArray())) {
                auth()->logout();
                return redirect()
                ->back()
                ->withErrors(['active' => 'Incorrect Email or password.']);
            }

            if ($request->segment(1) == 'admin') {
                return redirect()->route('index_home');
            } else{
               return redirect('/');
            }
            
        }else{
            return redirect()
            ->back()
            ->withErrors(['active' => 'Incorrect Email or password.']);
        }
    }
    public function Logout(Request $request){
        $user = Auth::user();
        $this->activities_log($user->id,'Logout','Logout to system');
		 if ($user->role_id == '1') {
            $path='/admin/login';
        }else{
            $path='/';
        }
        Auth::logout();
        Session::flush(); 
        return redirect($path);
    }
    
}
