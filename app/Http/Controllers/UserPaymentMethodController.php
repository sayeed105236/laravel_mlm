<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPayment;
use Auth;

class UserPaymentMethodController extends Controller
{
    public function index($id)
    {
      $payment=UserPayment::where('user_id',Auth::id())->get();
      return view('users.pages.user_payment_method',compact('payment'));
    }
    public function Store(Request $request)

    {
      //dd($request);
    $user_id= $request->user_id;
    $payment_method_id = $request->payment_method_id;
    $wallet_id = $request->wallet_id;
    $acc_name= $request->acc_name;
    $status=$request->status;
    $payment = new UserPayment();
    $payment-> user_id = $user_id;

    $payment-> payment_method_id = $payment_method_id;
    $payment->acc_name=$acc_name;
    $payment-> wallet_id =$wallet_id;
    $payment->status=$status;
    $payment->save();
    return back()->with('Wallet_added','Wallet added successfully');
  }
  public function Update(Request $request)
  {
    //dd($request);
    $user_id= $request->user_id;
    $payment_method_id = $request->payment_method_id;
    $wallet_id = $request->wallet_id;
    $status=$request->status;
    $acc_name= $request->acc_name;

    $payment = UserPayment::find($request->id);
    $payment-> user_id = $user_id;

    $payment->payment_method_id =$payment_method_id;
    $payment->acc_name=$acc_name;
    $payment->wallet_id =$wallet_id;

    $payment->status=$status;

    $payment->save();

      return back()->with('wallet_updated','wallet has been updated successfully!');
  }
  public function Delete($id)
  {
      $payment=UserPayment::findOrFail($id)->delete();
      $notification=array(
          'message'=>'Request Deleted !!!',
          'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);
  }
}
