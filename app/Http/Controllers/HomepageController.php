<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topup;
class HomepageController extends Controller
{
    
    public function showLogin()
    {
        //     
        return view('homepage');
    }
    public function showCashbook()
    {
        //
        $total_topup=Topup::sum('topup');        
        return view('welcome')->with(compact('total_topup'));
    }

}   