<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDevice extends Model
{
    protected $table = 'user_device';

    protected $fillable = [
        'user_id','device_token','os_type',
    ];
}
