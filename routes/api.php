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
    });

    Route::group(['middleware' => 'check.access'], function () {
        Route::group(['prefix' => 'votepay'], function () {
            Route::post('get_info', 'VotePayController@get_info');
            Route::match(['get', 'post'], 'success', 'VotePayController@successPayment');
            Route::match(['get', 'post'], 'cancel', 'VotePayController@cancelPayment');
        });
    });
    

    Route::group(['prefix' => 'project'], function () {
        Route::post('requestEmailOtp', 'APIController@requestEmailOtp');
        Route::get('test', 'APIController@test');
        Route::post('checkOTP', 'APIController@checkOTP');
        Route::get('/getData', 'APIController@get_rate');
    });
    
});
