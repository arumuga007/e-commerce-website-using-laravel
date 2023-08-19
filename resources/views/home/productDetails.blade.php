<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
        .product-details {
            display:flex;
            flex-direction:row;
            gap: 2vw;
            width:100%;
        }
        .product-details-left {
         display: flex;
         flex-direction: column;
         align-items: center;
         
         width: 40%;
        }
        .product-details-right {
         width: 30%;
        }
        .details-img-container{
            overflow: hidden;
            height: 80%;
            width: 100%;
        }
        img {
            height: 100%;
        }
        .details-btn-container{
            margin-top: 30px;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 2vw;
        }
        .details-btn {
            padding: 10px 50px;
            color: white;
            border-radius: 4px;
            font-size: 1.2em;
            font-weight: 700;
        }
      .product-title {
         font-size: 2em;
         font-weight: 800;
      }

      .given-price {
         text-decoration: line-through;
      }
      .product-rate {
         margin-left: 10px;
         padding: 5px 9px;
         background-color: green;
         color: white;
         border-radius: 2px;
      }
      .actual-price {
         margin-top: 7px;
         font-weight: 500;
         font-size: 1.7em;
         margin-right: 10px;
      }

      .discount-price {
         color: green;
         font-weight: 500;
         margin-left: 15px;
      }
      .description-head {
         margin: 10px 0;
         font-size: 1.5em;
      }
      .category-subcategory {
         margin-top: 10px;
         font-weight: 500;
         font-size: 1.5em;

      }
      .delivery-details {
         font-size: 1.2em;
         font-weight: 500;
      }
      .available-quantity {
         margin-top: 10px;
         font-weight: 500;
         margin-top: 10px;
      }

      .product-quantity {
         font-size: 1.2em;
         font-weight: 500;
         margin-top: 10px;
      }
      .quantity-input {
         width: 150px;
         border-radius: 5px;
      }
      .buy-btn {
         padding: 15px 65px;
      }
      .prevent-execute {
         
         color:black;
      }
    </style>
   <body>
      <div class="hero_area">
        @include('home.header')
        <div class="product-details">
            <div class="product-details-left">
                <div class="details-img-container">
                  <img src="uploads/{{$data->image}}">
                </div>
                
            </div>
            <div class="product-details-right">
               <div>
               <span class="product-title">{{$data->title}}
                  
               </span>
               <span class='product-rate'>4.2<i class="fa fa-star" aria-hidden="true" style="color:white; font-size: 10px; margin-left: 5px;"></i></span>
            </div>
               <div class="product-price">
                  <span class="actual-price">₹{{$data->price - $data->discount_price}}</span>
                  <span class="given-price">₹{{$data->price}}</span>
                  <span class="discount-price">{{floor($data->discount_price * 100 / $data->price)}}% off</span>

               </div>
                  <div class="product-description-container">
                     <div class="description-head">Description</div>
                     <div class="product-description">
                            {{$data->description}}
                     </div>
                  </div>
                  <div class="category-subcategory">
                     <span style="color: #FF9F00">{{$data->category}}</span>   ||   <span style="color: #FB641B;">{{$data->subcategory}}</span>
                  </div>
            </div>
            <div class="product-details-rightmost">
               <div class="delivery-details">Free Delivery <i class="fas fa-shipping-fast"></i></div>
               <div class="product-stock">
                  @if($data->quantity > 0)
                     <div class="in-stock" style="color: green">In stock <i class="fa-solid fa-tag"></i></div>
                  @else
                     <div style="color: red;">Out of Stock</div>
                  @endif
               </div>
               <div class="available-quantity">Available Quantity: <span>{{$data->quantity}}</span></div>
               <div class="product-quantity">
                  <span>Quantity: </span>
                  <input type=number value="1" min="1" onchange="checkQuantity()" class="quantity-input" id="quantity">
               </div>
               <div class="details-btn-container">
                  <a href="{{url('')}}" class="details-btn" style="background-color: #FF9F00;" onclick="preventExecute(event)" id="addcart">
                     <i class="fa-solid fa-cart-shopping"></i>
                     Add to Cart 
                  </a>
                  <button class="details-btn buy-btn" style="background-color: #FB641B;" onclick="preventExecute(event)" id="buynow">
                  <i class="fas fa-bolt"></i>
                     Buy Now 
   </button>
                </div>
            </div>
        </div>
        @include('home.subscribe')
        @include('home.client')
        @include('home.footer') 
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
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
         function checkQuantity() {
            let value = document.getElementById('quantity').value;
            if(value > {{$data->quantity}}) {
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
         function preventExecute(event) {
            if(inputChanged) {
            event.preventDefault();
               addCart.classList.add('prevent-execute');
               buynow.classList.add('prevent-execute');
            }
            else {
               @auth
                  console.log('called');
               @else
                  window.location.href = 'login';
               @endauth
            }
         }
      </script>
   </body>
</html>