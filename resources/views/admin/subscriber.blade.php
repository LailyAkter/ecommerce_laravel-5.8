@extends('layouts.admin.master')
@section('title','All Subscriber')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Subscriber</li>
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
                    All Subscriber
                    <span class='badge bg-blue'>{{$subscribers->count()}}</span>
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
                            <th style="width:10%">ID</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th style="width:10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscribers as $key=>$subscriber)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$subscriber->email}}</td>
                            <td>{{$subscriber->created_at}}</td>
                            <td>{{$subscriber->updated_at}}</td>
                            <td>
                                <form method='POST' action="{{route('subscriber.destroy',$subscriber->id)}}"  enctype="multipart/form-data">
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
