<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserDashboardController extends Controller
{
    public function index($id)
    {
      
      $user=User::find($id);
      return view('users.pages.index',compact('user'));
    }
}
