<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected $table = 'user_group';

    protected $fillable = [
        'user_id',
        'contact_number',
        'code',
        'expiry_date',
    ];

    protected $appends = [
        'public_image_path'
    ];
    
    public function getPublicImagePathAttribute()
    {
      
        return url($this->icon);
    } 
}
