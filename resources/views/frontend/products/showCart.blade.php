@extends('layouts.frontend.master')

@section('title','Product Cart')

@section('content')
<div class="hero-wrap hero-bread"
    style="background-image: url({{asset('storage/category/slider/juice-2020-02-18-5e4b717bc49e8.jpg')}});">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="index.html">Home</a>
                    </span>
                    <span>Cart</span>
                </p>
                <h1 class="mb-0 bread">My Cart</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $cart)
                            <tr class="text-center">
                                <td class="product-remove">
                                    <a href="{{url('/cart/delete/'.$cart->id)}}">
                                        <span class="ion-ios-close"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="">
                                        <img src="{{asset('storage/product')}}/{{$cart->attributes->image}}" alt=""
                                            height='80px' width='80px'>
                                    </a>
                                </td>
                                <td class="product-name">{{$cart->name}}</td>
                                <td class="price">{{$cart->price}}</td>
                                <td class="quantity">
                                    <div class="input-group mb-3">
                                        <input type="text" name="quantity" class="quantity form-control input-number"
                                            value="{{$cart->quantity}}">
                                    </div>
                                </td>
                                <td class="total">${{$cart->price*$cart->quantity}}</td>

                                <td>
                                    <form action="{{url('cart/update/'.$cart->id)}}" method='post'>
                                        @csrf
                                        
                                        <input type="hidden" name='cart_id' value='{{$cart->id}}'>
                                        <button type="submit" class="submit px-3">Update</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Coupon Code</h3>
                    <p>Enter your coupon code if you have one</p>
                    <form action="#" class="info">
                        <div class="form-group">
                            <label for="">Coupon code</label>
                            <input type="text" class="form-control text-left px-3" placeholder="">
                        </div>
                    </form>
                </div>
                <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
            </div>
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Estimate shipping and tax</h3>
                    <p>Enter your destination to get a shipping estimate</p>
                    <form action="#" class="info">
                        <div class="form-group">
                            <label for="">Country</label>
                            <input type="text" class="form-control text-left px-3" placeholder="Enter Your Country">
                        </div>
                        <div class="form-group">
                            <label for="country">State/Province</label>
                            <input type="text" class="form-control text-left px-3" placeholder="Enter Your State">
                        </div>
                        <div class="form-group">
                            <label for="country">Zip/Postal Code</label>
                            <input type="text" class="form-control text-left px-3" placeholder="Enter Your Zip Code">
                        </div>
                    </form>
                </div>
                <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimate</a></p>
            </div>
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span>{{Cart::getSubTotal()}}</span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>$0.00</span>
                    </p>
                    <p class="d-flex">
                        <span>Discount</span>
                        <span>$3.00</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>{{Cart::getSubTotal()}}</span>
                    </p>
                </div>
                <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
            </div>
        </div>
    </div>
</section>
@endsection
