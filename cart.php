<?php
   include ('session.php');
   
   $user = $_SESSION['login_user'];
   if (isset($_REQUEST['remove']))
   {
       $product_name = mysqli_real_escape_string($db, $_REQUEST['remove']);
   
       $sql = "delete from cart where product_name='$product_name'";
   
       if ($db->query($sql))
       {
           $msg = $product_name . ' has been removed';
       }
   }
   include ('header.php');
   ?>
<section class="jumbotron text-center">
   <div class="container">
      <h1 class="jumbotron-heading">CART</h1>
   </div>
</section>
<div class="container">
   <div class="row">
      <div class="col">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
         </nav>
         <?php
            if (isset($msg))
            {
                echo '<div class="alert alert-warning">';
                echo '<strong>Success!</strong>' . $msg;
                echo '</div>';
            }
            ?>
      </div>
   </div>
</div>
<div class="container" style="margin-bottom: 250px;">
   <div class="row">
      <div class="col">
         <!-- lists for shpping-->  
         <?php
            $sql = "select * from cart where username='$user'";
            $res = $db->query($sql);
            
            while ($row = mysqli_fetch_array($res))
            {
                if ($row < 1)
                {
                    break;
                }
            
            ?>
         <div class="panel panel-info">
            <div class="panel-heading">
               <h4><?php
                  echo $row['product_name'];
                  ?></h4>
            </div>
            <div class="panel-body">
               <span style="font-weight: bold;">Price: </span>
               <span style="font-weight: normal;">
               <?php
                  echo '₹' . $row['price'];
                  ?></span>
               <div id="add_to_cart">
                  <form method="post" action="cart.php">
                     <button type="submit" class="btn btn-danger" name="remove" value="<?php
                        echo $row['product_name'];
                        ?>">Remove</button>
                  </form>
               </div>
            </div>
            <img  src="product-images/products/<?php
               echo $row['image'];
               ?>">
         </div>
         <?php
            }
            echo $row['username'];
            ?>
         <div class="panel panel-success">
            <div class="panel-heading">
               <h4 style="font-weight: bold;">Total purchase</h4>
            </div>
            <div class="panel-body">
               <span style="font-weight: bold;">Price: </span>
               <span style="font-weight: normal;">
               <?php
                  $sql = "select * from cart where username='$user'";
                  $res = $db->query($sql);
                  while ($row = mysqli_fetch_array($res))
                  {
                      echo '₹' . $row['price'] . ' ';
                  }
                  ?>
               </span>
               <span style="font-weight: bold;"> = 
               <?php
                  $sql = "select sum(price) from cart where username='$user'";
                  $res = $db->query($sql);
                  $row = mysqli_fetch_array($res);
                  echo '₹' . $row['sum(price)'];
                  ?>
               </span>
               <p><span style="font-weight: bold;">Items: </span>
                  <span style="font-weight: normal;">
                  <?php
                     $sql = "select product_name from cart where username='$user'";
                     $res = $db->query($sql);
                     while ($row = mysqli_fetch_array($res))
                     {
                         echo '[' . $row['product_name'] . ']  ';
                         echo ' ';
                     }
                     ?> 
                  </span>
               <p>
               <div style="float:left">
                  <button type="submit" class="btn btn-primary">Buy now</button>
               </div>
            </div>
            <?php
               ?>
         </div>
      </div>
   </div>
</div>
<?php
   include ('footer.php');
   ?>