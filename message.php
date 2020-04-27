<?php include("session.php") ?>
<style type="text/css">
   #scroll {
   box-shadow: 5px 7px 0px 5px rgba(46, 46, 46, 0.4);
    border-radius: 30px;
   height: 800px;
   overflow-y: scroll; 
       
   }
   /* Hide scrollbar for Chrome, Safari and Opera */
   #scroll::-webkit-scrollbar {
   display: none;
       
   }
   /* Hide scrollbar for IE and Edge */
   #scroll {
   -ms-overflow-style: none;
       
   }
</style>
<body class="home" style="background-image: url('./images/wallpaper1.jpg');">
   <div class="container-fluid display-table">
      <div class="row display-table-row">
         <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
            <div class="logo">
               <a hef="home.php"><img src="images/logo.PNG" alt="merkery_logo" class="hidden-xs hidden-sm">
               <img src="images/logo.PNG" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
               </a>
            </div>
            <div class="navi">
               <ul>
                  <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                  <li class="active"><a href="message.php"><i class="fa fa-envelope" aria-hidden="true"></i><span class="hidden-xs hidden-sm">message</span></a></li>
                  <li><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Statistics</span></a></li>
                  <li><a href="calender.php"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Calender</span></a></li>
                  <li><a href="users.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
                  <li><a href="setting.php"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Setting</span></a></li>
               </ul>
            </div>
         </div>
         <div class="col-md-10 col-sm-11 display-table-cell v-align">
            <div class="row">
               <header style="background-image: url('./images/wallpaper.jpg');">
                  <?php include('header.php') ?>
               </header>
            </div>
            <div class="user-dashboard">
               <h1 style="color:#afddff;font-weight: bold;font-size:40px">Messages</h1>
               <div class="row">
                  <form method="get">
                     <div class="col-md-5 col-sm-5 col-xs-12 gutter modal-sm " >
                        <div class="container" >
                           <div id="scroll">
                              <?php include("display_msg.php") ?>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>