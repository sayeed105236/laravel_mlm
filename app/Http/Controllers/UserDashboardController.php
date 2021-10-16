<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Addmoney;

class UserDashboardController extends Controller
{
  public function __construct()
  {

      //session()->put('checkout', true);
      $this->middleware('auth');
  }
    public function index($id)
    {


      $user=User::find($id);
      $deposit=AddMoney::where('user_id',$id)->first();

      return view('users.pages.index',compact('user','deposit'));
    }

}
