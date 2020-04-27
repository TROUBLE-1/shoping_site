<?php
include ('../config.php');
session_start();
if (isset($_POST['login']))
{
    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);
    $mypassword = md5($mypassword);
    $sql = "select * from admin where username='$myusername' and password = '$mypassword'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1)
    {
        $_SESSION['login_user'] = $myusername;
        header("location: index.php");
    }
    else
    {
        $error = "Invalid Credential";
    }
}
?>

<head>
   <title>Trouble1</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
   <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
   <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
   <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
   <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
   <link rel="stylesheet" type="text/css" href="css/util.css">
   <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
   <div class="limiter">
      <div class="container-login100">
         <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
            <form class="login100-form validate-form" method="post" action="login.php">
               <span class="login100-form-title p-b-55">
               Admin Login
               </span>
               <div class="wrap-input100 validate-input m-b-16" data-validate = "username is required">
                  <input class="input100" type="text" name="username" placeholder="username" >
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                  <span class="lnr lnr-user"></span>
                  </span>
               </div>
               <div name="password" class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                  <input class="input100" type="password" name="password" placeholder="Password">
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                  <span class="lnr lnr-lock"></span>
                  </span>
               </div>
               <div>
                  <a href="../login/index.php" class="txt1">
                  User Login
                  </a>
               </div>
               <div>
                  <p class="txt1" style="color:#ff0000;font-weight: bold;">
                     <?php if(isset($error)){echo $error;}?>
                  </p>
               </div>
               <div class="container-login100-form-btn p-t-25">
                  <button name="login" class="login100-form-btn">
                  Login
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
   <!--===-->
   <script src="vendor/bootstrap/js/popper.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
   <!--===-->
   <script src="vendor/select2/select2.min.js"></script>
   <!--===-->
   <script src="js/main.js"></script>
</body>