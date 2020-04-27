<?php 
   include('session.php')
   ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="application/javascript">
   $(document).ready(function(){
      $('[data-toggle="offcanvas"]').click(function(){
          $("#navigation").toggleClass("hidden-xs");
      });
   });
   
</script>
<!------ Include the above in your HEAD tag ---------->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/main.css">
<body class="home" style="background-image: url('./images/wallpaper1.jpg');">
   <div class="container-fluid display-table" >
      <div class="row display-table-row">
         <?php include('side_bar.php') ?>
         <div class="col-md-10 col-sm-11 display-table-cell v-align">
            <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
            <div class="row">
               <header style="background-image: url('./images/wallpaper.jpg');">
                  <?php include('header.php') ?>
               </header>
            </div>
            <div class="user-dashboard" >
               <h1 style="color:#afddff;font-weight: bold;font-size:40px">Hello, <?php echo $_SESSION['login_user']?></h1>
               <div class="row">
                  <div class="col-md-5 col-sm-5 col-xs-12 gutter">
                     <div class="sales">
                        <h2>Your Sale</h2>
                        <div class="btn-group">
                           <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span>Period:</span> Last Year
                           </button>
                           <div class="dropdown-menu">
                              <a href="#">2012</a>
                              <a href="#">2014</a>
                              <a href="#">2015</a>
                              <a href="#">2016</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-7 col-sm-7 col-xs-12 gutter">
                     <div class="sales report">
                        <h2>Report</h2>
                        <div class="btn-group">
                           <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span>Period:</span> Last Year
                           </button>
                           <div class="dropdown-menu">
                              <a href="#">2012</a>
                              <a href="#">2014</a>
                              <a href="#">2015</a>
                              <a href="#">2016</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>