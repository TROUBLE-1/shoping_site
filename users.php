<?php include("session.php");
   
   
   
   
   ?>
   <style type="text/css">
   #scroll {
    box-shadow: 5px 7px 0px 5px rgba(72, 72, 72, 0.4);
    border-radius: 30px;
   max-height: 750px;
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
       
   #search_result{
           background-image: url('./images/wallpaper.jpg');
           background-color:#333333;
    }
    #allusers {
           color:#fffcb2;
           font-weight: bold;
           font-size:40px;
           background-image: url('./images/title1.webp');
           border-radius: 30px;
           width: 250px;
           padding: 10px;
       }
</style>
<body class="home" >
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
                  <li><a href="message.php"><i class="fa fa-envelope" aria-hidden="true"></i><span class="hidden-xs hidden-sm">message</span></a></li>
                  <li><a href="statistics.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Statistics</span></a></li>
                  <li><a href="calender.php"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Calender</span></a></li>
                  <li class="active"><a href="users.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
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
               <h1 style="color:#afddff;font-weight: bold;font-size:40px">Users</h1>
               <hr id="hr_line">
               <?php if(isset($error)){ ?>
               <div style="font-weight:bold;
                  height:100px;
                  width:500;
                  border-radius: 25px;"
                  class="alert alert-warning" role="alert">
                  <?php echo $error;}?>
               </div>
               <div class="row">
                  <form method="GET" action="users.php">
                     <div class="container">
                           <div class="sales" style="background-image: url('./images/title1.png');">
                              <h2><input placeholder="search username" type="text" haspopup="true" id="exampleForm2" class="form-control" name="username" required></h2>
                             
                                 <button style="background-color:#0077c1;font-size:20px; float:right" type="submit" name="search" class="btn btn-primary">Search</button>
                              
                           </div>
                           <br><br>
                      </div>
                  </form>
                  
                  
                  <div class="container" id="scroll">
                    
                        <?php 
                    if(isset($_GET['search'])){
                        $username = mysqli_real_escape_string($db,$_GET['username']);
                    $sql = "SELECT * FROM users where username like '%$username%' order by id asc";
                    $res = $db->query($sql);
                    $count = 0;
                    while($row = @mysqli_fetch_array($res)){
                        $count++;
                        $username = mysqli_real_escape_string($db,$row['username']);
                        $email = mysqli_real_escape_string($db,$row['emailId']);
                        $mobile = mysqli_real_escape_string($db,$row['mobile']);
                        $address = mysqli_real_escape_string($db,$row['address']);
                        echo "<div class='sales' id='search_result'>";
                        echo "<h2>Username: $username</h2><br><br>";
                        echo "<h2>EMAIL-ID: $email</h2><br><br>";
                        echo "<h2>Mobile: $mobile</h2><br><br>";
                        echo "<h2>Address: $address</h2><br><br>";
                        echo "</div><br><br>";
                    }
                    }
                    ?>
                        </div>
                    </div>
                   <hr id="hr_line">
                   <center>
                   <h3 id="allusers">All users</h3>
                   </center>
                    <div class="container">
                    <div id="scroll">
                        <?php 

                    $sql = "SELECT * FROM users order by id desc";
                    $res = $db->query($sql);
                    $count = 0;

                    while($row = @mysqli_fetch_array($res)){
                        $count++;
                        $username = mysqli_real_escape_string($db,$row['username']);
                        $email = mysqli_real_escape_string($db,$row['emailId']);
                        $mobile = mysqli_real_escape_string($db,$row['mobile']);
                        $address = mysqli_real_escape_string($db,$row['address']);
                        echo "<br>";
                        echo "<div class='sales' >";
                        echo "<h2>Username: $username</h2><br><br>";
                        echo "<h2>EMAIL-ID: $email</h2><br><br>";
                        echo "<h2>Mobile: $mobile</h2><br><br>";
                        echo "<h2>Address: $address</h2><br><br>";
                        echo "</div><br><br>";
                    }

                    ?>
                        </div>
                    </div>
                  <br>
               </div>
            </div>
         </div>
      </div>
</body>