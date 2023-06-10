<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AttachFile extends Model
{
    protected $table = 'attach_file';

    protected $fillable = [
        'user_id',
        'file_name', 
        'path'
    ];

    protected $appends = [
        'public_image_path'
    ];
    
    public function getPublicImagePathAttribute()
    {
      
        return url('public'.$this->path);
    } 
}
