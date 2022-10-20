<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blogs'] = Blog::all();
        // $data['restore'] = Blog::onlyTrashed()->get();
        return view('admin.Blog.blogData',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Blog.blogCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =Validator::make($request->all(),[
            'category_name' => 'required',
            'valid'=> 'required',
        ]);

        if($validator->passes()){
            Blog::create([
                'category_name'     =>$request->category_name,
                'valid'    =>$request->valid,
                
            ]);
            
            Toastr::success('Successfully Inserted', 'User');
        }else{
            $errormsg= $validator->messages();
            foreach ($errormsg->all() as $msg){
                Toastr::error($msg, 'Blog');
            }
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alldata['category'] = Blog::find($id);
        return view('admin.Blog.blogEdit',$alldata);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        // Blog::where('id',$id)->update([
        Blog::find($id)->update([        
            'category_name'=> $request->category_name,
            'valid'=> $request->valid,
        ]);
       
        Toastr::success('Successfully Updated', 'Blog Category');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Blog::find($id)->delete();
        //softdelete
        Blog::find($id)->delete();
        
        Toastr::success('Successfully Deleted', 'Blog ');
        return redirect()->back();
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//restore

}
