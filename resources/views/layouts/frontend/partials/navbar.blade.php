<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">youremail@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	          <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="{{url('products/all')}}">Shop</a>
              	<a class="dropdown-item" href="{{url('/product/wishlist')}}">Wishlist</a>
                <a class="dropdown-item" href="{{url('/showCart')}}">Cart</a>
                <a class="dropdown-item" href="{{url('/product/checkout')}}">Checkout</a>
              </div>
            </li>
	          <li class="nav-item"><a href="{{url('about')}}" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="{{url('blog')}}" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="{{url('contact')}}" class="nav-link">Contact</a></li>
			</ul>
			<ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="{{url('register')}}" class="nav-link">Register</a></li>
	          <li class="nav-item"><a href="{{url('login')}}" class="nav-link">Login</a></li>
	          <li class="nav-item"><a href="{{url('/product/wishlist')}}" class="nav-link">Whislist</a></li>
	          <li class="nav-item cta cta-colored">
				  	<a href="{{url('showCart')}}" class="nav-link">
						  <span class="icon-shopping_cart"></span>
						  {{Cart::getTotalQuantity()}}
					</a>
			</li>
	        </ul>
	      </div>
	    </div>
	  </nav>