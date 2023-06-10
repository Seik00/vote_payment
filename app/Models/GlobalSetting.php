<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalSetting extends Model
{
    protected $table = 'global_setting';
    protected $fillable = ['global_key','key_value'];
    
}
