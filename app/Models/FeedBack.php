<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class FeedBack extends Model
{
    protected $table = 'feed_back';

    protected $fillable = [
        'user_id', 'title', 'detail'
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
