<?php

namespace App\Models;

use App\Models\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;

class ProductRedeemLog extends Model
{
    protected $table = 'product_redeem_log';

    protected $fillable = [
        'user_id', 'delivery_type', 'product_id',
    ];

    protected $appends = [
        'product_info', 'user',
    ];

    public function getUserAttribute()
    {
        $user = User::where('id', $this->user_id)->first();
        $user->address = UserAddress::where('user_id', $this->user_id)->first();
        return $user;
    }

    public function getProductInfoAttribute()
    {
        if ($this->product_id > 0) {
            $product_info = Product::where('id', $this->product_id)->first();
        } else {
            $product_info = null;
        }

        return $product_info;
    }
}
