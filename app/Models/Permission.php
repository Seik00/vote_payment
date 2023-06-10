<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = [
        'user_role_id', 'role_type','permission_name', 'permission','updated_at'
    ];
}
