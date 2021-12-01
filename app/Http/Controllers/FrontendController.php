<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function flipcard()
    {
      return view('flipcard');
    }
}
