<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddMoney;

class AddMoneyController extends Controller
{
    public function Manage()
  {

  }
  public function Store(Request $request)
  {
    //dd($request);
      $request->validate([
      'amount' => 'required',
      'method' => 'required',

  ]);
    $user_id = $request->user_id;
    $amount = $request->amount;
    $method=$request->method;
    $deposit = new AddMoney();
    $deposit-> user_id = $user_id;
    $deposit-> amount =$amount;
    $deposit->method=$method;
    $deposit->save();
    return back()->with('Money_added','Your request is Accepted. Wait for Confirmation!!');
  }
}
