<?php include('session.php');
   include('header.php');
   
   ?>
<body>
   <section class="jumbotron text-center">
      <div class="container">
         <h1 class="jumbotron-heading">HOME PAGE</h1>
      </div>
   </section>
   <center>
      <div id="offer" >
         <?php 
          
            $sql = "select * from offers";
            $res = $db->query($sql);
            $count = 0;
            while($row = mysqli_fetch_array($res)){
            $name = $row['product_name'];
            //echo "<img src='images/$name'>";
            echo "<img src='images/$name' width='1200px' height='530'>";
            echo '<br><br>';
            }
            ?>
      </div>
   </center>
</body>

<?php include('footer.php');
    
?>