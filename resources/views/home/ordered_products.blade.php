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
    .full-container {
        display:flex;
        padding-top: 20px;
        width: 100%;
        flex-direction: row;
        background-color: #F1F3F6;
        min-height: 100vh;
        height: auto;
        justify-content: space-around;
    }
    .order-container {
        display:flex;
        flex-direction: column;
        width: 70%;
        padding-left: 30px;
        gap:1.5vh;
    }
    .order-header {
        font-size: 1.4em;
        font-weight: 600;
        padding-top: 1vh;
        padding-left: 2vw;
        background-color: #FFFFFF;
        height: 8vh;
        border: 1px solid;
        border-color: rgba(0,0,0,.1);
        border-radius: 4px;
    }
    .filter-container {
        display: flex;
        flex-direction: column;
        width: 25%;
        background-color: #FFFFFF;
        border: 1px solid;
        border-color: rgba(0,0,0,.1);
        border-radius: 4px;
        padding-left: 1.5%;
        padding-top: 1.5%;
        gap: 3%;
        height: 50vh;
    }
    .each-products {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        background-color: #FFFFFF;
        height: 20vh;
        border: 1px solid;
        border-color: rgba(0,0,0,.1);
        border-radius: 4px;
        font-weight: 500;
    }
    .product-image {
        height: 80%;
        width: 20%;
        border-radius: 5px;
        cursor:pointer;
    }
    .order-details-container {
        font-size: 1.2em;
        font-weight: 560;
    }
    .status-round {
        height: 8px;
        width: 8px;
        border-radius: 50%;
        background-color: red;
    }
    .order-status {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 6px;
    }
    .order-delivery-status {
        display: flex;
        flex-direction: column;
        gap: 2vh;
        min-width: 30%;
    }
    .filter-header {
        font-size: 1.4em;
        font-weight: 570;
    }
    .body-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    .filter-body-options {
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding-left: 10%;
    }
    .options-value {
        margin-left: 8px;
    }
    .filter-options {
        cursor: pointer;
    }
    </style>
   <body>
<div class="hero_area">
        @include('home.header')
        <div class="full-container">
        <div class="order-container">
            <div class="order-header">My Orders</div>
        @foreach($orderItemGroup as $product_id => $products)
            @foreach($products as $product)
                @php
                    $productId = $product->product_id;
                @endphp
                <div class="each-products">
                    <a class="product-image" href="{{url('/product-details?product_id='.$productId)}}"><img src="uploads/{{$product->orderProduct->image}}" style="height: 100%; width: 100%;"></a>
                    <div class="order-details-container">
                        <div class="order-details-header">
                            {{$product->orderProduct->title}}
                        </div>
                        <div class="order-details-header">
                            Quantity: {{$product->quantity}}
                        </div>
                    </div>
                    <div class="product-price">
                    ₹{{($product->orderProduct->price - $product->orderProduct->discount_price) * $product->quantity}}
                    </div>
                    <div class="order-delivery-status">
                    <div class="order-status">
                        <div class="status-round" style="background-color: {{$product->delivery_status == '0'? '#FF9F00' : 'green'}}"></div>
                        @if($product->delivery_status == '0')
                            In Progress
                        @else
                            Delivered Successfully
                        @endif
                    </div>
                    
                    <div class="order-status">
                         <div class="status-round" style="background-color: {{$product->payment_status == '0'? '#FF9F00' : 'green'}}"></div>
                        @if($product->payment_status == '0')
                        Cash On Delivery
                        @else
                            Prepaid
                        @endif
                    </div>
                    </div>
                </div>


            @endforeach 
        @endforeach
        </div>
        <div class="filter-container">
            <div class="filter-header">
                Filters
            </div>
            <div class="body-container">
                <div class="filter-body-header">ORDER STATUS</div>
                <div class="filter-body-options">
                    <div><input type="checkbox" value="1" class="filter-options"><span class="options-value">On the way</span></div>
                    <div><input type="checkbox" value="1" class="filter-options"><span class="options-value">Delivered</span></div>
                    <div><input type="checkbox" value="1" class="filter-options"><span class="options-value">Cancelled</span></div>
                    <div><input type="checkbox" value="1" class="filter-options"><span class="options-value">Returned</span></div>
                </div>
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