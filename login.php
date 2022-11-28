<?php
 //session_start();

require_once '../vendor/autoload.php';
use App\classes\Funct;
$funct = new Funct();

$funct->is_login() ? header("location:index.php") : false;
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/fontawesome/css/brands.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/fontawesome/css/fontawesome.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/admin/login.css" type="text/css">
</head>
<body>
<div class="container">
    <!--Login form starts-->
    <div class="row justify-content-center vh-100" id="login-form-box" >
        <div class="col-lg-10 my-auto">
            <div class="card-group">
                <div class="card p-3">
                    <h2 class="text-center text-info">Login to your account</h2>
                    <hr class="my-3">
                    <div id="loginError"></div>

                    <form action="" method="post" id="login-form">
                        <div class="form-group input-group-text">
                            <label for="email" class="p-1"><i class="fa fa-envelope"></i></label>
                            <input type="email" name="email" id="lgn_email" class="form-control is-invalid" placeholder="Typr Your Email Address" required value="<?php if(isset($_COOKIE['user_email'])){
                                echo $_COOKIE['user_email'];
                            }?>">
                            <div class="invalid-feedback">This Email field is required</div>
                        </div>

                        <div class="form-group input-group-text p-3">
                            <label for="password" class="p-1"><i class="fa fa-key"></i></label>
                            <input type="password" name="password" id="lgn_password" class="form-control is-invalid" placeholder="Typr Your Registration Password" required value="<?php if(isset($_COOKIE['user_pass'])){
                                echo $_COOKIE['user_pass'];
                            }?>">
                            <div class="invalid-feedback">Password field is required</div>
                        </div>
                        <div class="p-2">
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="rememberMe" <?php if(isset($_COOKIE['user_email'])){
                                            echo 'checked';
                                        }?> id="flexCheckIndeterminamte"  >
                                        <label for="flexCheckIndeterminamte" class="form-check-label">Remember Me</label>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <a class="text-decoration-none" id="showResetForm" href="javascript::">Forgottten Password ?</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group input-group-text p-3">

                            <input type="submit" name="register" id="loginBtn" class="form-control btn btn-primary" value="Login">
                        </div>

                    </form>
                </div>
                <div class="card p-3 bg-dark">

                    <h2 class="text-center text-light"> Welcome Back !!</h2>
                    <hr class="text-light my-3">
                    <p class="text-light text-center"><span class="text-info"> <i CLASS="fa fa-hand-point-left"></i> [ LOGIN HERE ]
                        </span>&nbsp;Have you not any account ? Please Sign up to click the below button.... <i class="fa fa-arrow-down-long"></i> ....for signing up</p>
                    <button CLASS="btn btn-warning mt-5" id="showRegister">SIGN UP</button>
                </div>>
            </div>
        </div>
    </div><!--Login form ends-->

    <!--Registration form starts-->
    <div class="row justify-content-center vh-100" id="register-form-box" style="display: none">
        <div class="col-lg-10 my-auto">
            <div class="card-group">
                <div class="card p-3">
                    <h2 class="text-center text-info">Create your account</h2>
                    <hr class="my-3">
                    <div id="registerError"></div>
                    <form action="" method="post" id="register-form">
                        <div class="form-group input-group-text">
                            <label for="name" class="p-1"><i class="fa fa-user"></i></label>
                            <input type="text" name="name" id="name" class="form-control is-invalid" placeholder="Typr Your Full Name" required>
                             <div class="invalid-feedback">This Name field is required</div>
                        </div>

                        <div class="form-group input-group-text p-3">
                            <label for="email" class="p-1"><i class="fa fa-envelope"></i></label>
                            <input type="email" name="email" id="email" class="form-control is-invalid" placeholder="Typr Your Email Address" required>
                            <div class="invalid-feedback">This Email field is required</div>
                        </div>

                        <div class="form-group input-group-text p-3">
                            <label for="password" class="p-1"><i class="fa fa-key"></i></label>
                            <input type="password" name="password" id="password" class="form-control is-invalid" placeholder="Typr Your  Password" required>
                            <div class="invalid-feedback"> Password is required</div>
                        </div>

                        <div class="form-group input-group-text p-3">
                            <label for="password" class="p-1"><i class="fa fa-key"></i></label>
                            <input type="password" name="cpassword" id="cpassword" class="form-control is-invalid" placeholder="Typr Your Confirm Password" required>
                            <div class="invalid-feedback"> Confirm Password is required</div>
                            <div class="text-danger" id="conPassError"> </div>
                        </div>

                        <div class="form-group input-group-text p-3">

                            <input type="submit" name="register" id="registerUser" class="form-control btn btn-primary" value="Register">
                        </div>

                    </form>
                </div>
                <div class="card p-3 bg-dark">

                    <h2 class="text-center text-light"> Welcome Back !!</h2>
                    <hr class="text-light my-3">
                    <p class="text-light text-center"><span class="text-info"> <i CLASS="fa fa-hand-point-left"></i> [ REGISTER HERE ]
                        </span>&nbsp;Have you an account ? Please Sign in to click the below button.... <i class="fa fa-arrow-down-long"></i> ....for logging in</p>
                    <button CLASS="btn btn-warning mt-5" id="showlogin">LOGIN</button>
                </div>>
            </div>
        </div>
    </div><!--Register form ends-->

    <!--Reset form starts-->
    <div class="row justify-content-center vh-100" id="reset-form-box" style="display: none">
        <div class="col-lg-10 my-auto">
            <div class="card-group">
                <div class="card p-3">
                    <h2 class="text-center text-info">Reset Your Password.</h2>
                    <hr class="my-3">
                    <div id="resetError"></div>
                    <form action="" method="post" id="reset-form">


                        <div class="form-group input-group-text p-3">
                            <label for="email" class="p-1"><i class="fa fa-envelope"></i></label>
                            <input type="email" name="email" id="reset_email" class="form-control is-invalid" placeholder="Typr Your Email Address" required>
                            <div class="invalid-feedback text-danger">This email field is required</div>
                        </div>

                        <div class="form-group input-group-text p-3">

                            <input type="submit" name="reset" id="resetPass" class="form-control btn btn-primary" value="Reset">
                        </div>

                    </form>
                </div>
                <div class="card p-3 bg-dark">

                    <h2 class="text-center text-light"> Welcome Back !!</h2>
                    <hr class="text-light my-3">
                    <p class="text-light text-center"><span class="text-info"> <i CLASS="fa fa-hand-point-left"></i> [ RESET PASSWORD ]
                        </span>&nbsp;Have you an account ? Please Sign in to click the below button.... <i class="fa fa-arrow-down-long"></i> ....for logging in</p>
                    <button CLASS="btn btn-warning mt-5" id="showloginBack">GO BACK TO LOGIN</button>
                </div>>
            </div>
        </div>
    </div><!--Reset  form ends-->
</div>


<script src="../assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery-3.6.1.min.js" type="text/javascript"></script>
<script src="../assets/js/admin/login.js" type="text/javascript"></script>
</body>
</html>