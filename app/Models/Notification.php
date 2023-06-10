<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Notification extends Model
{
    protected $table = 'notification';

    protected $fillable = [
        'notice_type',
        'title',
        'description',
        'notice_read',
        'users_id',
    ];
}
