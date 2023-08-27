<!DOCTYPE html>
<html>
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
      <title>Whizoid Studio</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <link href="home/css/stylehome.css" rel="stylesheet" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <link href="home/css/productStyle.css" rel="stylesheet" />
   </head>
   <body>
      
<div class="addcart-successful" id='showsuccess'>
   <i class="fa-solid fa-circle-check"></i> Product added to Cart successfully
</div>
<div class="container-scroller">
      @include('home.header')
      <div class="product-container">
         <div class="image-container">
         <img src="uploads/{{$data->image}}" class="product-image">
         </div>
         <div class="product-details">
            <div class="details-header">
            {{$data->title}}
            </div>
            <div class="details-rating">
            <i class="fa fa-star" aria-hidden="true" style="color: red; font-size: .8em;"></i>
            <i class="fa fa-star" aria-hidden="true" style="color: red; font-size: .8em;"></i>
            <i class="fa fa-star" aria-hidden="true" style="color: red; font-size: .8em;"></i>
            <i class="fa fa-star" aria-hidden="true" style="color: red; font-size: .8em;"></i>
            <i class="far fa-star" style="color: red; font-size: .8em;"></i>
             <span  style="font-size: .8em;">(20)</span>
            </div>
            <div class="description-header">Details:</div>
            <div class="product-description">{{$data->description}}</div>
            <div class="product-price"><span style="font-weight: 600; font-size: 1.4em; padding-right: 10px; color: #2DCE40;">₹{{$data->price - $data->discount_price}}</span> <span style="text-decoration: line-through;font-size: 0.9em;">₹{{$data->price}}</span></div>
            
               <form method="post" class="quantity-container">
                     @csrf
                  <span>Quantity: </span>
                  <input type=number value="1" min="1" onchange="checkQuantity()" id="quantity">
               </form>
               <div class="product-btns">
               <button class="product-btn" style="background-color: white;color: red;" onclick="addCarts(event)" id="addcart">
                     <i class="fa-solid fa-cart-shopping"></i>
                     Add to Cart 
                  </button>
                  <button class="product-btn buy-btn" style="padding: 10px 45px;" onclick="buyNow(event)" id="buynow">
                  <i class="fas fa-bolt"></i>
                     Buy Now 
                  </button>
               </div>
            </div>
         </div>



      </div>













      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
      <script src="https://kit.fontawesome.com/42f8c3c6e9.js" crossorigin="anonymous"></script>
      <script>
         var inputChanged = false;
         let addCart = document.getElementById('addcart');
         let buynow = document.getElementById('buynow');
         let quantity = document.getElementById('quantity');
         let showSuccess = document.getElementById('showsuccess');
         function profileInformation() {
         let profile = document.getElementById('profile-info');
         profile.classList.toggle('show-profile-info');
         }
         function checkQuantity() {
            values = quantity.value;
            if(values > {{$data->quantity}}) {
               inputChanged = true;
               addCart.classList.add('prevent-execute');
               buynow.classList.add('prevent-execute');
            }
            else {
               inputChanged = false;
               addCart.classList.remove('prevent-execute');
               buynow.classList.remove('prevent-execute');
            }
         }
         const buyNow = (event) => {
            if(inputChanged)
               event.preventDefault;
            else {
               @auth
                  window.location.href= `order-using-buynow?product_id={{$data->id}}&quantity=${quantity.value}`;
               @else
                  window.location.href = 'login';
               @endauth
            }
         }
         function addCarts(event) {
            if(inputChanged)
            event.preventDefault();

            else {
            @auth
               const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
               console.log(csrfToken);
                Data = {
                  quantity: parseInt(quantity.value),
                  productId: {{$data->id}}
                }
                console.log(Data);
                fetch('/api/addcart', {
                  method: 'POST',
                  headers: {
                     'Content-Type': 'application/json',
                     'X-CSRF-TOKEN': csrfToken
                  },
                  body: JSON.stringify(Data)
                })
                .then(response => {
                  if(response.ok) {
                     showSuccess.classList.remove('addcart-completed');
                     void showSuccess.offsetWidth;
                     showSuccess.classList.add('addcart-completed');

                  }
                  return response.json();
                }
                )
                .then(data => {
                  console.log(data);
                })
            @else
               window.location.href = 'login';

            @endauth

            }
         }
      </script>
   </body>
</html>