<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Category</title>
    @include('admin.style')
</head>
   <style>
    .full-container {
        background-color: black;
        display:flex;
        padding-top: 20px;
        width: 100%;
        flex-direction: row;
        min-height: 100vh;
        height: auto;
        justify-content: space-around;
    }
    .order-container {
        display:flex;
        flex-direction: column;
        width: 100%;
        padding-left: 30px;
        gap:1.5vh;
    }
    .order-header {
        font-size: 1.4em;
        font-weight: 600;
        padding-top: 1vh;
        padding-left: 2vw;
        background-color: #000000;
        height: 8vh;
        border: 1px solid;
        border-color: rgba(0,0,0,.1);
        border-radius: 4px;
        align-self: center;
    }
    .filter-container {
        display: flex;
        flex-direction: column;
        width: 25%;
        background-color: rgba(0,0,0,.2);
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
        background-color: black;
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
    .admin-deliver-status {
        min-width: 10%;
        display:flex;
        justify-content:center;
    }
    .deliver-btn {
        background-color: #00D25B;
        color: white;
        padding: 7px 15px;
        border-radius: 2px;
        cursor: pointer;
    }
    .deliver-done {
        font-size: 2.5em;
        color: green;
    }
      .addcart-successful {
         position: fixed;
         background-color: white;
         color: #1ABE4D;
         text-align: center;
         padding: 10px 20px;
         border-radius: 5px;
         left: 45%;
         top:4vh;
         z-index: 10;
         opacity: 0;
      }
      .addcart-completed {
         animation-name: show-success;
         animation-duration: 5s;
      }
      @keyframes show-success {
         0% {
            opacity: 1;
         }
         10% {
            top:18vh;
         }
         75% {
            top:18vh;
            opacity: 1;
         }
         90% {
            opacity: 0;
         }
      }
    </style>
<body style="position:relative;">

<div class="addcart-successful" id='showsuccess'>
    <i class="fa-solid fa-circle-check"></i> Delivery status Updated successfully
</div>
<div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="full-container">
        <div class="order-container">
            <div class="order-header">All Orders</div>
            
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
                    
                    <div class="admin-deliver-status">
                        @if($product->delivery_status == '0')
                            <div id="Deliver-btn" onclick="updateOrder({{$product->id}})"><div class="deliver-btn">Deliver</div></div>

                        @else
                            <div><i class="fa-solid fa-circle-check deliver-done"></i></div>
                        @endif
                    </div>
                </div>


            @endforeach 
        @endforeach
</div>
        </div>
          </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('admin.script')
    <script src="https://kit.fontawesome.com/42f8c3c6e9.js" crossorigin="anonymous"></script>
    <script>
        let showSuccess = document.getElementById('showsuccess');
        const updateOrder= (order_id) => {
            fetch(`updateDeliveryStatus?order_id=${order_id}`)
            .then(response => {
                if(response.ok) {
                    showSuccess.classList.remove('addcart-completed');
                     void showSuccess.offsetWidth;
                     showSuccess.classList.add('addcart-completed');
                }
            });
        }
    </script>
</body>
</html>
