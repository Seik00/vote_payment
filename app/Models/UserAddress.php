<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $table = 'user_address';

    protected $fillable = [
        'user_id', 'ic', 'address', 'poscode', 'state','fullname',
    ];
    protected $appends = [
        'user',
    ];

    public function getUserAttribute()
    {
        $user = User::where('id', $this->user_id)->first();
        return $user ? $user : null;

    }
}
