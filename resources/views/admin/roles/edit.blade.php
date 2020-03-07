@extends('layouts.admin.master')
@section('title','Edit Role')

@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6"></div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Role Edit</li>
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
                         <h3 class="card-title">Edit Role For Register User</h3>
                         <div class="card-tools">
                             <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                 data-toggle="tooltip" title="Collapse">
                                 <i class="fas fa-minus"></i>
                             </button>
                         </div>
                     </div>
                     <div class="card-body">
                         <form action="{{route('role.update',$role->id)}}" method='post'>
                             @csrf
                             @method('PUT')
                             <div class="form-group">
                                 <label for="inputName">Name</label>
                                 <input 
                                    type="text" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='name'
                                    placeholder='Enter Name'
                                    value="{{$role->name}}"
                                />
                             </div> 
                             <div class="form-group">
                                 <label for="inputName">Give Role</label>
                                 <select name="usertype" id="" class='form-control'>
                                     <option value="SuperAdmin">Super Admin</option>
                                     <option value="Admin">Admin</option>
                                     <option value="JrDeveloper">Jr. Developer</option>
                                     <option value="User">User</option>
                                 </select>
                             </div>
                             
                             <button  type='submit' class='btn btn-success'>Submit</button>
                             <a href="{{route('role.index')}}" class='btn btn-danger'>Back</a>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </div>
@endsection