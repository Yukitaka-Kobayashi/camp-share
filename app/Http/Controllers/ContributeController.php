<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContributeController extends Controller
{
  
  //ルーティングはroutes/web.phpに記載されている
  public function getindex()
  {
        return view('contribute');  
  }
  
}
