<?php include('session.php')?>
<head>
   <meta charset="UTF-8">
   <title>Categories</title>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<?php include('header.php') ?>
<section class="jumbotron text-center">
   <div class="container">
      <h1 class="jumbotron-heading">CATEGORIES</h1>
   </div>
</section>
<div class="container">
   <div class="row">
      <div class="col">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Categories</li>
            </ol>
         </nav>
      </div>
   </div>
   <div class="col">
      <?php 
         $sql = "SELECT * FROM categories";
         $res = $db->query($sql); ?>
      <div class="panel panel-info">
         <div class="panel-heading">
            <h4 style="font-weight: 800;">Electronics</h4>
         </div>
         <div class="panel-body">  
            <?php 
               while($row = @mysqli_fetch_array($res)){
               $name = $row['electronics']; 
               echo "<img src='product-images/electronics/$name'>";
               }
               ?>
         </div>
      </div>
      <!-- lists for shpping-->      
      <div class="panel panel-warning">
         <div class="panel-heading">
            <h4 style="font-weight: 800;">TVs & Appliances</h4>
         </div>
         <div class="panel-body"> 
            <?php
               $sql = "SELECT * FROM categories";
               $res = $db->query($sql);
               while($row = @mysqli_fetch_array($res)){
                   $name = $row['tv_appliances'];
                   echo "<img src='product-images/TV_appliance/$name'>";
                }
               ?>
         </div>
      </div>
      <!-- lists for shpping-->      
      <div class="panel panel-info">
         <div class="panel-heading">
            <h4 style="font-weight: 800;">HOME & Furniture</h4>
         </div>
         <div class="panel-body"> 
            <?php 
               $sql = "SELECT * FROM categories";
               $res = $db->query($sql);
               while($row = @mysqli_fetch_array($res)){
                   $name = $row['home_furniture'];
                   echo "<img src='product-images/home_funiture/$name'>";
                }
               ?>
         </div>
      </div>
      <!-- lists for shpping-->      
      <div class="panel panel-warning">
         <div class="panel-heading">
            <h4 style="font-weight: 800;">Sports, books & more</h4>
         </div>
         <div class="panel-body">  
            <?php 
               $sql = "SELECT * FROM categories";
               $res = $db->query($sql);
               while($row = @mysqli_fetch_array($res)){
                   $name = $row['sports_more'];
                   echo "<img  src='product-images/sports/$name'>";
               }
               ?>
         </div>
      </div>
   </div>
</div>
<?php include('footer.php') ?>
