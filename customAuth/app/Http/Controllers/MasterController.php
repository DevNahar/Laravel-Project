<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    function getlogin(){
        return view('auth.login');
    }
}
