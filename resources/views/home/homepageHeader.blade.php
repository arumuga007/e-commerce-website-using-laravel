
<div class="containers">
    <div class="header" style="position: fixed; top: 0; z-index: 10000;">
    <div class="icon-container" onclick="myFunction(this)" id="icon-container">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
</div>

      <div class="Organisation_name animate-text">WHIZO</div>
      <nav class="menu-items hide">
        <div class="search-product-container animate-text">
          <div class="search-icon" id="search-product-btn" onclick="getProductsUsingSearch()"><i class="fa fa-search" aria-hidden="true"></i></div>
          <input type="text" required class="search-products" placeholder="search for Products, Brands and More" id="search-product-input" >
        </div>
        <div class="nav-responsive-item" id="nav-container">
        <a class="category-in-header animate-text">Categories</a>
        <a class="item3 animate-text" id="home-product-head">Products</a>
        <a class="item4 animate-text" href="{{url('ordered_products')}}" style="color:#153A5B;">Orders</a>
        <a class="hidden-menu-items">My Account</a>
        <a class="hidden-menu-items">Log Out</a>
        </div>
        <a class="item5 animate-text" href="{{url('cart_products')}}" style="color:#153A5B;"><i class="fa-solid fa-cart-shopping"></i></a>
        <a class="item8 animate-text" onclick='profileInformation()'><i class="fa-solid fa-user"></i></a>
      </nav>
      
  </div>
  <div class='profile-info' id='profile-info' >
  <div class='profile-info-header' style="color: black;">Manage Account</div>
  <hr color="gray">
  @auth
   <a href='{{url("/user/profile")}}' class="profile">profile</a>
   <a class="logout" href="{{url('/log-out')}}">log out</a>

   @else
   <a href='{{url("login")}}' class="profile">Login</a>
   <a class="logout" href="{{url('register')}}">Register</a>
  @endauth

  </div>
