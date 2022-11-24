@extends('admin.layouts.default')
@section('title', 'Dashboard')
@section('content')
<!-- Page header -->
<div class="page-header">
    <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="datatable_basic.html">Blog Category</a></li>
                
            </ul>

   </div>
</div>
<!-- Page header -->

<!-- Content area -->
<div class="content">

    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title text-semibold">Blog Category Table</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li class="btn btn-primary mr-5" ><a href="{{ route('blogCategories.create') }}"> Add Category</a></li> 
                    <li class="btn btn-primary mr-5" ><a href="#trashed"><i class="icon-bin"></i> Restore Blog Category</a></li>                   
                   
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
                    <th>Category Name</th>                                       
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($blogcategories))                
                @foreach ($blogcategories as $key=> $category)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $category->category_name }}</td>                  
                                        
                    <td>
                        @if ($category->valid == 1)
                            <span class="label label-success">Active</span>                            
                        @else
                            <span class="label label-success">Inactive</span>  
                        @endif
                        
                    </td>
                    <td class="text-center ">
                        <a  href="{{ route('blogCategories.edit',$category->id) }}"><i class="icon-pencil"></i></a>
                        {{-- <a href=""><i class="icon-bin"></i></a> --}}
                        <form style="display: inline;"  action="{{ route('blogCategories.destroy',$category->id) }}" method="POST">
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
    <div class="row " style="margin-top:100px" id="trashed">
        <div class="col-lg-12">
            <div class="card bg-primary " >
                <div class="card-header pt-3 " ><h3 class="text-center">Restore Blog Category</h3></div>
                <div class="card-body">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title text-semibold">Trashed Blog Category Table</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                              
                                   
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
                                    <th>Category Name</th>                                       
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($restore))                
                                @foreach ($restore as $key=> $rstore)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $rstore->category_name }}</td>                  
                                                            
                                        <td>
                                            @if ($rstore->valid == 1)
                                                <span class="label label-success">Active</span>                            
                                            @else
                                                <span class="label label-success">Inactive</span>  
                                            @endif
                                            
                                        </td>
                                        <td class="text-center ">
                                            <a  href="{{ route('blogCategories.edit',$rstore->id) }}"><i class="icon-undo"></i></a>
                                            {{-- <a href=""><i class="icon-bin"></i></a> --}}
                                            <form style="display: inline;"  action="{{ route('blogCategories.destroy',$category->id) }}" method="POST">
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
                </div>
            </div>
        </div>
    </div>
    
    <!-- /basic datatable -->
</div>
<!-- /content area -->	
@endsection