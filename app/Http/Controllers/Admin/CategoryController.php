<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Admin\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name'=>'required|unique:categories',
            'image'=>'required'
          ]);
  
          // get form images
          $image = $request->file('image');
          $slug = str_slug($request->name);
  
          if(isset($image)){
            // make uniqw name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
  
            // check category directory is exists
            if(!Storage::disk('public')->exists('category')){
              Storage::disk('public')->makeDirectory('category');
            }
           // resize image for category and is_uploaded_file
           $categorys = Image::make($image)->resize(1600,479)->stream();
           Storage::disk('public')->put('category/'.$imageName,$categorys);
  
           // check category directory slider is exists
           if(!Storage::disk('public')->exists('category\slider')){
             Storage::disk('public')->makeDirectory('category\slider');
           }
           // resize image for category slider and is_uploaded_file
           $slider = Image::make($image)->resize(500,333)->stream();
           Storage::disk('public')->put('category/slider/'.$imageName,$slider);
         }else{
             $imageName='default.png';
         }
  
         $category = new Category();
         $category->name = $request->name;
         $category->slug = $slug;
         $category->image = $imageName;
         $category->save();
         Toastr::success('Category Saved Successfully','Success');
         return redirect()->route('category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.categories.edit',compact('categories'));
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
          'name'=>'required',
          'image'=>'image',
          ]);
  
        // get form images
        $image = $request->file('image');
        $slug = str_slug($request->name);
        $categories = Category::find($id);
        
          if(isset($image)){
            // make uniqw name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
  
            // check category directory is exists
            if(!Storage::disk('public')->exists('category')){
              Storage::disk('public')->makeDirectory('category');
            }
            // delete old image
            if(Storage::disk('public')->exists('category/'.$categories->image)){
                Storage::disk('public')->delete('category/'.$categories->image);
              }
           // resize image for category and is_uploaded_file
           $categorys = Image::make($image)->resize(1600,479)->stream();
           Storage::disk('public')->put('category/'.$imageName,$categorys);
  
           // check category directory slider is exists
           if(!Storage::disk('public')->exists('category/slider')){
             Storage::disk('public')->makeDirectory('category/slider');
           }
           // delete old image
           if(Storage::disk('public')->exists('category/slider/'.$categories->image)){
            Storage::disk('public')->delete('category/slider/'.$categories->image);
          }
           // resize image for category slider and is_uploaded_file
           $slider = Image::make($image)->resize(500,333)->stream();
           Storage::disk('public')->put('category/slider/'.$imageName,$slider);
         }else{
             $imageName=$categories->image;
         }
         $categories->name = $request->name;
         $categories->slug = $slug;
         $categories->image = $imageName;
         $categories->save();

         Toastr::success('Category Updated Successfully','Success');
         return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        // delete category
        if(Storage::disk('public')->exists('category/'.$category->image)){
            Storage::disk('public')->delete('category/'.$category->image);
          }
         // delete category
         if(Storage::disk('public')->exists('category/slider/'.$category->image)){
            Storage::disk('public')->delete('category/slider/'.$category->image);
          }
        $category->delete();

        Toastr::success('Category Deleted Successfully','Success');
        return redirect()->route('category.index');
    }
}
