<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddMoney;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
  public function __construct()
  {

      //session()->put('checkout', true);
      $this->middleware('auth');
  }
    public function index($id)
    {


      $data['user']=User::all();
      $data['deposit']=AddMoney::where('user_id',Auth::id())->first();

      $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
      //dd($data);

      return view('users.pages.index',compact('data'));
    }

}
