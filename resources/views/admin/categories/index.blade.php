@extends('layouts.admin.master')
@section('title','All Categories')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{route('category.create')}}" class='btn btn-primary'>
                        <i class="fas fa-plus">Add Category</i>
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    All Categories
                    <span class='badge bg-blue'>{{$categories->count()}}</span>
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Feature Image</th>
                            <th>Post Count</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $key=>$category)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$category->name}}</td>
                            <td><img  style="height:50px;width:100px" src="{{asset('storage/category/'.$category->image)}}" alt=""></td>
                           <td>dknfc cnkbnk</td>
                            <td>{{$category->created_at}}</td>
                            <td>{{$category->updated_at}}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-folder"></i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="{{route('category.edit',$category->id)}}">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>
                            </td>
                            <td>
                                <form action="{{route('category.destroy',$category->id)}}" method='POST' enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button  type='submit' class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
