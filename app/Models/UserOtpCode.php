<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOtpCode extends Model
{
    protected $table = 'user_otp_codes';

    protected $fillable = [
        'user_id',
        'email',
        'code',
        'expiry_date',
    ];
}
