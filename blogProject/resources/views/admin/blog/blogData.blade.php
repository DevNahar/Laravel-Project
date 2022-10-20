@extends('admin.layouts.default')
@section('title', 'Dashboard')
@section('content')
<!-- Page header -->
<div class="page-header">
    <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="datatable_basic.html">Blog </a></li>
                
            </ul>

   </div>
</div>
<!-- Page header -->

<!-- Content area -->
<div class="content">

    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title text-semibold">Blog  Table</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li class="btn btn-primary mr-5" ><a href="{{ route('blogs.create') }}"> Add Blog</a></li> 
                    <li class="btn btn-primary mr-5" ><a href="#trashed"><i class="icon-bin"></i> Restore Blog </a></li>                   
                   
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
                    <th>Sl</th>
                    <th> Category</th>
                    <th> title</th>               
                                                     
                    <th> sub_title</th>                                       
                    {{-- <th> description</th>                                       
                    <th> thumbnail</th>                                        --}}
                    <th>valid</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
          <tbody>
                @if (!empty($blogs))                
                @foreach ($blogs as $key=> $blog)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $blog->title }}</td>                  
                    <td>{{ $blog->sub_title }}</td>                  
                                        
                    <td>
                        @if ($blog->valid == 1)
                            <span class="label label-success">Active</span>                            
                        @else
                            <span class="label label-success">Inactive</span>  
                        @endif
                        
                    </td>
                    <td class="text-center ">
                        <a  href="{{ route('blogs.edit',$category->id) }}"><i class="icon-pencil"></i></a>
                        
                        <form style="display: inline;"  action="{{ route('blogs.destroy',$category->id) }}" method="POST">
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
    {{-- <div class="row " style="margin-top:100px" id="trashed">
        <div class="col-lg-12">
            <div class="card bg-primary " >
                <div class="card-header pt-3 " ><h3 class="text-center">Restore Blog </h3></div>
                <div class="card-body">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title text-semibold">Trashed Blog  Table</h5>
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
                                        <th> title</th>      
                                        
                                        <th>sub_title</th>
                                        <th>description</th>
                                        <th>thumbnail</th>
                                        <th>valid</th>
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
                                                <a  href="{{ route('blog.edit',$rstore->id) }}"><i class="icon-undo"></i></a>
                                                
                                                <form style="display: inline;"  action="{{ route('blog.destroy',$category->id) }}" method="POST">
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
    </div> --}}
    
    <!-- /basic datatable -->
</div>
<!-- /content area -->	
@endsection