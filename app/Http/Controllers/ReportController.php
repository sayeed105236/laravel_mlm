<?php

namespace App\Http\Controllers;

use App\Models\AddMoney;
use App\Models\CashWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ReportController extends Controller
{
    public function incomeReport()
    {
        $incomeData = CashWallet::where('user_id',Auth::id())->get();
        return view('users.pages.income-report',compact(['incomeData']));
    }
    public function transferReport()
    {
        $transferData = AddMoney::where('user_id',Auth::id())->where('method','Transfer')->get();
        return view('users.pages.transfer-report',compact(['transferData']));
    }

    public function CashwallettransferReport()
    {
        $cashwallettransferData = CashWallet::where('user_id',Auth::id())->where('method','Transfer')->get();
        return view('users.pages.cashwallet-transfer-report',compact(['cashwallettransferData']));
    }
    public function findUser(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);

        $sponsor = User::where("user_name","LIKE","%".$request->search."%") ->take(3)->get();
                return view('search-user',compact('sponsor'));
    }
}
