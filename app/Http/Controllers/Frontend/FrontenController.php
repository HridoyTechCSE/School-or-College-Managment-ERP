<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Communicate;
use Mail;

class FrontenController extends Controller
{
   public function index(){
       return view('auth.login');
   }





}
