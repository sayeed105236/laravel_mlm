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
    public function registration($id)
    {
      return view('users.pages.registration');
    }
    public function Manage($id)
    {
      $users=User::all();
      return view('users.pages.registration_history',compact('users'));
    }
    public function sponsor_bonus($id)
    {
      $users=User::all();
      return view('users.pages.sponsor_bonus',compact('users'));
    }
    public function daily_bonus($id)
    {
      $users=User::all();
      return view('users.pages.daily_revenue_history',compact('users'));
    }
    public function royality_bonus($id)
    {
      $users=User::all();
      return view('users.pages.royality_bonus_history',compact('users'));
    }
    public function level_bonus($id)
    {
      $users=User::all();
      return view('users.pages.level_bonus_history',compact('users'));
    }
    public function pair_bonus($id)
    {
      $users=User::all();
      return view('users.pages.pair_bonus_history',compact('users'));
    }
    public function team_bonus($id)
    {
      $users=User::all();
      return view('users.pages.team_bonus_history',compact('users'));
    }
    public function club_bonus($id)
    {
      $users=User::all();
      return view('users.pages.club_bonus_history',compact('users'));
    }
    public function withdraw_history($id)
    {
      $users=User::all();
      return view('users.pages.withdraw_history',compact('users'));
    }
    public function transfer_history($id)
    {
      $users=User::all();
      return view('users.pages.transfer_history',compact('users'));
    }

}
