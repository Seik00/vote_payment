<?php

namespace App;

use App\Models\AttachFile;
use App\Models\GlobalCountry;
use App\Models\Role;
use App\Models\Uall;
use App\Models\UserGroup;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'username',
        'fullname',
        'user_group_id',
        'role_id',
        'pid',
        'p_level',
        'jid',
        'j_level',
        'group_type',
        'group_left',
        'group_right',
        'country_id',
        'email',
        'password',
        'd_password',
        'password2',
        'd_password2',
        'contact_number',
        'ic',
        'bio',
        'birthday',
        'wallet_address',
        'status',
        'point3',
        'sponsor_rate',
        'icon',
        'phone_verified_at',
        'remember_token',
        'wallet_address',
        'status',
    ];
    protected $appends = [
        // 'total_sponsor', 'share_link', 'package', 'country', 'sponsor', 'uploaded_icon',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getRoleInfoAttribute()
    {
        $role_type = Role::where('id', $this->role_id)->first();
        return $role_type;
    }
    public function oneTimePasscode()
    {
        return $this->hasOne('App\Models\UserOtpCode', 'user_id', 'id');
    }
    public function getPackageAttribute()
    {
        return UserGroup::where('id', $this->user_group_id)->first();
    }
    public function getShareLinkAttribute()
    {
        return url('register?ref_id=' . $this->username);
    }
    public function role_type()
    {
        $data = auth()->user();
        $role_type = Role::where('id', $data->role_id)->first();
        return $role_type->name;
    }
    public function getTotalSponsorAttribute()
    {
        return User::where('pid', $this->id)->count();
    }
    public function getSponsorAttribute()
    {
        return User::where('id', $this->pid)->first();
    }
    public function getCountryAttribute()
    {
        $country = GlobalCountry::where('id', $this->country_id)->first();
        return $country;
    }
    public function getUploadedIconAttribute()
    {
        $atteched_file = explode(",", $this->icon);
        $file = AttachFile::wherein('id', $atteched_file)->get();
        return $file;
    }
    public function checkDownline($user_id, $line = 'p')
    {

        return Uall::where('user_id', $user_id)->where($line, 'like', "%" . $this->id . "%")->first();

    }
    public function find_end($position = 'right')
    {
        if ($position == 'left') {
            $position = 'group_left';
        } else {
            $position = 'group_right';
        }
        if ($this->$position == 0) {
            return $this->$username;
        } else {

            for ($i = 0; $i < 99; $i++) {
                if ($i == 0) {
                    $me = DB::table('users')->where('id', $this->$position)->first();
                } else {
                    $me = DB::table('users')->where('id', $me->$position)->first();
                }

                if ($me->$position == 0) {
                    return $me->$username;
                    break;
                }
            }
        }
    }

}
