<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashoardController extends Controller
{
   public function index()
   {
       return view('frontend.dashboard');
   }
}
