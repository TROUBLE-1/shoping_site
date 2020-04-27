<?php if(!isset($_SESSION['login_user'])){
   header('location: ./login.php');} 
   ?>
<div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
   <div class="logo">
      <a hef="home.php"><img src="images/logo.PNG" alt="merkery_logo" class="hidden-xs hidden-sm">
      <img src="images/logo.PNG" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
      </a>
   </div>
   <div class="navi">
      <ul>
         <li class="active"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
         <li><a href="message.php"><i class="fa fa-envelope" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Message</span></a></li>
         <li><a href="statistics.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Statistics</span></a></li>
         <li><a href="calender.php"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Calender</span></a></li>
         <li><a href="users.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
         <li><a href="setting.php"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Setting</span></a></li>
      </ul>
   </div>
</div>