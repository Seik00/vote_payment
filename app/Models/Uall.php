<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uall extends Model
{
    protected $table = 'u_all';

    protected $fillable = [
        'user_id',
        'p',
        'j',
        'expiry_date',
    ];
}
