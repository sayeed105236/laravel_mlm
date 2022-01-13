<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserPayment;

class PaymentMethod extends Model
{
    use HasFactory;
      protected $table ="payment_methods";
      public function UserPaymentMethod()
      {
          return $this->belongsTo(UserPayment::class,'payment_method_id');
      }
}
