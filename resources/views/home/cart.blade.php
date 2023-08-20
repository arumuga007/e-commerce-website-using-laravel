<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>

<style>
.cart-container {
    margin:0;
    padding: 0;
    background-color: #F1F3F6;
    width: 100vw;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}
.cart-products {
    background-color: #F1F3F6;
    width: 65%;

}
.cart-products {
    display:flex;
    flex-direction: column;
    overflow: hidden;
    
}
.each-products {
    height: 200px;
    width: 100%;
    display:flex;
    flex-direction: row;
    gap: 3vw;
    background-color: #FFFFFF;
}
.cart-image {
    height: 95%;
    width: 30%;
}
.details-container {
    display: flex;
    flex-direction: column;
}
.details-header {
    font-size: 1.5em;
    font-weight: 500;
}
.given-price {
         text-decoration: line-through;
}
.actual-price {
         margin-top: 7px;
         font-weight: 500;
         font-size: 1.3em;
         margin-right: 10px;
      }

      .discount-price {
         color: green;
         font-weight: 500;
         margin-left: 15px;
      }
.details-quantity-price {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 3vw;
    margin-top: 10px;
    
}
.quantity-field {
    text-align:center;
    height: 30px;
    width: 50px;
    border-radius: 4px;
}
.remove-btn {
    background-color: #F1F3F6;
    border: 1.3px solid black;
    padding: 5px 10px;
    border-radius: 4px;
    transition: all linear 0.2s;
}
.remove-btn:hover {
    background-color: red;
    color: white;
}
.cut-delivery {
    text-decoration: line-through;
    color: gray;
    font-size: 0.7em;
}
.price-details {
    background-color: #FFFFFF;
    
    width: 30%;
    height: 70vh;
}
.price-fixed {
    heigth: 100%;
    width: 100%;
    position: fixed;
    background-color: red;
}
.price-details {
    display: flex;
    flex-direction: column;
    margin-top: 2vh;
    margin-right: 2vw;
}
.price-header {
    font-size: 1.7em;
    width: 100%;
    font-weight: 500;
    text-align: center;
    margin: 10px 0;
}
.price-body {
    margin: 10px 20px; 
}
.price-items {
    display: flex;
    flex-direction: row;
    width: 100%;
    margin-top: 20px;
    justify-content: space-between;
    font-weight: 500;
}
.place-order-container {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}
.place-order-btn {
    text-align:center;
    background-color: #FB641B;
    width: 50%;
    padding: 10px 30px;
    border-radius: 4px;
    margin-top: 25px;
}
</style>
<body>
    
<div class="hero_area">
        @include('home.header')

        @php
            $noOfItems = 0;
            $totalAmount = 0;
            $discountPrice = 0;
            $totalPrice = 0;
        @endphp
    <div class='cart-container'>
    <div class='cart-products'>
        @foreach ($cartItemsGroups as $productId => $cartItemsGroup)
        
        @foreach ($cartItemsGroup as $cartItem)
        <div class='each-products'>
            <img src="uploads/{{$cartItem->product->image}}" class="cart-image">
            <div class="details-container">
                @php
                    $noOfItems++;
                    $totalPrice += $cartItem->product->price;
                    $discountPrice += $cartItem->product->discount_price;
                    $totalAmount = $totalPrice - $discountPrice;
                @endphp
                <div class="details-header">{{$cartItem->product->title}}</div>
                <div class="details-category">{{$cartItem->product->category}} || {{$cartItem->product->subcategory}}</div>
                <div class="product-stock">
                  @if($cartItem->product->quantity > 0)
                     <div class="in-stock" style="color: green">In stock <i class="fa-solid fa-tag"></i></div>
                  @else
                     <div style="color: red;">Out of Stock</div>
                  @endif
               </div>
               <div class="product-price">
                  <span class="actual-price">₹{{$cartItem->product->price - $cartItem->product->discount_price}}</span>
                  <span class="given-price">₹{{$cartItem->product->price}}</span>
                  <span class="discount-price">{{floor($cartItem->product->discount_price * 100 / $cartItem->product->price)}}% off</span>

               </div>
               <div class="details-quantity-price"> 
                    <input type=number value="{{$cartItem->quantity}}" class="quantity-field">
                    <a href='#' class="remove-btn">Remove</a>
                </div>
            </div>
            <div class="delivery-detail">Delivery by Sep 3 | 
                <div style="color: green;"> Free <span class="cut-delivery">₹40</span></div>
            </div>
            </div>
            @endforeach
    
@endforeach
    </div>
    <div class="price-details">
        <div class="price-header">
            Price Details
        </div>
        <div class="price-body">
        <div class="price-items">
            <span>Price ({{$noOfItems}} Items)</span>
            <span>₹{{$totalPrice}}</span>
        </div>
        <div class="price-items">
            <span>Discount</span>
            <span style="color: green;">-₹{{$discountPrice}}</span>
        </div>
        <div class="price-items">
            <span>Delivery Charges</span>
            <span style="color: green;">Free</span>
        </div>
        
        <div class="total-amount price-items">
            <span> Total Amount</span>
            <span class="price-span">₹{{$totalAmount}}</span>
        </div>
        </div>
        <div class="place-order-container">
        <a href='{{"/place-order"}}' class="place-order-btn">Place Order</a>
        </div>
    </div>
    </div>
    </div>
    <script src="home/js/jquery-3.4.1.min.js"></script>
      <script src="https://kit.fontawesome.com/42f8c3c6e9.js" crossorigin="anonymous"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
</body>
</html>