<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="admin/assets/css/forgotPassword.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Acme' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=REM:wght@300;500&display=swap" rel="stylesheet">
    <title>change password</title>
</head>
<style>
.addcart-successful {
    position: fixed;
    background-color: black;
    color: #1ABE4D;
    text-align: center;
    padding: 10px 20px;
    border-radius: 5px;
    left: 35%;
    top:0vh;
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
       top:10vh;
    }
    75% {
       top:10vh;
       opacity: 1;
    }
    90% {
       opacity: 0;
    }
 }
</style>
<body>
    <div class="container">
        
    @if(session('message'))
        <div class="addcart-successful addcart-completed" id='showsuccess'>
        <i class="fa-solid fa-circle-check"></i> {{session('message')}}
        </div>
    @endif
        <form class="small-container" action="{{url('change-password')}}" method="post" onsubmit="return checkPasswordMatch()">
            @csrf
            <div class="header">Change Password</div>
            <div class="user-email"><label>Email:</label>
            <input type=email name=email required>
            </div>
            <div class="user-email"><label>New password:</label>
            <input type=password name=password required minlength='8' maxlength='20' class="password">
            </div>
            <div class="user-email"><label>Re-enter new password:</label>
            <input type=password name="newPassword" required minlength='8' maxlength='20' class="repassword">
            </div>
            <input type=submit class="password-btn" value="change password">
        </form>
    </div>
</body>
<script>
function checkPasswordMatch() {
    let password = document.querySelector('.password');
    let repassword = document.querySelector('.repassword');
    if(password.value !== repassword.value) {
        alert("password doesn't match");
        repassword.value="";
        return false;
    }
    return true;
}
</script>
</html>
