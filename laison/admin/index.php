<?php
session_start();
if(isset($_SESSION['user'])) {
    header("location:dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="login-page">
  <div class="form">
    <form class="login-form" id="login-form">
        <input type="text" name="username" id="username" placeholder="username" autocomplete=""/>
        <input type="password" name="password" id="password" placeholder="password" autocomplete="" />
        <button type="submit">login</button>
    </form>
  </div>
</div>
</body>
<script src="js/index.js" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
<script>
    $(document).ready(function() {
        $('#login-form').submit(function(e) {
            e.preventDefault();
            var ele = document.getElementById('username');
            var username = ele.value;
            username = username.trim();
            if(username.length == 0){
                toastr.info("Enter Username");
                ele.focus();
                return false;
            }

            var ele = document.getElementById('password');
            var password = ele.value;
            password = password.trim();
            if(password.length == 0){
                toastr.info("Enter Password");
                ele.focus();
                return false;
            }
            if(password.length < 8){
                toastr.info("Enter Minimum 8 character Password");
                ele.focus();
                return false;
            }

            $.ajax({
                type: "POST",
                url: 'login.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    response = JSON.parse(response);
                    console.log(response);
                    if(response.success){
                        toastr.success(response.success);
                        setTimeout(function() { 
                            location.href = "dashboard.php";
                        }, 2000);
                    } else if(response.error){
                        toastr.error(response.error);
                    }
                }
            });
        });
    });
</script>
</html>