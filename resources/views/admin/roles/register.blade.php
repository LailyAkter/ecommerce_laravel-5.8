@extends('layouts.admin.master')
@section('title','All Role')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{route('role.create')}}" class='btn btn-primary'>
                        <i class="fas fa-plus">Add User</i>
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
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
                    Register Role
                    <span class='badge bg-blue'>{{$roles->count()}}</span>
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
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $key=>$role)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->email}}</td>
                            <td>-{{$role->usertype}}</td>
                            <td>{{$role->created_at}}</td>
                            <td>{{$role->updated_at}}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{route('role.edit',$role->id)}}">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>
                            </td>
                            <td>
                                <form action="{{route('role.destroy',$role->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"class="btn btn-danger m-t-15">
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
