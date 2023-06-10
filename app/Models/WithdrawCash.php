<?php

namespace App\Models;

use App\Models\GlobalCountry;
use App\User;
use Illuminate\Database\Eloquent\Model;

class WithdrawCash extends Model
{
    protected $table = 'withdraw_cash';

    const PENDING = 0;
    const APPROVE = 1;
    const SUCCESS = 2;
    const REJECTED = 3;

    protected $fillable = [
        'user_id',
        'amount',
        'get_amount',
        'currency',
        'wallet',
        'bank_country',
        'bank_name',
        'bank_user',
        'bank_number',
        'branch',
        'swift_code',
        'remark',
        'status',
    ];
    protected $appends = [
        'user', 'status_remark', 'country',
    ];

    public function getUserAttribute()
    {
        $user = User::where('id', $this->user_id)->first();
        return $user ? $user : null;

    }
    public function getCountryAttribute()
    {
        $user = GlobalCountry::where('currency_code', $this->currency)->first();
        return $user ? $user : null;

    }
    public function getStatusRemarkAttribute()
    {
        if ($this->status == 0) {
            return __('site.PENDING');
        } elseif ($this->status == 1) {
            return __('site.APPROVE');
        } elseif ($this->status == 2) {
            return __('site.SUCCESS');
        } elseif ($this->status == 3) {
            return __('site.REJECTED');
        }
    }
}
