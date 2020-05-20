<?php
   session_start();
      include('config.php');
      
      
      $user_check = $_SESSION['login_user'];
       $sql = "select username from users where username = '$user_check' ";
      $ses_sql = mysqli_query($db,$sql);
      
      $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
      $login_session = $row['username'];
   
       if(!isset($login_session)){
           header("location: ./login/index.php");
       }
   ?>