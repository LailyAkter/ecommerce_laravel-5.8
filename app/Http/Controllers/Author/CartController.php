<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Admin\Product;
use Cart;
use DB;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        $quantity = $request->quantity;
        $product_id = $request->product_id;
        $products = DB::table('products')
                    ->where('id',$product_id)
                    ->first();

        Cart::add([
            'id' =>$products->id,
            'name' => $products->product_name,
            'price' => $products->price,
            'quantity' => $quantity,
            'attributes' => [
                'image'=>$products->image,
            ]
        ]);

        return redirect('/showCart');

    }

    public function showCart()
    {
        $carts =Cart::getContent();
        $total = Cart::getTotal();

        return view('frontend.products.showCart',compact(['carts','total']));
    }

    public function cartUpdate()
    {
        
    }
    public function carDelete($id)
    {
        Cart::remove($id);
        Toastr::success('You Successfully Deleted Cart','Success');
        return redirect()->back();
    }
}
