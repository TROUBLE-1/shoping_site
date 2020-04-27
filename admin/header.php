<?php if(!isset($_SESSION['login_user'])){
   header('location: ./login.php');} 
   ?>   
<title>Trouble1</title>
<head>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <link href="css/main.css" type="text/css" rel="stylesheet" >
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   <!------ calender ---------->
   <link rel="stylesheet" href="css/calender.css">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   <!------ calender ---------->
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<div>
   <div class="col-md-7">
      <nav class="navbar-default pull-left">
         
      </nav>
      <div class="search hidden-xs">
         <h1 class="text-primary" >Admin's web page.</h1>
      </div>
   </div>
   <div class="col-md-5">
      <div class="header-rightside">
         <ul class="list-inline header-top pull-right">
            <a href="logout.php" class="add-project"  >Sign Out</a>
            <li><a href="message.php"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
            <li>
               <a href="#" class="icon-info">
               <i class="fa fa-bell" aria-hidden="true"></i>
               <span class="label label-primary">3</span>
               </a>
            </li>
            <li class="">
              <img src="images/logo.PNG" alt="user">
               
            </li>
         </ul>
      </div>
   </div>
</div>