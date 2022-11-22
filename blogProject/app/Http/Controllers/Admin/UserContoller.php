<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class UserContoller extends Controller
{
    public function index(){
        $data['users'] = User::all();
        return view('admin.user.listData',$data);
    }
    public function create(){
        return view('admin.user.userCreate');
    }
    //insert
    public function store(Request $request)
    {
        $validator =Validator::make($request->all(),[
            'name' => 'required',
            'email'=> 'required|email',
        ]);

        if($validator->passes()){
            User::create([
                'name'     =>$request->name,
                'email'    =>$request->email,
                'password' =>$request->password,
            ]);
            Toastr::success('Successfully Inserted', 'User');
        }else{
            $errormsg= $validator->messages();
            foreach ($errormsg->all() as $msg){
                Toastr::error($msg, 'User');
            }
        }
        return redirect()->back();
    }

    //edit
    public function edit($id){
        $alldata['userinfo'] = User::find($id);
        return view('admin.user.userEdit',$alldata);
    }

    //update
    function update(Request $request){

        User::where('id',$request->id)->update([
            'name'=> $request->name,
            'email'=> $request->email,
        ]);
        Toastr::success('Successfully Updated', 'User');
        return redirect()->back();
    }
    function userdelete($id){

        User::find($id)->delete();
        Toastr::success('Successfully deleted', 'User');
        return redirect()->route('index');
    }
}

