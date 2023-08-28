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

.containerss {
    display: flex;
    flex-direction: row;
    width: 100vw;
    min-height: 100vh;
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
    height: 70%;
    overflow: hidden;
    background-color: #F5FAFE;
    display: flex;
    flex-direction: column;
    gap: 5%;
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
    font-weight: 500;   
    font-size: 1.3em;
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
    height: 40%;
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
    padding-bottom: 10px;
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
    font-size: 1.3em;
    font-weight: 500;
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
    font-size: .85em;
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
.user-btn-container {
    height: auto;
    width: 100%;
    display: flex;
    flex-direction: row;
    margin-left: 70%;
    gap:5%;
}
.user-btn {
    padding: 7px 10px;
    border-radius: 4px;
    border: 1px solid;
    border-color: rgba(0,0,0,.2);
    cursor: pointer;

}
.user-cancel-btn {
    background-color: white;
}
.user-success-btn {
    background-color: #FF9F00;
    padding: 7px 20px;
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
      .payment-container-upper {
        display:flex;
         flex-direction:row;
      }
</style>

   <body>
   <div class="addcart-successful" id='showsuccess'>
        <i class="fa-solid fa-circle-check"></i> Delivery Address Updated successfully
    </div>
      <div class="hero_area">
         @include('home.header')
         <div class="containerss">
            <form method="post" action="confirm_order_buynow" style="width: 100%;height:auto;">
            @csrf
            <input type="text" value="{{$user->id}}" style="display: none" name="user_id">
            <input type="text" value="{{$product_id}}" style="display: none" name="product_id">
            <input type="text" value="{{$quantity}}" style="display: none" name="quantity">
            <div class="left-container">
                <div class="user-details-container">
                    <div class="delivery-header">Delivery Address</div>
                    <div class="upper-details">
                        <div class="field-container">
                        <div class="label">Phone No:</div>
                        <input type=number value="{{intval($user->phone)}}" name="phoneno"  style="border-radius: 5px;" id='number'>
                        </div>
                        <div class="field-container">
                        <div class="label">Email:</div>
                        <input type=text name="email"  style="border-radius: 5px;" value="{{$user->email}}" id="email">
                        </div>
                    </div>
                    <div class="lower-details">
                        <div class="label">Address:</div>
                        <input value="{{$user->address}}" name="address" style="width: 68%;" class="input-field" id='address'>
                    </div>
                    
                <div class="user-btn-container">
                    <a class="user-cancel-btn user-btn">Cancel</a>
                    <a class="user-success-btn user-btn" onclick="updateUser()">Save</a>
                </div>
                    </div>
                <div class="payment-details-container">
                <div class="delivery-header">
                            Payment Options
                        </div>
                        <div  class="payment-container-upper">
                            <div class="each-payment-options" style="display: inline-block;display:flex; flex-direction:row;width: 10%;justify-content:center;">
                                <input type="radio" name="payment_method" value="1" style="margin-left:25px;margin-top: 5px;"><span>UPI</span>
                            </div>
                            
                            <div class="each-payment-options" style="display: inline-block;display:flex; flex-direction:row;width: 20%;justify-content:center;margin-left: 100px;">
                                <input type="radio" name="payment_method" value="1" style="margin-left:25px;margin-top: 5px;"><span>NetBanking</span>
                            </div>
                            </div>
                            <div class="payment-container-upper">
                            <div class="each-payment-options" style="display: inline-block;display:flex; flex-direction:row;width: 27%;justify-content:center;">
                                <input type="radio" name="payment_method" value="1" style="margin-left:25px;margin-top: 5px;"><span>Credit/DebitCard</span>
                            </div>
                            <div class="each-payment-options" style="display: inline-block;display:flex; flex-direction:row;width: 20%;justify-content:center;">
                                <input type="radio" name="payment_method" value="1" style="margin-left:25px;margin-top: 5px;"><p>CashOnDelivery</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-container">
                <div class="fixed-right-container">
                    <div class="price-details-header">Price Details</div>
                        <div class="price-container">
                            <div class="price-element">Price <span>₹{{$price}}</span></div>
                            <div class="price-element">Discount<span style="color: green;">-₹{{$discount_price}}</span></div>
                            <div class="price-element">Total Amount<span>₹{{$price - $discount_price}}</span></div>
                            <div class="price-element">
                            <a href="/redirect" class="back-btn">Back</a>
                            <input type="submit" id="confirm-btn" value="Confirm">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script>
            let userBtn = document.getElementById('user-success-btn');
            let phoneno = document.getElementById('number');
            let email = document.getElementById('email');
            let address = document.getElementById('address');
            function profileInformation() {
                let profile = document.getElementById('profile-info');
                profile.classList.toggle('show-profile-info');
            }
            const updateUser = () => {
                event.preventDefault();
                console.log('called');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const Data = {
            phoneno: phoneno.value,
            email: email.value,
            address: address.value
    };
    console.log(Data);
    fetch('/api/update-user', {  // Corrected route name here
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify(Data)
    })
    .then(response => {
        if (response.ok) {
                    return response.json();
        }
        return response.json();
    })
    .then(data => {
        let showSuccess = document.getElementById('showsuccess');
        showSuccess.classList.remove('addcart-completed');
        void showSuccess.offsetWidth;
        showSuccess.classList.add('addcart-completed');
    })
    .catch(error => {
        console.error('Fetch error:', error);
    });

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