<?php if(($_SESSION['login_user']) == false){
   header('location: ./login/index.php');
   
   } ?>
<head>
   <meta charset="UTF-8">
   <title>Trouble1</title>
   <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
   <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
   <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
   <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
   <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
   <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
   <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
   <link rel="stylesheet" type="text/css" href="css/login/util.css">
   <link rel="stylesheet" type="text/css" href="css/login/main.css">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="./css/style.css">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<nav  class="navbar navbar-expand-md navbar-dark bg-dark">
   <div class="container">
      <a class="navbar-brand" href="index.php">
      Welcome, <?php echo $_SESSION['login_user'];?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
         <ul class="navbar-nav m-auto">
            <li class="nav-item">
               <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="categories.php">Categories</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="product.php">Product</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="cart.php">Cart</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="contact.php">Contact</a>
            </li>
         </ul>
         <form class="form-inline my-2 my-lg-0">
            <div class="input-group input-group-sm">
               <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search...">
               <div class="input-group-append">
                  <button type="button" class="btn btn-secondary btn-number">
                  <i class="fa fa-search"></i>
                  </button>
               </div>
            </div>
            <a class="btn btn-success btn-sm ml-3" href="cart.php">
            <i class="fa fa-shopping-cart"></i> Cart
            <span class="badge badge-light">
            <?php 
               $user = $_SESSION['login_user'];
               $sql = "select count(*) from cart where username = '$user'";
               $res = mysqli_query($db,$sql);
               $row = @mysqli_fetch_array($res);
               echo $row['count(*)'];
               
               ?>
            </span>
            </a>
            <?php 
               if(isset($_SESSION['login_user'])){
               echo  "<a class='btn btn-warning btn-sm ml-3' href='logout.php'>";
               echo "<span class='badge badge-light'>Sign Out</span></a>";
               }
               ?>
         </form>
      </div>
   </div>
</nav>
