<?php include('session.php');
   if(isset($_POST['cart'])){
   $username = mysqli_real_escape_string($db, $_SESSION['login_user']);
   $product_name = mysqli_real_escape_string($db, $_POST['product_name']);
   $image = mysqli_real_escape_string($db, $_POST['image']);
   $price = mysqli_real_escape_string($db, $_POST['price']);
   
   $sql = "select product_name from cart where username='$username' and product_name = '$product_name'" ;
   
   $res = $db->query($sql);
   $row = @mysqli_fetch_array($res);
   
       if($row['product_name'] !== $product_name){
   $sql = "insert into cart(username, product_name, image, price) values ('$username', '$product_name', '$image', '$price')";
       $res = $db->query($sql);
   }
   }
   include('header.php');
   ?>
<link href="./css/style.css" rel="stylesheet" >
<body>
   <section class="jumbotron text-center">
      <div class="container">
         <h1 class="jumbotron-heading">Product</h1>
      </div>
   </section>
   <div class="container">
      <div class="row">
         <div class="col">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Product</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row">
         <div class="col">
            <!-- lists for shpping-->  
            <?php  
               $sql = "select * from products";
               $res = $db->query($sql);
               while($row = @mysqli_fetch_array($res)){
                   $name = $row['product_name'];
                   $price = $row['price'];
                   $image = $row['image'];
                   ?>
            <div class="panel panel-info">
               <div class="panel-heading">
                  <h4><?php echo $name; ?></h4>
               </div>
               <div class="panel-body">
                  <span style="font-weight: bold;">Price: </span>
                  <span style="font-weight: normal;">₹<?php echo $price; ?></span>
                  <div id="add_to_cart">
                     <form method="POST" action="product.php">
                        <input type="hidden" value='<?php echo $price; ?>' name='price'>
                        <input type="hidden" value='<?php echo $name; ?>' name='product_name'>
                        <input type="hidden" value='<?php echo $image; ?>' name='image'>
                        <button type="submit" class="btn btn-primary" name="cart">Add to cart</button>
                     </form>
                  </div>
               </div>
               <img src="product-images/products/<?php echo $image;?>">
            </div>
            <?php } ?>    
         </div>
      </div>
   </div>
</body>
<?php include('footer.php')?>