<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\LoginFailedException;
use App\Http\Resources\UserResource;
use App\UserDevice;
use App\Http\Controllers\Controller;
use Crater\Proxy\HttpKernelProxy;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Spatie\Activitylog\Traits\LogsActivity;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;
    // use ThrottlesLogins;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('api')->except(['store', 'update']);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    protected function loginCredential($request)
    {
        if (is_numeric($request->get('loginId'))) {
            return ['contact_number' => ltrim($request->get('loginId'), "0"), 'password' => $request->get('password')];
        } elseif (filter_var($request->get('loginId'), FILTER_VALIDATE_EMAIL)) {
            return ['email' => $request->get('loginId'), 'password' => $request->get('password')];
        }
        return ['user_login_id' => $request->get('loginId'), 'password' => $request->get('password')];
    }

    /**
     * @OA\Post(
     *     path="/api/auth/login",
     *     tags={"Auth"},
     *     summary="User login",
     *     description="User login",
     *     operationId="login",
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="username",
     *         in="query",
     *         description="loginId = username /phone number(without country code)",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="password",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error"
     *     )
     * )
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $token = JWTAuth::attempt([
            'username' => $request->get('username'),
            'password' => $request->get('password'),
        ]);

        if (!$token) {
            return $this->jsonResponse([
                'code' => 1,
                'data' => FALSE,
                'message' => 'LOGIN_FAIL'
            ]);
        }

        return $this->jsonResponse([
            'code' => 0,
            'data' => [
                'token' => $token,
                //'user' => UserResource::make(auth()->user()),
            ],
            'message' => 'Login_OK'
        ]);
    }
    /**
     * @OA\Post(
     *     path="/api/auth/logout",
     *     tags={"Auth"},
     *     summary="User logout",
     *     description="User logout",
     *      security={ {"bearerAuth": {}} },
     *     operationId="logout",
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="device_token",
     *         in="query",
     *         description="logout account and delete the previous token ",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error"
     *     )
     * )
     */

    /**
     * Logout a User
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        try {
            // log out user's session
            auth()->logout();

            // flush current session
            session()->flush();

            // invalidates token
            JWTAuth::parseToken()->invalidate();

            $success = true;
        } catch (TokenExpiredException $exception) { // token expired exception
            $success = true;
        } catch (\Exception $exception) {
            $success = false;
            Log::error('[AuthController] Unable to log out user id:' . json_encode($request->all()));
        }

        return $this->jsonResponse([
            'code' => 0,
            'message' => 'Logout_OK'
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/auth/changePassword",
     *     tags={"Auth"},
     *     summary="Change Password",
     *     description="Change user password",
     *     operationId="changePassword",
     *     security={{"bearerAuth":{}}},
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="current_password",
     *         in="query",
     *         description="current password",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="new password",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully changed password",
     *         @OA\JsonContent(
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error"
     *     )
     * )
     */
    public function changePassword(Request $request)
    {

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return $this->jsonResponse([
                'error_message' => 'Incorrect current password.',
                'error_code' => '0001',
                'status' => false,
            ]);
            exit;
        }
        $user = auth()->user();
        $this->activities_log(auth()->user()->id, 'change_password', 'Change Password');
        $user->password = bcrypt($request->password);
        $user->save();

        return $this->jsonResponse([
            'code' => 0,
            'message' => 'Password_changed'
        ]);

    }
}
