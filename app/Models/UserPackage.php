<?php

namespace App\Models;
use App\Models\Company_outlet;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserGroup;
use App\User;

class UserPackage extends Model
{
    protected $table = 'user_package';
	 protected $fillable = [
        'user_id', 'user_group_id', 'price','bv', 'pay', 'pay_type'
    ];
	protected $appends = [
        'user','package'
    ];

    public function getUserAttribute()
    {
        $user = User::where('id',$this->user_id)->first();
        return $user ? $user : null;
        
    }
    public function getPackageAttribute()
    {
        return UserGroup::where('id',$this->user_group_id)->first();
    }
}
