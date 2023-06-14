<?php

use Illuminate\Http\Request;
use App\Http\Controllers\VoteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::name('api.')->namespace('Api')->group(function () {
    // Unprotected routes
    Route::group(['middleware' => 'guest:api'], function () {
        Route::group(['prefix' => 'cronjob'], function () {
            Route::get('SetSite', 'CronjobController@SetSite');
            Route::get('RunBonus', 'CronjobController@RunBonus');
            Route::get('RunDynamic', 'CronjobController@RunDynamic');
        });
        Route::get('test', 'APIController@test');

        Route::namespace ('Auth')->group(function () {
            Route::group(['prefix' => 'auth'], function () {
                Route::post('signup', 'RegisterController@signup');
                Route::post('login', 'LoginController@login');
                Route::post('logout', 'LoginController@logout');
                Route::post('request-user-otp', 'ForgotPasswordController@requestUserOtp');
                Route::post('request-otp', 'ForgotPasswordController@requestOtp');
                Route::post('requestEmailOtp', 'ForgotPasswordController@requestEmailOtp');
                Route::post('check-otp', 'ForgotPasswordController@checkOtp');
                Route::post('reset-password', 'ForgotPasswordController@resetPassword');
            });
        });

        Route::post('postSampleNotification', 'APIController@postSampleNotification')->name('postSampleNotification');

        // Export to excel
        Route::get('/exportExcel', 'GlobalAPIController@exportExcel');
        // Export to csv
        Route::get('/exportCSV', 'GlobalAPIController@exportCSV');
    });

    Route::group(['prefix' => 'global'], function () {
        Route::post('add_device_token', 'GlobalAPIController@add_device_token');
        Route::post('sent-otp', 'GlobalAPIController@sentOTP');
        Route::get('country_list', 'GlobalAPIController@country_list');
        Route::post('vote', 'VoteController@vote');
        Route::get('get_user_info', 'VoteController@get_user_info');
        Route::get('users_voted', 'VoteController@users_voted');
        Route::get('get_info', 'VotePayController@get_info');
    });

    Route::group(['middleware' => 'check.access'], function () {
        Route::group(['prefix' => 'votepay'], function () {
            Route::get('get_info', 'VotePayController@get_info');
            Route::post('success', 'VotePayController@successPayment');
            Route::post('cancel', 'VotePayController@cancelPayment');
        });
    });
    

    Route::group(['prefix' => 'project'], function () {
        Route::get('lookup', 'APIController@lookup');
        Route::middleware('jwt.auth')->group(function () {
            Route::get('shareStatus', 'APIController@shareStatus');
        });
        Route::get('productList', 'APIController@productList');

    });

    // Route::group(['prefix' => 'vote'], function () {
    //     Route::post('vote', 'VoteController@vote');
    // });
    // Protected routes
    Route::middleware('jwt.auth')->group(function () {
        Route::group(['prefix' => 'member'], function () {
            Route::get('get-member-info', 'MemberController@getMemberInfo');
            Route::post('update-member-info', 'MemberController@updateMemberInfo');
            Route::post('change-password', 'MemberController@changePassword');
            Route::post('set-secpassword', 'MemberController@setSecPassword');
            Route::post('change-secpassword', 'MemberController@changeSecPassword');
            Route::get('home-page', 'MemberController@homePage');
            Route::post('register-member', 'MemberController@registerMember');
            Route::post('user-bank', 'MemberController@userBank');
            Route::get('get-bank-info', 'MemberController@getBankInfo');
        });
        Route::group(['prefix' => 'project'], function () {
            Route::post('submit_share_record', 'APIController@submitShareRecord');
            Route::get('get-share-record', 'APIController@getShareRecord');
            Route::get('get-deposit-bank', 'APIController@getDepositBank');
        });
        Route::group(['prefix' => 'package'], function () {
            Route::get('get-upgrade-package', 'PackageController@getUpgradePackage');
            Route::post('upgrade-package', 'PackageController@purchasePackage');
            Route::get('get-package', 'PackageController@getPackage');
            Route::get('get-user-package', 'PackageController@getUserPackage');

        });

        Route::group(['prefix' => 'ticket'], function () {
            Route::get('get-ticket', 'TicketController@getTicket');
            Route::get('read-ticket', 'TicketController@readTicket');
            Route::post('create-ticket', 'TicketController@createTicket');
        });

        Route::group(['prefix' => 'wallet'], function () {
            Route::post('withdraw', 'WalletController@withdraw');
            Route::get('withdraw-record', 'WalletController@withdrawRecord');
            Route::post('deposit', 'WalletController@deposit');
            Route::get('deposit-record', 'WalletController@depositRecord');
            Route::post('wallet-transafer', 'WalletController@walletTransfer');
            Route::post('changeWallet', 'WalletController@changeWallet');

        });
        Route::group(['prefix' => 'record'], function () {
            Route::get('wallet-record', 'RecordController@walletRecord');
            Route::get('bonus-record', 'RecordController@bonusRecord');
        });
        Route::group(['prefix' => 'news'], function () {
            Route::get('video-list', 'NewsController@videoList');
            Route::get('news-list', 'NewsController@newsList');
        });
        Route::group(['prefix' => 'team'], function () {
            Route::get('downline-new', 'TeamController@downlineNew');
            Route::get('downline', 'TeamController@downline');
            Route::get('organize', 'TeamController@organize');
        });
        Route::group(['prefix' => 'upload'], function () {
            Route::post('upload-file', 'AttachmentController@uploadFile');
        });
    });
    
});
