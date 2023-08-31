
<div class="containers">
    <div class="header">
      <div class="Organisation_name animate-text" style="padding-left: 20px;width: 67%;">WHIZO</div>
      <label>
        <i class="menu-icon animate-text" onclick="getMenu()">Menu</i>
      </label>
      <nav class="menu-items hide">
        <a class="item1 animate-text" style="position: relative;color: black;" href="{{url('/redirect')}}">Home</a>
        <a class="item2 animate-text">Services</a>
        <a class="item3 animate-text">Products</a>
        <a class="item4 animate-text" href="{{url('ordered_products')}}" style="color:black;">Orders</a>
        <a class="item5 animate-text" href="{{url('cart_products')}}" style="color:black;"><i class="fa-solid fa-cart-shopping"></i></a>
        <a class="item8 animate-text" onclick='profileInformation()'><i class="fa-solid fa-user"></i></a>
      </nav>
      
  </div>
  <div class='profile-info' id='profile-info'>
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
