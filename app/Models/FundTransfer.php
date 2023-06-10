<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
class FundTransfer extends Model
{
    protected $table = 'fund_transfer';

    protected $fillable = [
        'user_id', 'found', 'found_type', 'in_type', 'out_type', 'action', 'previous', 'current', 
        'detail', 'detailen','remark'
    ];
    protected $appends = [
        'user'
    ];

    public function getUserAttribute()
    {
        $user = User::where('id',$this->user_id)->first();
        return $user ? $user : null;
        
    }
}
