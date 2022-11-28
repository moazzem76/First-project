<?php

require_once '../vendor/autoload.php';
use App\classes\Funct;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$funct = new Funct();
$mail = new PHPMailer(true);

if(isset($_POST['action']) && $_POST['action']==='register'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

      if($funct->user_exits($email)>0){
          echo   $funct->textMessage('danger','This email '.$email.' already Exists in our record.');

      }else{
          if($funct->register($name,$email,$password)){
              echo 'done';

              $_SESSION['user_email']= $email;

          }else{
              echo   $funct->textMessage('warning','Something went wrong.');
          }
      }


}

    if(isset($_POST['action']) && $_POST['action']==='login'){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rememberMe = isset($_POST['rememberMe']) ? 1 : 0;
       $result = $funct->login($email);
       if($result->num_rows===1){
          $row = $result->fetch_assoc();
         if(password_verify($password,$row['password'])){
          if($row['status']==='1'){
              echo 'done';
              if( $rememberMe){
                  setcookie('user_email',$email,time()+(7*24*60*60) );
                  setcookie('user_pass',$password,time()+(7*24*60*60) );

              }else{

                  setcookie('user_email','',-time()+(7*24*60*60) );
                  setcookie('user_pass','',-time()+(7*24*60*60) );

              }

              $_SESSION['user_email']= $email;
              $_SESSION['user_name']= $row['name'];
              $_SESSION['user_id']= $row['id'];



          }else{
              echo   $funct->textMessage('danger','Your account is not active, Please contact us for activation your account.');
          }
         }else{
             echo   $funct->textMessage('danger','Your Password does not match in our record.');
         }
       }else{
           echo   $funct->textMessage('danger','Your Credentials do not match in our record.');
       }

    }

if(isset($_POST['action']) && $_POST['action']==='reset'){
    $email = $_POST['email'];
    $result = $funct->getUser($email);
    if($result->num_rows===1) {
        $token = uniqid();
      if($funct->tokenUpdate($token,$email)){
          //Email setup in php starts
          try {
              //Server settings
              //Enable verbose debug output
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = 'developmenttested@gmail.com';                        //SMTP username
              $mail->Password   = 'nbozindfakvwcyti';                         //SMTP password
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
              $mail->Port       = 465;                                   // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`;

              //Recipients
              $mail->setFrom('developmenttested@gmail.com', 'TechBangla Media');
              $mail->addAddress($email);     //Add a recipient
              ;

              //Content
              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = 'Reset Password Here';
              $mail->Body = '<div style=" font-family: Arial; width: 60%; color: dodgerblue; margin:0 auto;border: 1px solid #d1d2d4; padding: 25px  ; font-weight: bold;text-align: center;font-size: 25px"> Reset your password ??
                            <br>
                            <br>
                            <a style="width: 80px; padding: 15px 50px; text-decoration:none;border-radius: 50px; background: green;color: #ffffff;font-size: 25px" href="http://localhost/firstpro/admin/reset-password.php?email='.$email.'&token='.$token.'">Click Here</a>
                            <br>
                            <p style="font-size: 15px; color: black;text-align: left">lorem ipsum is the free content provider
                                in the world.lorem ipsum is the free content provider in the world.
                                lorem ipsum is the free content provider in the world.
                                lorem ipsum is the free content provider in the world.
                                lorem ipsum is the free content provider in the world. </p>
                            <p style="font-size: 15px; color: black;text-align: left">lorem ipsum is the free content provider
                                in the world.lorem ipsum is the free content provider in the world.
                                lorem ipsum is the free content provider in the world.
                                lorem ipsum is the free content provider in the world.
                                lorem ipsum is the free content provider in the world. </p>
                            <p style="font-size: 15px; color: black;text-align: left">lorem ipsum is the free content provider
                                in the world.lorem ipsum is the free content provider in the world.
                                lorem ipsum is the free content provider in the world.
                                lorem ipsum is the free content provider in the world.
                                lorem ipsum is the free content provider in the world. </p>
                        </div>';

              $mail->send();
              echo $funct->textMessage('success','Message has been sent successfully, please check your email.');
          } catch (Exception $e) {
              echo $funct->textMessage('danger','Message could not be sent. Mailer Error:'.$mail->ErrorInfo);

          }


          // email setup ends


      }else{
          echo   $funct->textMessage('danger','Something wrong');
      }
    }else{
        echo   $funct->textMessage('warning','Your registration Email is not found in our system.');
    }
}

if(isset($_POST['action']) && $_POST['action']==='setuppass'){
    $email = $_POST['email'];
    $npassword = $_POST['npassword'];
    $cnpassword =$_POST['cnpassword'];
    if($email !==''|| $npassword !=='' || $cnpassword !==''){
    $npassword =password_hash( $_POST['npassword'],PASSWORD_DEFAULT);

       if( $funct->resetPassword($email,$npassword)){
           echo   $funct->textMessage('success','Password updated successful!! <a href="login.php" style="text-decoration: none">Login</a>');
       }else{
           echo   $funct->textMessage('danger','Something went wrong! Try it again.');
       }
    }else{
        echo   $funct->textMessage('danger','Something went wrong!');
    }


    }