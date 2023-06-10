<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\MemberExistedException;
use App\Http\Controllers\Controller;
use App\User;
use DB;
//use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
 
    /**
     * @OA\Post(
     *     path="/api/auth/signup",
     *     tags={"Auth"},
     *     summary="signup",
     *     description="signup",
     *     operationId="signup",
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="username",
     *         in="query",
     *         description="username",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),  
	 *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="email",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ), 
     *  *     @OA\Parameter(
     *         name="country_id",
     *         in="query",
     *         description="country_id",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ), 
	 *     @OA\Parameter(
     *         name="contact_number",
     *         in="query",
     *         description="contact_number",
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
	  *     @OA\Parameter(
     *         name="password_confirmation",
     *         in="query",
     *         description="password_confirmation",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ), 
	  *     @OA\Parameter(
     *         name="ref_id",
     *         in="query",
     *         description="ref_id",
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
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws MemberExistedException
     */
    public function signup(Request $request)
    {
        Validator::validate($request->all(), [
            'username' => 'required',
            'contact_number' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'ref_id' => 'required',
        ]);

        // check member existed by username and email
        $username = $request->get('username');
        $email = $request->get('email');
        $existedUser = User::where('username', $username)->first();
        if ($existedUser) {
            return $this->jsonResponse([
                'code' => 2,
                'data' => false,
                'message' => 'MEMBER_EXITS'
                ]);
        }

        // extract user data, hash password and trim contact number
        $userData = $request->only('username', 'email', 'password','country_id');
        $userData['password'] = bcrypt($request->password);
        $userData['role_id'] = 2;
        $userData['d_password'] = $request->password;
        $ref = User::where('username',$request->ref_id)->first();
            
        if ($ref) {
          
            $userData['pid'] = $ref->id;
            $userData['p_level'] = $ref->p_level + 1;
        }else{
            return $this->jsonResponse([
                'code' => 2,
                'data' => false,
                'message' => 'INCORRECT_SPONSOR',
                ]);
        }
        if($request->ref_id){
            //安置
            /*$juser = User::where('username',$request->ref_id)->first();
            $error ='';
			if(empty($juser)){
				$error ='PLACEMENT_USER_ERROR'; 
			}
            
            if($juser->group_left == 0 ){
                $userData['group_type'] = 'A';
                $group = 'group_left';
            }elseif($juser->group_right == 0 ){
                $userData['group_type'] = 'B';
                $group = 'group_right';
            }else{
                $error ='PLACEMENT_GOT_USER'; 
            }

            $userData['jid'] = $juser->id;
            $userData['j_level'] = $juser->j_level+1;
            if($error){
                return $this->jsonResponse([
                    'code' => 2,
                    'data' => false,
                    'message' => $error
                    ]);
            }
            
			/*switch($_POST['group_type']){
				case "A":
				$search="group_left";
				break;
				case "B":
				$search="group_right";
				break;
				
			}
			if($juser->$search!=0){
				$error ='PLACEMENT_GOT_USER'; 
			}*/
           
        }
        
        // create user base on submitted data
        $user = User::create($userData);
       /*update placement
        $juser->$group = $user->id;
        $juser->save();*/
        DB::select('call rw102("'.$user->id.'")');
       
        // login automatically
        $loginCredential = ['username' => $user->username, 'password' => $request->get('password')];
        $token = JWTAuth::attempt($loginCredential);

        return $this->jsonResponse([
            'code' => 0,
            'data' => [
                'token' => $token,
                'user' => $user,
            ],
            'message' => 'Register_successful'
        ]);

    }

}
