<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AddMoney extends Model
{
    use HasFactory;
      protected $guarded =[];
    protected $table ="add_money";
    public function user()
    {

         return $this->belongsTo(User::class, 'user_id');

    }
}
