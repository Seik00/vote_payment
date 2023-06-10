<?php
namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\SiteHelper;
use App\Models\GlobalCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{

    public function __construct(Request $request)
    {
        //$lang = SiteHelper::getLang(); 
        view()->share([
            'lang' => 'en',
        ]);
    }

    public function registerPage(Request $request)
    {

        if (SiteHelper::isLogin()) {
            return redirect()->route('site_home');
        }
        $country = GlobalCountry::where('status', '1')->orderByRaw('sort=0, sort ASC')->orderBy('name_en', 'ASC')->get();

        return view('web.register')->with('country', $country)->with('ref_id', $request->get('ref_id'));
    }

    public function doregisterPage(Request $request)
    {
        $rules = [
            'username' => 'required|min:6',
            //'contact_number' => 'required|regex:/(01)[0-9]/|min:10',
            'password' => 'required|min:6|same:password_confirmation',
            'password_confirmation' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $params = [
                'username' => $request->username,
                'contact_number' => $request->contact_number,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,

                'ref_id' => $request->ref_id,
            ];

            //$return = SiteHelper::callApi('auth/signup', 'post', $params);

            if ($return['status'] == '200') {
                $data = json_decode($return['data'], true);

                if ($data['code'] == '0') {
                    return redirect()->route('site_register')->with('success', __('site.Register successfully!'));
                } else {
                    return redirect()->back()->with('error', __('site.' . $data['message']))->withInput();}
            }

            $validator->getMessageBag()->add('username', __('site.Invalid Request!'));
            return redirect()->back()->withErrors($validator)->withInput();
        }

        return redirect()->route('site_register');
    }
    public function loginPage(Request $request)
    {

        return view('web.auth.login');
    }

    public function dologinPage(Request $request)
    {
        $validator = $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $user = auth()->user();
		$user_data = array(
			'username' => $request->get('username'),
			'password' => $request->get('password'),
		);

		if (auth()->attempt($user_data, ($request->get('remember') == 'on') ? true : false)) {
			$this->activities_log('Login', 'Login to system frontend');
			//SiteHelper::setAuth();

			return redirect()->route('webIndex')->with('success', __('site.Login successfully!'));
		} else {
            return redirect()
            ->back()
            ->withErrors(['active' => 'Incorrect Username or password.']);
        }
    }

    public function dologoutPage(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginPage')->with('success', __('site.Logout successfully!'));
    }

    public function forgotPassword(Request $request)
    {

        return view('web.auth.forgotPassword');
    }
}
