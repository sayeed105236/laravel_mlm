<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddMoney;
use Illuminate\Support\Facades\Auth;
use App\Models\GeneralSettings;
use App\Models\CashWallet;

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
    //$method=$request->method;
    $txn_id=$request->txn_id;
    $deposit = new AddMoney();
    $deposit-> user_id = $user_id;
    $deposit-> amount =$amount;
    //$deposit->method=$method;
    $deposit->method='Deposit';
    $deposit->txn_id=$txn_id;
    $deposit->save();

    return back()->with('Money_added','Your request is Accepted. Wait for Confirmation!!');
  }


    public function moneyTransfer(Request $request)
    {
        //dd($request);
        $request->validate([

            'user_id' => 'required',
            'amount' => 'required',

        ]);

        $g_set = GeneralSettings::first();
        $sum_deposit=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
        $calculated_amount= ($request->amount+ ($request->amount)*$g_set->transfer_charge/100);
        //dd($sum_deposit < $calculated_amount,$sum_deposit,$calculated_amount);

        if ($sum_deposit < $calculated_amount) {

            throw new \Exception("Insufficient Balance", 200);
        };
        $deduct = new AddMoney;
        $deduct->user_id = Auth::id();
        $deduct->receiver_id=$request->user_id;
        $deduct->amount = -($request->amount+ ($request->amount)*$g_set->transfer_charge/100);
        $deduct->method ='Transfer';
        $deduct->type ='Debit';
        $deduct->status ='approve';
        $deduct->save();

        $deposit = new AddMoney;
        $deposit->user_id = $request->user_id;
      //  $deposit->receiver_id=$request->user_id;

        $deposit->amount =$request->amount;
        $deposit->method ='Transfer';
        $deposit->type ='Credit';
        $deposit->status ='approve';
        $deposit->save();
        return back()->with('Money_Transfered','Money Transfer Successfully!!');
    }
    public function walletTransfer(Request $request)
    {
        //dd($request);
        $request->validate([

            'user_id' => 'required',
            'bonus_amount' => 'required',

        ]);
        $g_set = GeneralSettings::first();

        $sum_deposit=CashWallet::where('user_id',Auth::id())->sum('bonus_amount');
        $calculated_amount= ($request->bonus_amount+ ($request->bonus_amount)*$g_set->transfer_charge/100);
        //dd($sum_deposit < $calculated_amount,$sum_deposit,$calculated_amount);

        if ($sum_deposit < $calculated_amount) {
          return response(['Message'=>'Insufficient Balance'], 400);
          //  throw new \Exception("Insufficient Balance", 200);
        };
        $deduct = new CashWallet;
        $deduct->user_id = Auth::id();
        $deduct->receiver_id=$request->user_id;

        $deduct->bonus_amount = -($request->bonus_amount+ ($request->bonus_amount)*$g_set->transfer_charge/100);
        $deduct->method ='Transfer';
        $deduct->type ='Debit';
        $deduct->status ='approve';
        $deduct->save();

        $deposit_cash_wallet = new CashWallet;
        $deposit_cash_wallet->user_id = $request->user_id;
        $deposit_cash_wallet->bonus_amount =$request->bonus_amount;
        $deposit_cash_wallet->method ='Transfer';
        $deposit_cash_wallet->type ='Credit';
        $deposit_cash_wallet->status ='approve';
        $deposit_cash_wallet->save();
        return back()->with('Money_added','Your request is Accepted. Wait for Confirmation!!');
    }
    public function walletWithdraw(Request $request)
    {
        $request->validate([

            'user_id' => 'required',
            'amount' => 'required',

        ]);
        $sum_deposit=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
        $calculated_amount= -($request->amount);

        if ($sum_deposit < $calculated_amount) {

            throw new \Exception("Insufficient Balance", 404);
        };

        $deduct = new AddMoney;
        $deduct->user_id = Auth::id();
        $deduct->amount = -($request->amount);
        $deduct->method ='Withdraw';
        $deduct->status ='pending';
        $deduct->save();

        return back()->with('Money_added','Your request is Accepted. Wait for Confirmation!!');
    }
}
