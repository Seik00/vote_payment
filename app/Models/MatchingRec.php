<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchingRec extends Model
{
    protected $table = 'matching_rec';

    protected $fillable = ['user_id', 'get_bonus', 'left_point', 'right_point', 'matching_point'];
    protected $appends = [
        'user'
    ];
    
    public function getUserAttribute()
    {
        $user = User::where('id',$this->user_id)->first();
        return $user ? $user : null;
        
    }
    
}
