<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cookie;

use App\Http\SiteHelper;

class SiteController extends Controller
{
	
	public function __construct(Request $request) {
		$lang = SiteHelper::getLang();
		View::share('lang', $lang);
		
		//get referral id
		$ref = $request->ref;
		
		if ($ref != '') {
			SiteHelper::setReferralId($ref);
		}
	}
	
	function loginPage(Request $request) {
		if (SiteHelper::isLogin()) {
			return redirect()->route('site_home');
		}
		
		return view('site.login');
	}
	
	function dologinPage(Request $request) {
		$rules = [
			'username' => 'required|min:6',
			'password' => 'required|min:6',
		];
		
		$validator = Validator::make($request->all(), $rules);
		
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		} else {
			$params = [
				'username' => $request->username,
				'password' => $request->password
			];
			
			$return = SiteHelper::callApi('signin', 'post', $params);
			
			if ($return['status'] == '200') {
				$data = json_decode($return['data'], true);
				
				if ($data['status']) {
					SiteHelper::setAuth($data);
					return redirect()->route('site_home')->with('success', __('site.Login successfully!'));
				}
			}
			
			$validator->getMessageBag()->add('password', __('site.Invalid Username or Password!'));
			return redirect()->back()->withErrors($validator)->withInput();
		}
		
		return redirect()->route('site_home');
	}
	
	function dologoutPage(Request $request) {
		SiteHelper::clearAuth();
		return redirect()->route('site_index')->with('success', __('site.Logout successfully!'));;
	}
	
	function forgotpasswordPage(Request $request) {
		if (SiteHelper::isLogin()) {
			return redirect()->route('site_home');
		}
		
		return view('site.forgotpassword');
	}
	
	function doforgotpasswordPage(Request $request) {
		$rules = [
			'mobile_no' => 'required|regex:/(01)[0-9]/|min:10',
		];
		
		$validator = Validator::make($request->all(), $rules);
		
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		} else {
			$params = [
				'phone' => $request->mobile_no,
			];
			
			/*
			$return = SiteHelper::callApi('signin', 'post', $params);
			
			if ($return['status'] == '200') {
				if ($data['status']) {
					
					
					return redirect()->route('site_forgotpassword')->with('success', __('site.Request reset successfully!'));
				}
			}
			*/
			$validator->getMessageBag()->add('username', __('site.Invalid Request!'));
			return redirect()->back()->withErrors($validator)->withInput();
		}
		
		return redirect()->route('site_forgotpassword');
	}
	
	function registerPage(Request $request) {
		if (SiteHelper::isLogin()) {
			return redirect()->route('site_home');
		}
		
		return view('site.register');
	}
	
	function doregisterPage(Request $request) {
		$rules = [
			'username' => 'required|min:6',
			'mobile_no' => 'required|regex:/(01)[0-9]/|min:10',
			'password' => 'required|min:6|same:confirmpassword',
			'confirmpassword' => 'required',
		];
		
		$validator = Validator::make($request->all(), $rules);
		
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		} else {
			$params = [
				'username' => $request->username,
				'mobile_no' => $request->mobile_no,
				'password' => $request->password,
				'ref' => SiteHelper::getReferralId(),
				'token' => $request->token,
			];
			
			$return = SiteHelper::callApi('register', 'post', $params);
			
			if ($return['status'] == '200') {
				$data = json_decode($return['data'], true);
				
				if ($data['status']) {
					return redirect()->route('site_index')->with('success', __('site.Register successfully!'));
				} else {
					
					if ($data['keyword'] == 'Incorrect_Mobile_no') {
						$column = 'mobile_no';
						$message = $data['error_code'].' : '.__('site.Mobile Number already taken by others.');
					} else if ($data['keyword'] == 'Incorrect_name') {
						$column = 'usename';
						$message = $data['error_code'].' : '.__('site.Username already taken by others.');
					} else if ($data['keyword'] == 'Incorrect_refferal') {
						$column = 'usename';
						$message = $data['error_code'].' : '.__('site.Incorrect Referral user.');
					} else {
						$column = 'username';
						$message = $data['error_code'].' : '.__('site.Invalid Request!');
					}
					
					$validator->getMessageBag()->add($column, $message);
					return redirect()->back()->withErrors($validator)->withInput();
				}
			}
			
			$validator->getMessageBag()->add('username', __('site.Invalid Request!'));
			return redirect()->back()->withErrors($validator)->withInput();
		}
		
		return redirect()->route('site_register');
	}
	
	function homePage(Request $request) {
		$promotions = [];
		$nologinPromotions = false;
		
		if (SiteHelper::isLogin()) {
			$return = SiteHelper::callApi('user/getPromotionList', 'get', []);
			
			if ($return['status']) {
				$data = json_decode($return['data'], true);
				$promotions = $data['data'];
			} else {
				$nologinPromotions = true;
			}
		} else {
			$nologinPromotions = true;
		}
		
		if ($nologinPromotions) {
			$return = SiteHelper::callApi('getPromotionList', 'get', []);
			if ($return['status']) {
				$data = json_decode($return['data'], true);
				$promotions = $data['data'];
			}
		}
		
		return view('site.home', [
			'promotions' => $promotions,
		]);
	}
	
	function profilePage(Request $request) {
		$game_info = [];
		$profile = [];
		
		if (!SiteHelper::isLogin()) {
			return redirect()->route('site_index')->with('error', __('site.Please Login!'));
		}
		
		$return = SiteHelper::callApi('user/getGameWallet', 'post', []);
		
		if ($return['status'] == '200') {
			$data = json_decode($return['data'], true);
			$game_info = $data['game_info'];
			$profile = $data['user'];
		} else {
			return redirect()->route('site_index')->with('error', __('site.Please Login!'));
		}
		
		return view('site.profile', [
			'game_info' => $game_info,
			'profile' => $profile,
		]);
	}
	
	function changepasswordPage(Request $request) {
		if (!SiteHelper::isLogin()) {
			return redirect()->route('site_index')->with('error', __('site.Please Login!'));
		}
		
		return view('site.changepassword');
	}
	
	function dochangepasswordPage(Request $request) {
		$rules = [
			'password' => 'required|min:6',
			'new_password' => 'required|min:6',
			'confirm_new_password' => 'required|min:6|same:new_password',
		];
		
		$validator = Validator::make($request->all(), $rules);
		
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		} else {
			$params = [
				'old_password' => $request->password,
				'new_password' => $request->new_password,
			];
			
			$return = SiteHelper::callApi('user/changePassword', 'post', $params);
			
			if ($return['status'] == 200) {
				$data = json_decode($return['data'], true);
				
				if ($data['status']) {
					return redirect()->route('site_profile')->with('success', __('site.Password successfully update!'));
				} else {
					$validator->getMessageBag()->add('password', __('site.Incorrect password!'));
					return redirect()->back()->withErrors($validator);
				}
				
			} else {
				return redirect()->route('site_changepassword')->with('error', __('site.Invalid Request!'));
			}
		}
		
		return redirect()->route('site_changepassword');
	}
	
	function getreferrallinkPage(Request $request) {
		if (!SiteHelper::isLogin()) {
			$profile = [];
		} else {
			$profile = SiteHelper::getUserCookie();
		}
		
		return view('site.referral', [
			'profile' => $profile,
		]);
	}
	
	function depositPage(Request $request) {
		if (!SiteHelper::isLogin()) {
			return redirect()->route('site_index')->with('error', __('site.Please Login!'));
		}
		
		$bank_lists = [];
		$promotion_lists = [];
		$game_lists = [];
		
		//banks
		$return = SiteHelper::callApi('user/point/deposit_bank', 'post', []);
		
		if ($return['status'] == 200) {
			$data = json_decode($return['data'], true);
			$bank_lists = $data['data'];
		}
		
		//promotions
		$return = SiteHelper::callApi('user/getPromotionList', 'get', []);
		
		if ($return['status'] == 200) {
			$data = json_decode($return['data'], true);
			$promotion_lists = $data['data'];
		}
		
		//games
		$return = SiteHelper::callApi('getGame', 'post', []);
		
		if ($return['status'] == 200) {
			$data = json_decode($return['data'], true);
			$game_lists = $data['data'];
		}
		
		//get last record
		$return = SiteHelper::callApi('user/point/last_deposit', 'get', []);
		
		if ($return['status']) {
			$data = json_decode($return['data'], true);
			$model = $data['data'];
		}
		
		$deposit_type = $request->old('deposit_type') != '' ? $request->old('deposit_type') : ( (isset($model['deposit_type'])) ? $model['deposit_type'] : '' );
		$deposit_bank = $request->old('bank') != '' ? $request->old('bank') : ( (isset($model['system_bank_id'])) ? $model['system_bank_id'] : '' );
		$deposit_amount = $request->old('amount') != '' ? $request->old('amount') : ( (isset($model['amount'])) ? $model['amount'] : '' );
		$deposit_to = $request->old('depositto') != '' ? $request->old('depositto') : ( (isset($model['wallet'])) ? $model['wallet'] : '' );
		$deposit_promotion = $request->old('promotions') != '' ? $request->old('promotions') : ( (isset($model['promotion_id'])) ? $model['promotion_id'] : '' );
		
		
		return view('site.deposit', [
			'bank_lists' => $bank_lists,
			'promotion_lists' => $promotion_lists,
			'game_lists' => $game_lists,
			'deposit_type' => $deposit_type,
			'deposit_bank' => $deposit_bank,
			'deposit_amount' => $deposit_amount,
			'deposit_to' => $deposit_to,
			'deposit_promotion' => $deposit_promotion,
		]);
	}
	
	function dodepositPage(Request $request) {
		$rules = [
			'deposit_type' => 'required|integer',
			'bank' => 'required|integer',
			'amount' => 'required|integer',
			'depositto' => 'required|integer',
			'promotions' => 'required|integer',
			'receipt' => 'required|file|mimes:jpg,jpeg,bmp,png,gif',
		];
		
		$validator = Validator::make($request->all(), $rules);
		
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		} else {
			$params = [
				'system_bank_id' => $request->bank,
				'promotion_id' => $request->promotions,
				'amount' => $request->amount,
				'deposit_type' => $request->deposit_type,
				'deposit_wallet' => $request->depositto,
			];
			
			if($request->hasFile('receipt')) {
				$params['receipt'] = new \CurlFile($request->receipt->getPathName(), $request->receipt->getMimeType());
			}
			
			$return = SiteHelper::callApi('user/point/do_deposit', 'upload', $params);
			
			if ($return['status'] == 200) {
				$data = json_decode($return['data'], true);
				
				if ($data['status']) {
					return redirect()->route('site_deposit')->with('success', __('site.Deposit request successfully!'));
				} else {
					$validator->getMessageBag()->add('amount', __('site.Invalid Request!'));
					return redirect()->back()->withErrors($validator);
				}
				
			} else {
				return redirect()->route('site_deposit')->with('error', __('site.Invalid Request!'));
			}
			
		}
	
		return redirect()->route('site_deposit');
	}
	
	function withdrawPage(Request $request) {
		if (!SiteHelper::isLogin()) {
			return redirect()->route('site_index')->with('error', __('site.Please Login!'));
		}
		
		$balance = 0;
		$balance1 = 0;
		$turnover_limit = 0;
		$model = [];
		
		$return = SiteHelper::callApi('user/getGameWallet', 'get', []);
		
		if ($return['status']) {
			$data = json_decode($return['data'], true);
			
			$balance = isset($data['user']['point']) ? $data['user']['point'] : 0;
			$balance1 = isset($data['user']['point2']) ? $data['user']['point2'] : 0;
			
			$games = isset($data['game_info']) ? $data['game_info'] : [];
			
			foreach ($games as $game) {
				$balance += $game['point'];
			}
		}
		
		//get last record
		$return = SiteHelper::callApi('user/point/last_withdraw', 'get', []);
		
		if ($return['status']) {
			$data = json_decode($return['data'], true);
			$model = $data['data'];
		}
		
		$bank_account_number = ($request->old('bank_account_number') != '') ? $request->old('bank_account_number') : ( (isset($model['bank_account'])) ? $model['bank_account'] : '' );
		$bank_account_name = ($request->old('bank_account_name') != '') ? $request->old('bank_account_name') : ( (isset($model['bank_user'])) ? $model['bank_user'] : '' );
		$bank_name = ($request->old('bank_name') != '') ? $request->old('bank_name') : ( (isset($model['bank_name'])) ? $model['bank_name'] : '' );
		$withdrawfrom = $request->old('withdrawfrom', $request->wallet);
		
		$banks = ['Affin Bank', 'Alliance Bank', 'AmBank', 'Bank of China', 'CIMB Bank', 'Citibank', 'HSBC Bank Malaysia', 'Hong Leong Bank', 'Malayan Banking', 'OCBC Bank', 'Public Bank', 'RHB Bank', 'Standard Chartered Bank', 'United Overseas Bank'];
		
		return view('site.withdraw', [
			'balance' => number_format($balance, 2, '.', ','),
			'balance1' => number_format($balance1, 2, '.', ','),
			'turnover_limit' => number_format($turnover_limit, 2, '.', ','),
			'banks' => $banks,
			'bank_account_number' => $bank_account_number,
			'bank_account_name' => $bank_account_name,
			'bank_name' => $bank_name,
			'withdrawfrom' => $withdrawfrom,
		]);
	}
	
	function dowithdrawPage(Request $request) {
		$rules = [
			'withdrawfrom' => 'required|integer',
			'bank' => 'required',
			'bank_account_number' => 'required|integer',
			'bank_account_name' => 'required',
		];
		
		$validator = Validator::make($request->all(), $rules);
		
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		} else {
			$params = [
				'from_wallet' => $request->withdrawfrom,
				'amount' => 0,
				'bank_name' => $request->bank,
				'bank_account' => $request->bank_account_number,
				'bank_user' => $request->bank_account_name,
			];
			
			$return = SiteHelper::callApi('user/point/do_withdraw', 'post', $params);
			
			if ($return['status'] == 200) {
				$data = json_decode($return['data'], true);
				
				if ($data['status']) {
					return redirect()->route('site_withdraw')->with('success', __('site.Withdraw request successfully!'));
				} else {
					$error_code = isset($data['error_code']) ? $data['error_code'] : '';
					
					$validator->getMessageBag()->add('amount', __('site.Invalid Request!')." ".$error_code);
					return redirect()->back()->withErrors($validator)->withInput();
				}
			} else {
				return redirect()->route('site_withdraw')->with('error', __('site.Invalid Request!'));
			}
		}
		
		return redirect()->route('site_withdraw');
	}
	
	function gamePage(Request $request) {
		$games = [];
		
		$return = SiteHelper::callApi('getGame', 'get', []);
		
		if ($return['status'] == 200) {
			$data = json_decode($return['data'], true);
			
			if (isset($data['data'])) {
				$games = $data['data'];
			}
		}
		
		return view('site.game', [
			'games' => $games,
		]); 
	}
	
	function chatPage(Request $request) {
		return view('site.chat',[]); 
	}
	
	function statusPage(Request $request) {
		$date_from = (empty($request->date_from)) ? date('01/m/Y') : $request->date_from;
		$date_to = (empty($request->date_to)) ? date('t/m/Y') : $request->date_to;
		
		
		return view('site.status',[
			'date_from' => $date_from,
			'date_to' => $date_to,
		]); 
	}
	
	function gameinPage(Request $request) {
		$game_id = $request->game_id;
		
		return view('site.gamein',[
			'game_id' => $game_id,
		]); 
	}
	function dogameinPage(Request $request) {
		$status = 'fail';
		$message = __('site.Invalid Request!');
		
		$params = [
			'wallet_action' => 'in',
			'amount' => $request->amount,
			'wallet' => $request->game_id,
		];
		$return = SiteHelper::callApi('user/point/wallet_convert', 'post', $params);
		
		if ($return['status'] == 200) {
			$data = json_decode($return['data'], true);
			
			if ($data['status']) {
				$status = 'ok';
				$message = __('site.Deposit request successfully!');
			} else {
				$message = __('site.Insufficient Balance');
			}
			
		}
		echo json_encode(['status' => $status, 'message' => $message]);
	}
	function gameoutPage(Request $request) {
		$game_id = $request->game_id;
		
		$return = SiteHelper::callApi('user/getGameWallet', 'post', []);
		
		if ($return['status'] == 200) {
			$data = json_decode($return['data'], true);
			$games = $data['game_info'];
			
			foreach ($games as $game) {
				if ($game['id'] == $game_id) {
					$amount = number_format($game['point'], 2, '.', ',');
					break;
				}
			}
		}
		
		return view('site.gameout',[
			'game_id' => $game_id,
			'amount' => $amount,
		]); 
	}
	function dogameoutPage(Request $request) {
		$status = 'fail';
		$message = __('site.Invalid Request!');
		
		$params = [
			'wallet_action' => 'out',
			'amount' => 0,
			'wallet' => $request->game_id,
		];
		
		$return = SiteHelper::callApi('user/point/wallet_convert', 'post', $params);
		
		if ($return['status'] == 200) {
			$data = json_decode($return['data'], true);
			
			if ($data['status']) {
				$status = 'ok';
				$message = __('site.Withdraw request successfully!');
			} else {
				$message = __('site.Insufficient Balance');
			}
			
		}
		echo json_encode(['status' => $status, 'message' => $message]);
	}
	function gameupdate(Request $request) {
		$games = [];
		$point = [];
		
		$return = SiteHelper::callApi('user/getGameWallet', 'post', []);
		
		if ($return['status'] == 200) {
			$data = json_decode($return['data'], true);
			
			if ($data['status']) {
				$_games = isset($data['game_info']) ? $data['game_info'] : [];
				
				foreach ($_games as $_game) {
					$games[] = [
						'id' => $_game['id'],
						'name' => $_game['game_name'],
						'point' => number_format($_game['point'], 2, '.', ','),
					];
				}
				
				$profile = isset($data['user']) ? $data['user'] : [];
				
				$point = [
					'point' => number_format($profile['point'], 2, '.', ','),
					'point2' => number_format($profile['point2'], 2, '.', ','),
				];
			}
		}
		
		echo json_encode(['games' => $games, 'point' => $point]);
	}
}
