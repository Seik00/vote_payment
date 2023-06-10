<?php

namespace App\Models;

use App\Models\AttachFile;
use App\Models\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;

class ProductRedeem extends Model
{
    protected $table = 'product_redeem';

    protected $fillable = [
        'user_id', 'user_package_id', 'product_id', 'product_redeem_log_id','quantity'
    ];

    protected $appends = [
        'public_image_path', 'product_info',
    ];

    public function getPublicImagePathAttribute()
    {
        $atteched_file = explode(",", $this->image);
        $file = AttachFile::wherein('id', $atteched_file)->get();
        return $file;
    }
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
