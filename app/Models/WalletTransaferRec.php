<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
class WalletTransaferRec extends Model
{
    protected $table = 'wallet_transfer_rec';
    
    protected $fillable = [
        'user_id', 'to_id', 'founds', 'add_time', 'wallet', 'ago', 'current', 'balance', 'dis'
    ];
    protected $appends = [
        'user','to_user'
    ];

    public function getUserAttribute()
    {
        $user = User::where('id',$this->user_id)->first();
        return $user ? $user : null;
    }
    public function getToUserAttribute()
    {
        $user = User::where('id',$this->to_id)->first();
        return $user ? $user : null;
    }
}
