<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    protected $table = 'system_setting';

    protected $fillable = [
        'keyword',
		'value',
    ];
}
