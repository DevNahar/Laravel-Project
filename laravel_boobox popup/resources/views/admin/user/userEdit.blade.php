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
            <h5 class="panel-title text-semibold">User Update </h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">

            <form class="form-horizontal" action="{{ route('userUpdate') }}" method="POST">
                @csrf
                <fieldset class="content-group">
                    <input type="text" name="id"  value="{{ $userinfo->id }}"  class="form-control">
                    <div class="form-group">
                        <label class="control-label col-lg-2">Name</label>
                        <div class="col-lg-10">
                            <input type="text" name="name" value="{{$userinfo->name }}"  class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                            <input type="email" name="email" value="{{ $userinfo->email }}" class="form-control">
                        </div>
                    </div>

                </fieldset>

                <div class="text-right">
                    <a href="{{ route('index') }}" class="btn btn-primary"><i class="icon-arrow-right14 position-right"></i>Back to userlist </a>
                    <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>


        </div>


    </div>
    <!-- /basic datatable -->
</div>
<!-- /content area -->
@endsection
