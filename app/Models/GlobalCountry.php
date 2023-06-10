<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalCountry extends Model
{
    protected $table = 'global_country';

    protected $fillable = ['sort', 'status','buy','sell'];
    protected $appends = [
        'phone_code','activate','flag'
    ];
    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function getPhoneCodeAttribute()
    {
        return str_replace('+', '',$this->country_code);
    }
    
    public function getActivateAttribute()
    {
        if($this->status==0){
            return 'Disabled';
        }else{
            return 'Enabled';
        }
        
    }
    public function getFlagAttribute()
    {
      
        return url('/images/flag/'.$this->name_en).'.png';
    } 
}
