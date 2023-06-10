<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemBanner extends Model
{
    protected $table = 'system_banner';

    protected $fillable = [
        'name',
		'path',
		'active',
    ];
}
