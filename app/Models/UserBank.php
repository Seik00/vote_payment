<?php

namespace App\Models;

use App\Models\GlobalCountry;
use Illuminate\Database\Eloquent\Model;

class UserBank extends Model
{
    protected $table = 'user_bank';

    protected $fillable = [
        'user_id', 'bank_country', 'bank_name', 'bank_user', 'bank_number', 'branch', 'swift_code',
    ];
    protected $appends = [
        'country',
    ];

    public function getCountryAttribute()
    {
        return GlobalCountry::where('id', $this->bank_country)->first();

    }
}
