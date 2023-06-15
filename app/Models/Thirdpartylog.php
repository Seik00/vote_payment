<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thirdpartylog extends Model
{
    protected $table = 'thirdparty_log';

    protected $fillable = [
        'user_id',
        'platform',
        'link',
        'send_data',
        'respond_data', 
        'created_at',
        'updated_at'
    ];
}
