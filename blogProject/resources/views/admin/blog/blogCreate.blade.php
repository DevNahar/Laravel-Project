@extends('admin.layouts.default')
@section('title', 'Dashboard')
@section('content')
<!-- Page header -->
<div class="page-header">
    <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="datatable_basic.html">Blog</a></li>
                
            </ul>

        </div>
</div>
<!-- Page header -->

<!-- Content area -->
<div class="content">

    <!-- Basic datatable -->
    <div class="panel panel-flat col-lg-6">
        <div class="panel-heading">
            <h5 class="panel-title text-semibold">Add Blog </h5>           
            <div class="heading-elements">
                <ul class="icons-list">                    
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body "> 
                            
            <form class="form-horizontal" action="{{ route('blogs.store') }}" method="POST">
                @csrf
                <fieldset class="content-group">
                    <div class="form-group">
                        <label class="control-label col-lg-2"> Category</label>
                        <div class="col-lg-10">
                            <input type="text" name="category"  class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2"> Title</label>
                        <div class="col-lg-10">
                            <input type="text" name="title"  class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2"> Sub Title</label>
                        <div class="col-lg-10">
                            <input type="text" name="sub_title"  class="form-control">
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Status</label>
                        <div class="col-lg-10">
                            <select name="valid" class="form-control">
                                <option value="">----Select status----</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            
                        </div>
                    </div>
                </fieldset>

                <div class="text-right">
                    <a href="{{ route('blogs.index') }}" class="btn btn-primary"><i class="icon-arrow-right14 position-right"></i>Back to userlist </a>
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>

            
        </div> 

        
    </div>
    <!-- /basic datatable -->
</div>
<!-- /content area -->	
@endsection