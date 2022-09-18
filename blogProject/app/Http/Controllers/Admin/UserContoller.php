<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserContoller extends Controller
{
    public function userlist(){
        return view('admin.user.listData');
    }
}
