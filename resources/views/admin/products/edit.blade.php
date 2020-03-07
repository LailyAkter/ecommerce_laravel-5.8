@extends('layouts.admin.master')
@section('title','Edit Product')
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
                        <li class="breadcrumb-item active">Product Edit</li>
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
                        <h3 class="card-title">Edit Product</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('product.update',$product->id)}}" method='post' enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="inputName">Product Name</label>
                                <input 
                                    type="text" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='product_name'
                                    placeholder='Product Name' 
                                    value="{{$product->product_name}}" 
                                />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Short Description</label>
                                <textarea class="form-control"  name='short_desc' >
                                {{$product->short_desc}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="summary-ckeditor">Full Desctiption</label>
                                <textarea class="form-control" id="summary-ckeditor" name="full_desc">
                                    {{$product->full_desc}}
                                </textarea>

                            </div>
                            <div class="form-group">
                                <label for="inputName">Product Price</label>
                                <input 
                                    type="number" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='price'
                                    placeholder='Product Price' 
                                    value="{{$product->price}}" 
                                />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Product Real Price</label>
                                <input 
                                    type="number" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='real_price'
                                    placeholder='Product Real Price' 
                                    value="{{$product->real_price}}" 
                                />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Product Sell Price</label>
                                <input 
                                    type="number" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='sell_price'
                                    placeholder='Product Sell Price' 
                                    value="{{$product->sell_price}}" 
                                />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Product Quantity</label>
                                <input 
                                    type="number" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='quantity'
                                    placeholder='Product Quantity' 
                                    value="{{$product->quantity}}" 
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
                                />
                             </div>
                            <div class="form-group">
                                <label for="inputName">Tag Name</label>
                                <select name="tag_id" id="" class='form-control'>
                                    
                                    @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Brand Name</label>
                                <select name="brand_id" id="" class='form-control'>
                                    
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" value='1' class="form-check-input" id="product"
                                    />
                                <label class="form-check-label" for="exampleCheck1">Is Approved</label>
                            </div>
                            <button type='submit' class='btn btn-success'>New Product</button>
                            <a href="#" class='btn btn-danger'>Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

@endsection


