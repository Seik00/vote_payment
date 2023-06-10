<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class StaticBonus extends Model
{
    protected $table = 'static_bonus';

    protected $fillable = [
        'user_id', 
        'founds',  'wallet1','wallet2',
        'current', 
        'detail', 
        'detailen', 
        'detailvn',
        'detailin',
        'detailth',
        'dis'
    ];
   
    protected $appends = [
        'user'
    ];

    public function getUserAttribute()
    {
        $user = User::where('id',$this->user_id)->first();
        return $user ? $user : null;
        
    }
}
