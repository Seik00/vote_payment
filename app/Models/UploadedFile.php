<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadedFile extends Model
{
    protected $table = 'uploaded_file';

    protected $fillable = [
		'user_id',
        'path',
        'file_name'
    ];
	
	protected $appends = [
        'public_image_path'
    ];

    public function getPublicImagePathAttribute()
    {
        return url($this->path);
    } 
}
