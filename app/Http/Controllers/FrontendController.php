<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FrontendController extends Controller
{
    public function index()
    {
      return view('home');
    }
    public function tree()
    {
      return view('tree');
    }
    public function flipcard($id)
    {
      return view('flipcard');
    }

}
