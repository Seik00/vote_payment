<?php

namespace App\Models;

use App\Models\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model
{
    protected $table = 'product_purchase';

    protected $fillable = [
        'user_id', 'product_id', 'pv', 'bonus','quantity'
    ];

    protected $appends = [
        'product_info',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
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
