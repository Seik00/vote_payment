<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
class Ticket extends Model
{
    protected $table = 'ticket';
    
    protected $fillable = [
        'user_id', 'title', 'body', 'add_time', 'rebody', 'ruid', 'lan', 're_time', 'type', 'user_read', 'admin_read',
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
