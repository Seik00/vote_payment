<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'product_name', 'product_name_en', 'price', 'thumbnail', 'pv',
    ];

    protected $appends = [
        'public_image_path',
    ];

    public function getPublicImagePathAttribute()
    {
        return url('public' . $this->thumbnail);
    }

}
