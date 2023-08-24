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
      .order-confirm-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100vw;
            height: 90vh;
            background-color: #F5FAFE;
      }
      .sub-container {
            padding: 20px 0px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: white;
            min-width: 400px;
            min-height: 40%;
            justify-content: space-between;
      }
      .order-icon {
            color: blue;
            font-size: 2em;
      }
      .order-body {
            display: flex;
            flex-direction: column;
            align-items: center;
      }
      .order-successful-text {
            font-size: 1.3em;
            color: blue;
      }
      .thank-you-text {
            font-size: 0.8em;
            color: gray;
      }
      .check-status-btn {
            color: white;
            padding: 7px 16px;
            background-color: blue;
            border-radius: 3px;
            font-size: .9em;
            transition: all linear .2s;
      }
      .check-status-btn:hover {
            color: white;
            background-color: orange;
      }
   </style>
   <body>
   <div class="hero_area">
         @include('home.header')
         <div class="order-confirm-container">
            <div class="sub-container">
            <div><i class="fa-solid fa-circle-check deliver-done order-icon"></i> </div>
            <div class="order-body">
                  <div class="order-successful-text">Order Successful</div>
                  <div class="thank-you-text">Thank you so much for your order</div>
            </div>
            <a class="check-status-btn" href="{{url('ordered_products')}}">CHECK STATUS</a>
            </div>
      </div>

    </div>
    <script src="home/js/jquery-3.4.1.min.js"></script>
      <script src="https://kit.fontawesome.com/42f8c3c6e9.js" crossorigin="anonymous"></script>
      <script>
      function profileInformation() {
                let profile = document.getElementById('profile-info');
                profile.classList.toggle('show-profile-info');
            }

      </script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
</body>