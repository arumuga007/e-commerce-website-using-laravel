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
      <link href="home/css/stylehome.css" rel="stylesheet" />
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
        gap:1.5vh;
    }
    .order-header {
        font-size: 1.4em;
        font-weight: 500;
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
        height: 25vh;
        border: 1px solid;
        border-color: rgba(0,0,0,.1);
        border-radius: 4px;
        font-weight: 400;
    }
    .product-image {
        height: 100%;
        width: 20%;
        border-radius: 5px;
        display:flex;
        align-items: center;
        cursor:pointer;
    }
    .order-details-container {
        font-size: 1.1em;
        font-weight: 450;
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
        gap: 1vh;
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
    .cancel-order {
        text-align: center;
        cursor: pointer;
        transition: all linear .2s;
        width: 60%;
        padding: 3px 10px;
        background-color: white;
        border: 1px solid;
        border-color: rgba(0,0,0,.1);
        margin-left: 10px;
        border-radius: 5px;
    }
    .cancel-order:hover {
        background-color: red;
        color: white;
    }
    .rate-review {
        display: flex;
        flex-direction: row;
        align-items: center;
        cursor: pointer;
    }
.addcart-successful {
         position: fixed;
         background-color: #454545;
         color: #1ABE4D;
         text-align: center;
         padding: 10px 20px;
         border-radius: 5px;
         left: 35%;
         top:4vh;
         z-index: 100;
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
      .rate-product-container {
        position: fixed;
        min-height: 230px;
        min-width: 300px;
        text-align: center;
        height: auto;
        width: auto;
        background-color: white;
        border: 1px solid;
        border-color: rgba(0,0,0,0.1);
        border-radius: 5px;
        top: 30%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 100;
        background-color: #E8ECF6;
        visibility: hidden;
        opacity: 0;
        transition: all linear 0.2s;
      }

      .rate-product-header {
        background-color: white;
        height: 20%;
        padding: 10px 0px;
        font-weight: 450;
      }

      .rate-product-body {
        height: 140px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
        cursor: default;
      }

      .rate-product-btn {
        color: white;
        background-color: #5D55DB;
        display: inline-block;
        width: 100px;
        padding: 5px 5px;
        border-radius: 5px;
        cursor: pointer;
      }

      .rate-product-footer {
        height: 20%;
        background-color: white;
        padding: 10px 0px;
        cursor: pointer;
      }
      .star-icons {
        cursor:pointer;
      }

      .show-rate-product {
        animation: showRate 0.3s linear 1 forwards;
      }

      @keyframes showRate {
        0% {
            opacity: .5;
        }
        50% {
            top: 40%;
            opacity: 1;
        }
        100% {
            opacity: 1;
            top: 50%;
        }
      }

      @keyframes closeRate {
        0% {
            top: 50%;
        }
        50% {
            top: 40%;
            opacity: .5;
        }
        100% {
            opacity:0;
            top: 30%;
            visibility: hidden;
        }
      }

    </style>
   <body>
   @include('home.header')
    <div class="rate-product-container" id="rate-product-container" >
      <div class="rate-product-header">
        Your opinion matters to us!
      </div>
      <div class="rate-product-body">
        <div class="rate-body-header">
            How was the quality of product?
        </div>
        <div class="rate-star-container">
            
        <i class="far fa-star star-icons" aria-hidden="true" style="color: green;" data-value=0></i>
        <i class="far fa-star star-icons" aria-hidden="true" style="color: green;" data-value=1></i>
        <i class="far fa-star star-icons" aria-hidden="true" style="color: green;" data-value=2></i>
        <i class="far fa-star star-icons" aria-hidden="true" style="color: green;" data-value=3></i>
        <i class="far fa-star star-icons" aria-hidden="true" style="color: green;" data-value=4></i>
        </div>
        <div class="rate-product-btn" onclick="postProductRate()">
                Rate now
        </div>

      </div>
      <div class="rate-product-footer">
           <span onclick="closeRateDialog()" style="color: #007cff"> May be later</span>
      </div>
    </div>
    <div class="addcart-successful" id='showsuccess'>
        <i class="fa-solid fa-circle-check"></i> Order Cancelled Successfully
    </div>
    <div class="addcart-successful" id='show-rate'>
        <i class="fa-solid fa-circle-check"></i> Thank you so much. Your review has been saved
    </div>
        
        <div class="full-container" style="margin-top: 10vh;">
        <div class="order-container">
            <div class="order-header">My Orders</div>
        @foreach($orderItemGroup as $product_id => $products)
            @foreach($products as $product)
                @php
                    $productId = $product->product_id;
                @endphp
                <div class="each-products">
                    <a class="product-image" href="{{url('/product-details?product_id='.$productId)}}" style="display: flex; align-items: center; justify-content: center;"><img src="uploads/{{$product->orderProduct->image}}" style="max-height: 80%; max-width: 100%;object-fit: cover; width: auto; height: auto;"></a>
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
                        Cash on Delivery
                        @else
                            Prepaid
                        @endif
                    </div>
                    
                    @if($product->delivery_status == '0')
                        <div class="cancel-order" id="cancel-order" onclick="cancelOrder({{$product->id}})">Cancel Order</div>
                    @else
                        
                        <div class="rate-review" onclick="openRatingDialog({{$product->orderProduct->id}})"> <i class="fa fa-star" aria-hidden="true" style="color:green; font-size: 12px; margin-right: 6px;"></i><span class="padding-top: 10px;">Rate product</span></div>
                    @endif
                    </div>
                </div>


            @endforeach 
        @endforeach
        </div>
        <div class="filter-container" style="margin-right: 17px;">
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

        <script>
            let showRate = document.getElementById('show-rate');
            let cancelOrders = document.getElementsByClassName('cancel-order');
            let showSuccess = document.getElementById('showsuccess');
            let reviewIcons = document.querySelectorAll('.star-icons');
            let rateProductId = 0;
            let ratingValue = 0;
            let rateProductContainer = document.getElementById('rate-product-container');
            reviewIcons.forEach(icon => {
                icon.addEventListener('click', (event) => {
                    let limit = parseInt(icon.getAttribute('data-value'));
                    ratingValue = limit + 1;
                    let i = 0;
                    for(i = 0; i <= limit; i++) {
                        reviewIcons[i].classList.add('fas');
                        reviewIcons[i].classList.remove('far');
                    }
                    for(j = limit + 1; j < reviewIcons.length; j++) {
                        reviewIcons[j].classList.add('far');
                        reviewIcons[j].classList.remove('fas');
                    }
                })
            })
            
            function profileInformation() {
                let profile = document.getElementById('profile-info');
                profile.classList.toggle('show-profile-info');
            }
            const cancelOrder = (orderId) => {
                fetch(`/api/cancel-order?orderId=${orderId}`)
                .then(response => {
                    if(response.ok) {
                    console.log('order cancelled');
                     showSuccess.classList.remove('addcart-completed');
                     void showSuccess.offsetWidth;
                     showSuccess.classList.add('addcart-completed');

                    }
                })
                .catch(error => {
                    console.log('Error occured during execution:', error);
                })
            }
            const openRatingDialog = (productId) => {
                rateProductId = productId;
                rateProductContainer.style.animation = 'none';
                void rateProductContainer.offsetWidth;
                rateProductContainer.style.visibility = 'visible';
                rateProductContainer.style.animation="showRate 0.3s linear 1 forwards";
            }

            const closeRateDialog = () => {
                rateProductContainer.style.animation = 'none';
                void rateProductContainer.offsetWidth;
                rateProductContainer.style.animation="closeRate 0.3s linear 1 forwards";
            }

            const postProductRate = () => {
                fetch(`/api/rate-product?product_id=${rateProductId}&rateValue=${ratingValue}`)
                .then(response => {
                    return response.json();
                })
                .then(data => {
                    closeRateDialog();
                    showRate.classList.remove('addcart-completed');
                    void showSuccess.offsetWidth;
                    showRate.classList.add('addcart-completed');

                })
                .catch(error => {
                    console.log('error = ', error);
                })
            }

        </script>
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