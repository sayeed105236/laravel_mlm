<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function index()
    {
    $payment=PaymentMethod::all();
      return view('admin.pages.payment_method',compact('payment'));
    }
    public function Store(Request $request)
    {
      $request->validate([
      'name' => 'required',
      'wallet_id' => 'required',

  ]);
    $name = $request->name;
    $wallet_id = $request->wallet_id;
    $acc_name= $request->acc_name;
    $status=$request->status;
    $payment = new PaymentMethod();
    $payment-> name = $name;
    $payment->acc_name=$acc_name;
    $payment-> wallet_id =$wallet_id;
    $payment->status=$status;
    $payment->save();
    return back()->with('Wallet_added','Wallet added successfully');
  }
  public function Update(Request $request)
  {
    //dd($request);

    $name = $request->name;
    $wallet_id = $request->wallet_id;
    $status=$request->status;
    $acc_name= $request->acc_name;

    $payment = PaymentMethod::find($request->id);
    $payment->name =$name;
    $payment->acc_name=$acc_name;
    $payment->wallet_id =$wallet_id;

    $payment->status=$status;

    $payment->save();

      return back()->with('wallet_updated','wallet has been updated successfully!');
  }
  public function Delete($id)
  {
      $payment=PaymentMethod::findOrFail($id)->delete();
      $notification=array(
          'message'=>'Request Deleted !!!',
          'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);
  }
}
