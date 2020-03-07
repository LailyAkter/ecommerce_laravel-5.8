@extends('layouts.admin.master')
@section('title','All Products')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{route('product.create')}}" class='btn btn-primary'>
                        <i class="fas fa-plus">Add Product</i>
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
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
                    All Products
                    <span class='badge bg-blue'>{{$all_products->count()}}</span>
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
                            <th>Product Name</th>
                            <th>Short Description</th>
                            <th>Full Description</th>
                            <th>Price</th>
                            <th>Real Price</th>
                            <th>Sell Price</th>
                            <th>Status</th>
                            <th>Tag Name</th>
                            <th>Brand Name</th>
                            <th>Quantity</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_products as $key=>$product)
                         <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{str_limit($product->short_desc,'20')}}</td>
                            <td>{{str_limit($product->full_desc,'50')}}</td>
                            <td>{{$product->real_price}}</td>
                            <td>{{$product->sell_price}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->status}}</td>
                            <td>{{$product->tag_name}}</td>
                            <td>{{$product->brand_name}}</td>
                            <td>{{$product->quantity}}</td>
                            
                           
                            <td>{{$product->created_at}}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{url('/admin/product/'.$product->id.'/edit')}}">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>
                            </td>
                            <td>
                                <form action='{{route("product.destroy",$product->id)}}' method='POST' enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class="btn btn-danger btn-sm">
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
<!-- /.content-wrapper -->
@endsection


