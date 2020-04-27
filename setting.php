<?php include("session.php");
   if(isset($_POST['change'])){
       $email = mysqli_real_escape_string($db,$_POST['email']);
       $username = mysqli_real_escape_string($db,$_POST['username']);
       $old_password = md5(mysqli_real_escape_string($db,$_POST['old_password']));
       $new_password = md5(mysqli_real_escape_string($db,$_POST['new_password']));
       
       $sql = "select * from admin where username='$username'";
       $result = mysqli_query($db, $sql);
       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
       $count = mysqli_num_rows($result);
       if ($count > 1 ){
           
           $error = "<h1 style='color:#ff0000;font-weight: bold;font-size:25px'>username already exists</h1>"; 
           
            
       }else{
   
       $sql = "update admin set emailId = '$email', username = '$username', password = '$new_password'  where password='$old_password'";
       $result = mysqli_query($db,$sql);
       $row = @mysqli_fetch_array($result,MYSQLI_ASSOC);
       $active = $row['active'];
       $count = @mysqli_num_rows($result);
       if($count > 1 ){
       $error = "<h1 style='color:#0093ff;font-weight: bold;font-size:20px'>Profile has been updated</h1>";
          // header('location: setting.php');
       }else{
           $error = "<h1 style='color:#ff0000;font-weight: bold;font-size:30px'>Old password didn't matched</h1>";
       }
       }    
   }
   
   if(isset($_POST['save'])){
       if(isset($_POST['sign_up'])){
           $allow_sign_up = mysqli_real_escape_string($db, $_POST['sign_up']);
       }else {
           $allow_sign_up = 'off';
       }
       $add_coupon = mysqli_real_escape_string($db, $_POST['coupon']);
       $upload_dir = mysqli_real_escape_string($db, $_POST['upload_dir']);
       $dir = '../tmp/'. $upload_dir;
       if(!is_dir($dir)){
           mkdir($dir,0777, true);
       }
       
       $sql = "update settings set sign_up = '$allow_sign_up', coupon = '$add_coupon', upload_dir='tmp/$upload_dir' where id=1";
       $result = mysqli_query($db, $sql);
       if($result){
           $error = "<h1 style='color:#0093ff;font-weight: bold;font-size:20px'>Settings have been updated</h1>";
       }
   }
   
   ?>
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
                  <li><a href="users.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
                  <li class="active"><a href="setting.php"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Setting</span></a></li>
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
               <h1 style="color:#afddff;font-weight: bold;font-size:40px">Settings</h1>
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
                  <form method="POST" action="setting.php">
                     <div class="col-md-5 col-sm-5 col-xs-12 gutter">
                        <div class="w-auto p-3" style="width:800px">
                           <div class="sales" >
                              <h2>email Address</h2>
                              <div class="btn-group">
                                 <input type="text" haspopup="true" id="exampleForm2" class="form-control" name="email" placeholder="email address"required>
                              </div>
                           </div>
                           <br><br>
                           <div class="sales" >
                              <h2>Username</h2>
                              <div class="btn-group">
                                 <input type="text" haspopup="true" id="exampleForm2" class="form-control" name="username" placeholder="username" required>
                              </div>
                           </div>
                           <br><br>
                           <div class="sales" >
                              <h2>Old Password</h2>
                              <div class="btn-group">
                                 <input type="text" haspopup="true"  class="form-control" name="old_password" placeholder="old password" required>
                              </div>
                           </div>
                           <br><br>
                           <div class="sales" >
                              <h2>New Password</h2>
                              <div class="btn-group">
                                 <input type="text" haspopup="true"  class="form-control" name="new_password" placeholder="new password" required>
                              </div>
                           </div>
                           <br><br>
                           <button style="width:auto;font-size:20px" type="submit" name="change" class="btn btn-primary">Save</button>
                           <br><br>
                        </div>
                     </div>
                  </form>
                  <br>
               </div>
               <!---------------->          
               <div class="row">
                  <form method="POST" action="setting.php">
                     <div class="col-md-10 col-sm-11 display-table-cell v-align">
                        <div class="w-auto p-3" style="width:800px">
                           <br>
                           <hr id="hr_line">
                           <br>
                           <div class="sales" >
                              <h2>Allow Sign up</h2>
                              <div class="btn-group btn-toggle">
                                 <!-- Default switch -->
                                 <input type="checkbox" id="switch" name="sign_up" /><label for="switch"></label>
                              </div>
                           </div>
                           <br><br>
                           <div class="sales" >
                              <h2>Add Coupon</h2>
                              <div class="btn-group">
                                 <input type="text" haspopup="true" class="form-control" name="coupon" placeholder="Coupon">
                              </div>
                           </div>
                           <br><br>
                           <div class="sales">
                              <h2>Upload directory</h2>
                              <div class="btn-group">
                                 <input type="text" haspopup="true"  class="form-control" name="upload_dir" placeholder="new directory" required>
                              </div>
                           </div>
                           <br><br>
                           <button style="width:auto;font-size:20px" type="submit" name="save" class="btn btn-primary">Save</button>
                           <br><br>
                           <br><br>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Modal -->
</body>
