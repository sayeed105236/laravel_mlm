<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashWallet extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $table ="cash_wallets";

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
