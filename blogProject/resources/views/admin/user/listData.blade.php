@extends('admin.layouts.default')
@section('title', 'user')
@section('content')
<!-- Page header -->
<div class="page-header">
    <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="datatable_basic.html">Usertables</a></li>

            </ul>

        </div>
</div>
<!-- Page header -->

<!-- Content area -->
<div class="content">

    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title text-semibold">Users datatable</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li class="btn btn-primary mr-5" ><a href="{{ route('userCreate') }}"> Add User</a></li>
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">

        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>Srl</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($users))
                @foreach ($users as $key=> $user)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <td><span class="label label-success">Active</span></td>
                    <td class="text-center ">
                        <a  href="{{ route('userEdit',$user->id) }}"><i class="icon-pencil"></i></a>
                        {{-- <a href=""><i class="icon-bin"></i></a> --}}
                        <form style="display: inline;"  action="{{ route('userDelete',$user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                           <button type="submit" style="border: none; color:#2196f3;" class="bg-white"> <i class="icon-bin"></i></button>

                        </form>

                    </td>
                </tr>

                @endforeach
                @else
               <td colspan="6">No Data Found</td>
                @endif


            </tbody>
        </table>
        </div>


    </div>
    <!-- /basic datatable -->
</div>
<!-- /content area -->
@endsection
