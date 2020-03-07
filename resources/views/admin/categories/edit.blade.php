@extends('layouts.admin.master')
 @section('title','Edit Category')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6"></div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Category Edit</li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>
     <!-- Main content -->
     <section class="content">
         <div class="row justify-content-center">
             <div class="col-md-10">
                 <div class="card card-primary">
                     <div class="card-header">
                         <h3 class="card-title">Edit Category</h3>
                         <div class="card-tools">
                             <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                 data-toggle="tooltip" title="Collapse">
                                 <i class="fas fa-minus"></i>
                             </button>
                         </div>
                     </div>
                     <div class="card-body">
                         <form action="{{route('category.update',$categories->id)}}" method='post' enctype="multipart/form-data">
                             @csrf
                             @method('PUT')
                             <div class="form-group">
                                 <label for="inputName">Category Name</label>
                                 <input 
                                    type="text" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='name'
                                    placeholder='Category Name'
                                    value="{{$categories->name}}"
                                />
                             </div>
                             <div class="form-group">
                                 <label for="inputName">Feature Image</label>
                                 <input 
                                    type="file" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='image'
                                    placeholder='Feature Image'
                                    value="{{$categories->image}}"
                                />
                             </div>
                             <button type='submit' class='btn btn-success'>Create Category</button>
                             <a href="{{route('category.index')}}" class='btn btn-danger'>Back</a>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </div>

 @endsection
