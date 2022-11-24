@extends('admin.layouts.default')
@section('title', 'Dashboard')
@section('content')
<!-- Page header -->
<div class="page-header">
    <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="datatable_basic.html">User</a></li>
                
            </ul>

        </div>
</div>
<!-- Page header -->

<!-- Content area -->
<div class="content">

    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title text-semibold">Add User</h5>           
            <div class="heading-elements">
                <ul class="icons-list">                    
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 
                            
            <form class="form-horizontal" action="{{ route('userStore') }}" method="POST">
                @csrf
                <fieldset class="content-group">
                    <div class="form-group">
                        <label class="control-label col-lg-2">Name</label>
                        <div class="col-lg-10">
                            <input type="text" name="name"  class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Password</label>
                        <div class="col-lg-10">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                </fieldset>

                <div class="text-right">
                    <a href="{{ route('index') }}" class="btn btn-primary"><i class="icon-arrow-right14 position-right"></i>Back to userlist </a>
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>

            
        </div> 

        
    </div>
    <!-- /basic datatable -->
</div>
<!-- /content area -->	
@endsection