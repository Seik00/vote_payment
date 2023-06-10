<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AttachFile;
use App\Models\GlobalCountry;
use App\User;
class Deposit extends Model
{
    protected $table = 'deposit';

    const PENDING = 0;
    const APPROVE = 1;
    const REJECTED = 2;

    protected $fillable = [
        'user_id', 
        'system_bank_id',
        'amount', 
        'pay_amount',
        'document',
        'country_id',
        'status'
    ];
    protected $appends = [
        'user','uploaded_file','status_remark','country'
    ];

    public function getUserAttribute()
    {
        $user = User::where('id',$this->user_id)->first();
        return $user ? $user : null;
        
    }
    public function getStatusRemarkAttribute()
    {
        if($this->status==0){
        return __('site.PENDING');
        }elseif($this->status==1){
            return __('site.APPROVE');
        }elseif($this->status==2){
            return __('site.REJECTED');
        }
    }
    public function system_bank(){
        return $this->hasOne('App\Models\SystemBank', 'id', 'system_bank_id');
    }
	public function getUploadedFileAttribute()
    {
        $atteched_file = explode(",", $this->document);
        $file = AttachFile::wherein('id', $atteched_file)->get();
        return $file;
    }
    public function getCountryAttribute()
    {
        return GlobalCountry::where('id', $this->country_id)->first();

    }
}
