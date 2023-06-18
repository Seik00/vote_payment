<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'payment_gateway_order';

    protected $fillable = [
        'usdt_address',
        'username',
        'email',
        'phone',
        'payee_id',
        'currency',
        'order_no', 
        'merchant_code',
        'from_bank',
        'bank_account_number',
        'amount',
        'trans_id',
        'payment_status',
        'payment_done',
        'error_message',
        'created_at',
        'updated_at'
    ];
}