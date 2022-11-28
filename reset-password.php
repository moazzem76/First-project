<?php
session_start();

require_once '../vendor/autoload.php';
use App\classes\Funct;
$funct = new Funct();

$funct->is_login() ? header("location:index.php") : false;
if(isset($_GET['email']) && isset($_GET['token'])){
    $email = $_GET['email'];
    $token = $_GET['token'];

   $result =$funct->checkToken($email,$token);
   if($result->num_rows !== 1){
       header("location:login.php") ;
   }


}else{
    header("location:login.php") ;
}
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password Panel</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/fontawesome/css/brands.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/fontawesome/css/fontawesome.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/admin/login.css" type="text/css">
</head>
<body>
<div class="container">
    <!--New password setup form starts-->
    <div class="row justify-content-center vh-100" id="password-setup-form-box" >
        <div class="col-lg-10 my-auto">
            <div class="card-group">
                <div class="card p-3" style="flex-grow: 1.5">
                    <h2 class="text-center text-info">Reset Your New Password</h2>
                    <hr class="my-3">
                    <div id="resetPassError"></div>

                    <form action="" method="post" id="password-setup-form">
                        <input type="hidden" value="<?=$email;?>" name="email">
                        <div class="form-group input-group-text p-3">
                            <label for="password" class="p-1"><i class="fa fa-key"></i></label>
                            <input type="password" name="npassword" id="new-password" class="form-control is-invalid" placeholder="Type Your New Password" >
                                  <div class="invalid-feedback text-danger">New Password is required</div>
                        </div>


                        <div class="form-group input-group-text p-3">
                            <label for="password" class="p-1"><i class="fa fa-key"></i></label>
                            <input type="password" name="cnpassword" id="cnew-password" class="form-control is-invalid " placeholder="Type Your Confirm New Password" >
                            <div class="invalid-feedback text-danger"> Confirm Password don't match.</div>
                        </div>

                        <div class="form-group input-group-text p-3">

                            <input type="submit" name="register" id="password-setupBtn" class="form-control btn btn-primary" value="Save Your Password">
                        </div>

                    </form>
                </div>
                <div class="card p-3 bg-dark">

                    <h2 class="text-center text-light"> Welcome Back !!</h2>
                    <hr class="text-light my-3">
                    <p class="text-light text-center"><span class="text-info"> <i CLASS="fa fa-hand-point-left"></i> [ Reset Your New Password ]
                        </span>&nbsp;Enter Your New Password as You like best as a strong Password</p>

                </div>>
            </div>
        </div>
    </div><!--New password setup form ends-->





<script src="../assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery-3.6.1.min.js" type="text/javascript"></script>
<script src="../assets/js/admin/login.js" type="text/javascript"></script>
</body>
</html>
