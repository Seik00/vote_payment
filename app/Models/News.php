<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title',
        'description', 
        'news_type', 
        'language', 
        'banner', 
        'is_display'
    ];

    protected $appends = [
        'public_path'
    ];
    
    public function getPublicPathAttribute()
    {
      
        return url('public'.$this->banner);
    } 
}
