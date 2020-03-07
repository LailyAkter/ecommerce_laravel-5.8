@extends('layouts.admin.master')
@section('title','Add Product')
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
                        <li class="breadcrumb-item active">Product Add</li>
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
                        <h3 class="card-title">Add New Product</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('product.store')}}" method='post' enctype="multipart/form-data" class='product_form'>
                            @csrf
                            <div class="form-group">
                                <label for="inputName">Product Name</label>
                                <input 
                                    type="text" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='product_name'
                                    placeholder='Product Name'
                                    value="{{old('product_name')}}" 
                                />
                                @if($errors->has('product_name'))
                                   <span class='text-danger'>Product Name is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea style="resize:none" class="form-control" name='short_desc' placeholder='Short Description'>
                                {{old('short_desc')}}
                                </textarea>
                                @if($errors->has('short_desc'))
                                   <span class='text-danger'>Short Description is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="summary-ckeditor">Full Description</label>
                                <textarea class="form-control"  id="summary-ckeditor" name="full_desc">
                                    {{old('full_desc')}}
                                </textarea>
                                @if($errors->has('full_desc'))
                                   <span class='text-danger'> Full Description is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Product Price</label>
                                <input 
                                    type="number" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='price'
                                    placeholder='Product Price' 
                                    value="{{old('price')}}" 
                                />
                                @if($errors->has('price'))
                                   <span class='text-danger'>Product Price Must Be Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Product Real Price</label>
                                <input 
                                    type="number" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='real_price'
                                    placeholder='Product Real Price' 
                                    value="{{old('real_price')}}" 
                                />
                                @if($errors->has('real_price'))
                                   <span class='text-danger'>Product Real Price Must Be Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Product Sell Price</label>
                                <input 
                                    type="number" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='sell_price'
                                    placeholder='Product Sell Price' 
                                    value="{{old('sell_price')}}" 
                                />
                                @if($errors->has('sell_price'))
                                   <span class='text-danger'>Product Sell Price Must Be Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Product Quantity</label>
                                <input 
                                    type="number" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='quantity'
                                    placeholder='Product Quantity' 
                                    value="{{old('quantity')}}" 
                                />
                                @if($errors->has('quantity'))
                                   <span class='text-danger'>Product Quantity Must Be Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                 <label for="inputName">Feature Image</label>
                                 <input 
                                    type="file" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='image'
                                    placeholder='Feature Image'
                                    value="{{old('image')}}"
                                />
                                @if($errors->has('image'))
                                   <span class='text-danger'>Feature Image is Required</span>
                                @endif
                             </div>
                            <div class="form-group">
                                <label for="inputName">Tag Name</label>
                                <select name="tag_id" id="" class='form-control'>
                                    <option value="">---Select a Tag---</option>
                                    @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('tag_id'))
                                   <span class='text-danger'> Tag Name is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Brand Name</label>
                                <select name="brand_id" id="" class='form-control'>
                                    <option value="">---Select a Brand---</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('brand_id'))
                                   <span class='text-danger'> Brand Name is Required</span>
                                @endif
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" value='1' class="form-check-input" id="product"
                                    name='products[]' />
                                <label class="form-check-label" for="exampleCheck1">Is Approved</label>
                            </div>
                            <button type='submit' class='btn btn-success'>Create New Product</button>
                            <a href="#" class='btn btn-danger'>Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.forms['product_form'].elements['tag_id'].value = {{old('tag_id')}};
</script>

@endsection

