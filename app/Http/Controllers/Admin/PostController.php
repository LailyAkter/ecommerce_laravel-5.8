<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Post;
use App\Admin\Category;
use App\Admin\Tag;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        return view('.admin.posts.create',compact(['categories','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|unique:posts',
            'image'=>'required',
            'body'=>'required',
            'status'=>'required',
          ]);
  
        // get form images
        $image = $request->file('image');
        $slug = str_slug($request->name);
        
          if(isset($image)){
            // make uniqw name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
  
            // check post directory is exists
            if(!Storage::disk('public')->exists('post')){
              Storage::disk('public')->makeDirectory('post');
            }
           // resize image for post and is_uploaded_file
           $posts = Image::make($image)->resize(1600,1066)->stream();
           Storage::disk('public')->put('post/'.$imageName,$posts);
  
           // check post directory slider is exists
           if(!Storage::disk('public')->exists('post/slider')){
             Storage::disk('public')->makeDirectory('post/slider');
           }
           // resize image for post slider and is_uploaded_file
           $slider = Image::make($image)->resize(500,333)->stream();
           Storage::disk('public')->put('post/slider/'.$imageName,$slider);
         }else{
             $imageName='default.png';
         }
         $post = new Post();
         $post->title = $request->title;
         $post->slug = $slug;
         $post->image = $imageName;
         $post->body = $request->body;
         $post->user_id = Auth::id();
         if(isset($request->status)){
             $post->status  = true;
         }else{
             $post->status = false;
         }
        $post->is_approved = true;

        $post->save();

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        Toastr::success('Post Saved Successfully','Success');
         return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::latest()->get();
        return view('admin.posts.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        return view('.admin.posts.edit',compact(['post','categories','tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title'=>'required',
            'image'=>'image',
            'body'=>'required',
            'status'=>'required',
          ]);
  
        // get form images
        $image = $request->file('image');
        $slug = str_slug($request->name);
        $all_post = Post::find($id);
          if(isset($image)){
            // make uniqw name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
  
            // check post directory is exists
            if(!Storage::disk('public')->exists('post')){
              Storage::disk('public')->makeDirectory('post');
            }
            // delete old image
            if(Storage::disk('public')->exists('post/'.$all_post->image)){
                Storage::disk('public')->delete('post/'.$all_post->image);
              }
           // resize image for post and is_uploaded_file
           $posts = Image::make($image)->resize(1600,1066)->stream();
           Storage::disk('public')->put('post/'.$imageName,$posts);
  
           // check post directory slider is exists
           if(!Storage::disk('public')->exists('post/slider')){
             Storage::disk('public')->makeDirectory('post/slider');
           }
           // delete old image
           if(Storage::disk('public')->exists('post/slider/'.$all_post->image)){
            Storage::disk('public')->delete('post/slider/'.$all_post->image);
          }
           // resize image for post slider and is_uploaded_file
           $slider = Image::make($image)->resize(500,333)->stream();
           Storage::disk('public')->put('post/slider/'.$imageName,$slider);
         }else{
            $imageName = $all_post->image;
         }
         $all_post->title = $request->title;
         $all_post->slug = $slug;
         $all_post->image = $imageName;
         $all_post->body = $request->body;
         $all_post->user_id = Auth::id();

         if(isset($request->status)){
             $all_post->status  = true;
         }else{
             $all_post->status = false;
         }
        
        $all_post->is_approved = true;

        $all_post->save();

        $all_post->categories()->sync($request->categories);
        $all_post->tags()->sync($request->tags);

        Toastr::success('Post Updated Successfully','Success');
         return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // delete post
        if(Storage::disk('public')->exists('post/'.$post->image)){
            Storage::disk('public')->delete('post/'.$post->image);
          }
         // delete post
         if(Storage::disk('public')->exists('post/slider/'.$post->image)){
            Storage::disk('public')->delete('post/slider/'.$post->image);
          }
        $post->delete();

        Toastr::success('Post Deleted Successfully','Success');
        return redirect()->route('post.index');
    }
}
