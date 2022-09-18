<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserContoller extends Controller
{
    public function userlist(){
        $data['users'] = User::all();
        return view('admin.user.listData',$data);
    }
    public function create(){
        return view('admin.user.userCreate');
    }
    public function store(Request $request){
        User::create([
            'name'     =>$request->name,
            'email'    =>$request->email,
            'password' =>$request->password,
        ]);
        return redirect()->back();
    }
    
}

