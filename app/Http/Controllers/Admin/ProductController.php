<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
use App\Admin\Tag;
use App\Admin\Brand;
use App\Admin\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_products = DB::table('products')
            ->leftJoin("tags","tags.id","=","products.tag_id") 
            ->leftJoin("brands","brands.id","=","products.brand_id")          
            ->get(["*","products.id as id","brands.brand_name"]);
            return view('admin.products.index',compact('all_products'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $brands = Brand::all();
        return view('admin.products.create',compact(['tags','brands']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productValidator = $request->validate([
            'product_name' => 'required|unique:products',
            'short_desc' => 'required',
            'full_desc' => 'required',
            'image' => 'required',
            'price' => 'required',
            'sell_price' => 'required',
            'real_price' => 'required',
            'quantity' => 'required',
            'tag_id' => 'required',
            'brand_id' => 'required',
           
        ]);
        // dd($request->all());

        // get form images
          $image = $request->file('image');
          $slug = str_slug($request->product_name);
  
          if(isset($image)){
            // make uniqw name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            // check category directory is exists
            if(!Storage::disk('public')->exists('product')){
              Storage::disk('public')->makeDirectory('product');
            }
           // resize image for category and is_uploaded_file
           $product = Image::make($image)->resize(1600,479)->stream();
           Storage::disk('public')->put('product/'.$imageName,$product);
         }else{
             $imageName='default.png';
         }

    
         DB::table('products')->insert([
            'product_name' =>$request->product_name,
            'slug' =>$slug,
            'short_desc' => $request->short_desc,
            'price' => $request->price,
            'full_desc' => $request->full_desc,
            'image' =>$imageName,
            'brand_id' => $request->brand_id,
            'tag_id' => $request->tag_id,
            'sell_price' =>$request->sell_price,
            'real_price' =>$request->real_price,
            'quantity' =>$request->quantity,
        ]);
        

        Toastr::success('Product Successfully Save', 'Success');
        
        return redirect()->route('product.index');
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
        $product = Product::find($id);
        $tags = Tag::all();
        $brands = Brand::all();
        return view('admin.products.edit',compact(['product','tags','brands']));
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
        $productValidator = $request->validate([
            'product_name' => 'required',
           
        ]);

        // get form images
          $image = $request->file('image');
          $slug = str_slug($request->product_name);
          $product = Product::find($id);
  
          if(isset($image)){
            // make uniqw name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            
            // check category directory is exists
            if(!Storage::disk('public')->exists('product')){
              Storage::disk('public')->makeDirectory('product');
            }
            // delete old image
            if(Storage::disk('public')->exists('product/'.$product->image)){
                Storage::disk('public')->delete('product/'.$product->image);
            }
           // resize image for category and is_uploaded_file
           $products = Image::make($image)->resize(1600,479)->stream();
           Storage::disk('public')->put('product/'.$imageName,$products);

         }else{
             $imageName=$product->image;
         }

    
         DB::table('products')->update([
            'product_name' =>$request->product_name,
            'slug' =>$slug,
            'short_desc' => $request->short_desc,
            'price' => $request->price,
            'full_desc' => $request->full_desc,
            'image' =>$imageName,
            'brand_id' => $request->brand_id,
            'tag_id' => $request->tag_id,
            'sell_price' =>$request->sell_price,
            'real_price' =>$request->real_price,
            'quantity' =>$request->quantity,
        ]);
        

        Toastr::success('Product Successfully Updated', 'Success');
        
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        // delete  image
        if(Storage::disk('public')->exists('product/'.$products->image)){
            Storage::disk('public')->delete('product/'.$products->image);
        }

        $products->delete();

        Toastr::success('Product Successfully Deleted', 'Success');
        
        return redirect()->route('product.index');
    }
}
