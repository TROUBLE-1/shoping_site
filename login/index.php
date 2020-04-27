
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Page</title>
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
<body >
<?php 
include("../config.php");
session_start();

if(isset($_REQUEST['login'])){
    $myusername = mysqli_real_escape_string($db,$_REQUEST['username']);
    $mypassword = mysqli_real_escape_string($db,$_REQUEST['password']);
    $mypassword = md5($mypassword);
    $sql = "select * from users where username='$myusername' and password = '$mypassword'";
    
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);
    
    if($count == 1) {  
    $_SESSION['login_user'] = $myusername;
    $_SESSION['email_id'] = $row['emailId'];
        
        header("location: ../index.php");   
    }else {
         $error = "Wrong credentials";
    }
}
    
?>

	<div class="limiter" >
		<div class="container-login100" style="background-image: url('./images/bg-01.jpg');position: fixed;background-repeat: no-repeat;background-size: cover;" >
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="get" action="index.php">
					<span class="login100-form-title p-b-34">
						Account Login
					</span>
					<div class="w-full text-center">
					    <?php if(isset($error)){echo $error;}?>
					</div>
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<input type="submit" name="login" value= "Sign in" class="login100-form-btn">	
					</div>

					<div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							User name / password?
						</a>
						<br>
						<a href="../admin/" class="txt2">
							Admin Login?
						</a>
					</div>
                <?php 
                    $sql = "select sign_up from settings";
                    $res = $db->query($sql);
                    $row = @mysqli_fetch_array($res);
                    $allow = $row['sign_up'];
                    if($allow == 'on'){
                    ?>
					<div class="w-full text-center">
						<a href="signup.php" class="txt3">
							Sign Up
						</a>
					</div>
					<?php }?>
				</form>

				<div class="login100-more" style="background-image: url('images/bg-02.jpg');"></div>
			</div>
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