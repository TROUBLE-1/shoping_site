<?php 
   include('../config.php');
                       $sql = "select sign_up from settings";
                       $res = $db->query($sql);
                       $row = @mysqli_fetch_array($res);
                       $allow = $row['sign_up'];
                       if($allow == 'off'){
                           header('location: index.php');
                       }
                       ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Sign up</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
      <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
      <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
      <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
      <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
      <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
      <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
      <link rel="stylesheet" type="text/css" href="css/util.css">
      <link rel="stylesheet" type="text/css" href="css/main.css">
   </head>
   <body>
      <?php 
         session_start();
         if(isset($_SESSION['login_user'])){
             header('location: ../');
         }
         if(isset($_POST['signup'])){
             $username = mysqli_real_escape_string($db,$_POST['username']);
             $emailId = mysqli_real_escape_string($db,$_POST['emailId']);
             $password = md5(mysqli_real_escape_string($db,$_POST['password']));
             $mobile = mysqli_real_escape_string($db,$_POST['mobile']);
             $address = mysqli_real_escape_string($db,$_POST['address']);          
             $sql = "select username from users where username = '$username'";
             $result = mysqli_query($db,$sql);
             $row = @mysqli_fetch_array($result,MYSQLI_ASSOC);
             $count = @mysqli_num_rows($result);
             if($count == 0){
                 $sql = "insert into users(username, emailId, password, mobile, address) values 
                         ('$username', '$emailId', '$password', '$mobile', '$address')";
                 if(mysqli_query($db,$sql)) {  
                 //$_SESSION['login_user'] = $username;
                 //$_SESSION['email_id'] = $row['emailId'];
                     header("location: index.php");   
                 }else {
                      $error = "Wrong credentials";
                 }
             }else{
                 $msg = "Username already exists";
             }
         }
         ?>
      <div class="limiter" >
         <div class="container-login100" style="background-image: url('./images/bg-03.jpg');position: fixed;background-repeat: no-repeat;background-size: cover;" >
            <div class="container py-5" >
               <div class="col-lg-12 col-md-12 col-sm-12" >
                  <div class="row">
                     <div class="col-lg-5 col-md-7  mx-auto" >
                        <div class="card rounded-1" style="background-image: url('images/bg-05.PNG');">
                           <div class="card-header"style="background-image: url('images/bg-05.png');" >
                              <center>
                                 <h3 class="mb-0" style="font-weight: bold;">
                                    Sign up form
                                 </h3>
                              </center>
                           </div>
                           <div class="card-body">
                              <form class="form" method="POST" action="signup.php" role="form" id="frmLogin" style="font-weight: bold;">
                                 <div class="form-group" >
                                    <label >Username</label>
                                    <input type="text" autofocus="autofocus" class="form-control form-control-lg rounded-0" name="username" id="txtusername" required>
                                 </div>
                                 <div class="form-group"  >
                                    <label >Email Address</label>
                                    <input type="email" autofocus="autofocus" class="form-control form-control-lg rounded-0" name="emailId" required>
                                 </div>
                                 <div class="form-group">
                                    <label  >Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" name="password"id="pwd"required >
                                 </div>
                                 <div class="form-group"  >
                                    <label >Phone no</label>
                                    <input type="number" autofocus="autofocus" class="form-control form-control-lg rounded-0" name="mobile" required>
                                 </div>
                                 <div class="form-group "  >
                                    <label >Address</label>
                                    <input type="text" autofocus="autofocus" class="form-control form-control-lg rounded-0 " name="address" required>
                                 </div>
                                 <?php 
                                    if(isset($msg)){
                                    echo "<p style='color:red;'>";
                                    echo $msg;
                                    echo "</p>";
                                    }
                                    ?>
                                 <a href="index.php" style="text-decoration: underline;" >
                                 Already have a account?
                                 </a>
                                 <button type="submit" class="btn btn-success btn-lg btn-block" name="signup" id="btnLogin">Sign up</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="login100-more" style="background-image: url('images/bg-02.jpg');"></div>
         </div>
      </div>
      <div id="dropDownSelect1"></div>
      <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
      <script src="vendor/animsition/js/animsition.min.js"></script>
      <script src="vendor/bootstrap/js/popper.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="vendor/select2/select2.min.js"></script>
      <script>
         $(".selection-2").select2({
         	minimumResultsForSearch: 20,
         	dropdownParent: $('#dropDownSelect1')
         });
      </script>
      <script src="vendor/daterangepicker/moment.min.js"></script>
      <script src="vendor/daterangepicker/daterangepicker.js"></script>
      <script src="vendor/countdowntime/countdowntime.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>