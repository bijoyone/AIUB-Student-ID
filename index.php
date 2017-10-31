<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Apple devices fullscreen -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Apple devices fullscreen -->
        <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

        <title>Student - Login</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- icheck -->
        <link rel="stylesheet" href="css/plugins/icheck/all.css">
        <!-- Theme CSS -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Color CSS -->
        <link rel="stylesheet" href="css/themes.css">


        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <!-- icheck -->
        <script src="js/plugins/icheck/jquery.icheck.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/eakroko.js"></script>

        <!--[if lte IE 9]>
                <script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
                <script>
                        $(document).ready(function() {
                                $('input, textarea').placeholder();
                        });
                </script>
        <![endif]-->


        <!-- Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico" />
        <!-- Apple devices Homescreen icon -->
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

    </head>

    <body class='login'>
        <div class="wrapper">
            <h1>
                <a href="index.html">
                    <img src="img/logo-big.png" alt="" class='retina-ready' width="59" height="49">FLAT</a>
            </h1>
            <div class="login-body">

                <h2>SIGN IN</h2>
                <h6><span style="margin-left: 35px;"><?php if (isset($_GET['success']) && $_GET['success'] == 1) echo "You have successfully done the registration"; ?></span></h6>
                <h6><span style="margin-left: 35px; color: red;"><?php if (isset($_GET['error']) && $_GET['error'] == 1) echo "email/password is wrong";else if (isset($_GET['error']) && $_GET['error'] == 2) echo "You don't have the access.please login with email and password."; ?></span></h6>
                <form action="verify.php" method='post' class='form-validate' id="test">
                    <div class="form-group">
                        <div class="email controls">
                            <input type="text" id="email" name='email' placeholder="Email address" class='form-control' data-rule-required="true" data-rule-email="true" value="<?php if(isset($_GET['email'])) echo $_GET['email']; else if(isset($_COOKIE['email'])) echo $_COOKIE['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="pw controls">
                            <input type="password" id="password" name="password" placeholder="Password" class='form-control' data-rule-required="true">
                        </div>
                    </div>
                    <div class="submit">
                        <div class="remember">
                            <input type="checkbox" name="remember" class='icheck-me' data-skin="square" data-color="blue" id="remember">
                            <label for="remember">Remember me</label>
                        </div>
                        <input type="submit" value="Sign in" class='btn btn-primary' onclick="return validation()">
                    </div>
                </form>
                <div class="forget">
                    <a href="#">
                        <span>Forgot password?</span>
                    </a>
                </div>
            </div>
        </div>
        <script>
            function validation() {
                var email = document.getElementById('email');
                var password = document.getElementById('password');
                if (email.value == "" || !validateEmail(email.value)) {
                    email.style.border = "1px solid red";
                    email.focus();
                    return false;
                }else{
                    email.style.border = "1px solid #a6a6a6";
                }
                if (password.value == "") {
                    password.style.border = "1px solid red";
                    password.focus();
                    return false;
                }else{
                    email.style.border = "1px solid #a6a6a6";
                }
                return true;
            }
            function validateEmail(email)
            {
                var re = /\S+@\S+\.\S+/;
                return re.test(email);
            }
        </script>
    </body>

</html>

