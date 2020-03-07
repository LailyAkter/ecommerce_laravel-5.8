@extends('layouts.admin.master')
@section('title','Add Post')
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
                        <li class="breadcrumb-item active">Post Add</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{route('post.store')}}" method='post' enctype="multipart/form-data">
         @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class='col-md-7'>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class='card-title'>Add New Post</h3>
                            </div>
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Post Title</label>
                                        <input type="text" id="inputName" class="form-control" name='title'
                                            placeholder='Post Title' value="{{old('title')}}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Feature Image</label>
                                        <input type="file" id="inputName" class="form-control" name='image'
                                            placeholder='Feature Image' />
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" name='status' id='publish' class='filled-in' value='1'>
                                        <label>Publish</label>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-4 offset-md-1'>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class='card-title'>Select Brands and Tags</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputState">Select categories</label>
                                    <select class="selectpicker form-control" name='categories[]' multiple  data-live-search="true" title='----Select categories----'>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Select Tags</label>
                                    <select class="selectpicker form-control" name='tags[]' multiple  data-live-search="true" title='----Select tags----'>
                                        @foreach($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type='submit' class='btn btn-success'>Create Post</button>
                                <a href="{{route('post.index')}}" class='btn btn-danger'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class='card-title'>Body</h3>
                    </div>
                    <div class="card-body">
                        <label for="summary-ckeditor">Full Description</label>
                        <textarea class="form-control" id="summary-ckeditor" name="body">
                            {{old('body')}}
                        </textarea>               
                    </div>
                </div>
            </div>
        </div>
</form>
    </section>
</div>
<!-- /.content-wrapper -->

@endsection
