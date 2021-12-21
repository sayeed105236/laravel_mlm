<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentMethod;

class UserPayment extends Model
{
  use HasFactory;
    protected $table ="user_payments";

    public function payment()
    {
        return $this->belongsTo(PaymentMethod::class,'payment_method_id');
    }

}
