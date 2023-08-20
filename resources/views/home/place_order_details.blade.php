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
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
<style>

.containers {
    display: flex;
    flex-direction: row;
    width: 100vw;
    height: 100vh;
    background-color: #F1F3F6;
    overflow: hidden;
}
.left-container {
    margin-left: 2vw;
    margin-top: 2vh;
    display:flex;
    flex-direction: column;
    width: 60%;
    height: 100%;
    overflow: hidden;
}
.user-details-container {
    padding-left: 20px;
    border-radius: 10px;
    height: 50%;
    overflow: hidden;
    background-color: #F5FAFE;
    display: flex;
    flex-direction: column;
    gap: 10%;
}
.upper-details {
    display:flex;
    flex-direction: row;
    gap: 10%;
}
.field-container {
    display:flex;
    flex-direction: column;
}
.delivery-header {
    font-weight: 600;   
    font-size: 1.5em;
}
.label {
    color: green;
}
.input-field {
    border-radius: 5px;
    border-color: 1px solid blue;
    height: 70px;
}
.lower-details {
    width: 100%;
}
.payment-details-container {
    margin-top: 10px;
    padding-left: 20px;
    border-radius: 10px;
    height: 30%;
    overflow: hidden;
    background-color: #F5FAFE;
    display: flex;
    flex-direction: column;
    gap: 10%;
}
.payment-body {
    display: flex;
    flex-direction: column;
    gap: 4vh;
}
.payment-upper-container {
    display: flex;
    flex-direction: row;
    gap: 30%;
}
.payment-lower-container {
    display: flex;
    flex-direction: row;
    gap: 6.5%;
}
/* Hide the default checkbox */
.custom-checkbox {
    display:inline-block;
}
.style-checkbox-value {
    margin-left: 5px;
}
.right-container {
    height: 100%;
    width: 30%;
}
.fixed-right-container {
    position: fixed;
    top:17.4%;
    right: 2%;
    border-radius: 15px;
    z-index: 10;
    height: 50%;
    width: 33%;
    background-color: #F5FAFE;
}
.price-details-header {
    margin-top: 10px;
    text-align: center;
    font-size: 1.5em;
    font-weight: 600;
}
.price-container {
    padding: 20px;
    display:flex;
    height: 100%;
    flex-direction: column;
    gap: 10%;
    font-size: 1.2em;
}
.price-element {
    display:flex;
    flex-direction: row;
    justify-content: space-between;
}
.back-btn {
    padding: 4px 20px;
    background-color: white;
    border: 1px solid black;
    border-radius: 5px;
}
#confirm-btn {
    
    padding: 4px 15px;
    background-color: green;
    color: white;
    border: 1px solid white;
    border-radius: 5px;
}
</style>

   <body>
      <div class="hero_area">
         @include('home.header')
         <div class="containers">
            <form method="post" action="confirm_order" style="width: 100%;height:auto;">
            @csrf
            <input type="text" value="{{$user->id}}" style="display: none" name="user_id">
            <div class="left-container">
                <div class="user-details-container">
                    <div class="delivery-header">Delivery Address</div>
                    <div class="upper-details">
                        <div class="field-container">
                        <div class="label">Phone No:</div>
                        <input type=number value="{{intval($user->phone)}}" name="phoneno"  style="border-radius: 5px;">
                        </div>
                        <div class="field-container">
                        <div class="label">Email:</div>
                        <input type=email name="email"  style="border-radius: 5px;" value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="lower-details">
                        <div class="label">Address:</div>
                        <input value="{{$user->address}}" name="address" style="width: 68%;" class="input-field">
                    </div>

                    </div>
                <div class="payment-details-container">
                <div class="delivery-header">
                            Payment Options
                        </div>
                        <div class="payment-body">
                            <div class="payment-upper-container">
                            <div class="custom-checkbox">
                            <input type="radio" name="payment_method" value="1"><span class="style-checkbox-value">UPI</span>
                            </div>
                            <div class="custom-checkbox">
                            <input type="radio" name="payment_method" value="2"><span class="style-checkbox-value">Net Banking</span>
                            </div>
                            </div>
                            <div class="payment-lower-container">
                            <div class="custom-checkbox">
                            <input type="radio" name="payment_method" value="3"><span class="style-checkbox-value">Credit / Debit / ATM Card</span>
                            </div>
                            <div class="custom-checkbox">
                            <input type="radio" name="payment_method" value="4"><span class="style-checkbox-value">Cash on Delivery</span>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-container">
                <div class="fixed-right-container">
                <div class="price-details-header">Price Details</div>
                <div class="price-container">
                <div class="price-element">Price <span>0</span></div>
                <div class="price-element">Discount<span style="color: green;">Free</span></div>
                <div class="price-element">Total Amount<span>0</span></div>
                <div class="price-element">
                <a href="#" class="back-btn">Back</a>
                <input type="submit" id="confirm-btn" value="Confirm">
                </div>
                </div>
                </div>
</form>
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