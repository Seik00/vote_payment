<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
use App\Http\Controllers\VoteController;
Auth::routes();

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Route::group(['prefix' => '/'], function () {

    Route::get('/', 'SiteController@redirectLoginPage');

    Route::group(['namespace' => 'web'], function () {
        Route::get('/login', 'SiteController@loginPage')->name('site_index');
        Route::get('/register/{ref?}', 'SiteController@registerPage')->name('site_register_with_ref');
        Route::get('/register', 'SiteController@registerPage')->name('site_register');
        Route::post('/register', 'SiteController@doregisterPage')->name('site_doregister');
    });
});

Route::group(['prefix' => 'web', 'namespace' => 'web'], function () {
    Route::get('/', 'SiteController@redirectLoginPage');
    Route::get('/get_user_info', [VoteController::class, 'get_user_info']);
    Route::get('/count_voted', [VoteController::class, 'count_voted']);
    Route::get('/admin_get_table', [VoteController::class, 'admin_get_table']);

    Route::get('/', 'AuthController@loginPage')->name('loginPage');
    Route::post('/login', 'AuthController@dologinPage')->name('dologinPage');
    Route::get('/logout', 'AuthController@dologoutPage')->name('dologoutPage');
    // Route::get('/forgot-password', 'Auth\ForgotPasswordController@index')->name('forgetPassword');
    // Route::post('/reset-password', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password_email');
    Route::get('/forgotPassword', 'AuthController@forgotPassword')->name('forgotPassword');

    Route::group(['prefix' => 'home'], function () {
        Route::get('/index', 'HomeController@index')->name('webIndex');
    });
  
    Route::group(['prefix' => 'member'], function () {
        Route::post('/memberuploadFile', 'MemberController@memberuploadFile')->name('memberuploadFile');
        Route::get('/memberRegister', 'MemberController@memberRegister')->name('webMemberRegister');
        Route::post('/domemberRegister', 'MemberController@domemberRegister')->name('domemberRegister');
        Route::get('/userBank', 'MemberController@userBank')->name('webuserBank');
        Route::post('/douserBank', 'MemberController@douserBank')->name('douserBank');
        Route::post('/doUploadIcon', 'MemberController@doUploadIcon')->name('doUploadIcon');
        Route::get('/chgSecPwd', 'MemberController@chgSecPwd')->name('webchgSecPwd');
        Route::post('/doChgPwd', 'MemberController@doChgPwd')->name('doChgPwd');
        Route::post('/dochgSecPwd', 'MemberController@dochgSecPwd')->name('dochgSecPwd');
        Route::get('/setSecPwd', 'MemberController@setSecPwd')->name('websetSecPwd');
        Route::post('/dosetSecPwd', 'MemberController@dosetSecPwd')->name('dosetSecPwd');
        Route::post('/updateAddress', 'MemberController@updateAddress')->name('updateAddress');
    });
});

