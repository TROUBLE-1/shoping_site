 <?php include('session.php')?>
  <?php include('header.php') ?>
   <section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">CONTACT US</h1>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div style="padding:0px 0px 10px 10px" class="col">
            <div class="card" style="margin-bottom: 80px;">
                <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Contact us.
                </div>
                <div class="card-body">
                   <?php include('send_msg.php') ?>
                   <?php if(isset($status)){?>
                   <center>
                        <div style='width:300px' class='<?php if(isset($class)){echo $class;} ?>'>
                            <strong><?php if(isset($status)){echo $status;} ?></strong> <?php if(isset($status)){echo $statusmsg;} ?>
                        </div>
                    </center>
                    <?php } ?>
                    <form action="contact.php" method="POST" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name"id="name" aria-describedby="emailHelp" placeholder="Enter name"  required maxlength="50">
                        </div>
                        <!--
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div> -->
                        <div class="form-group">
                            <label>Add attachment</label>
                            <input class="btn btn-primary" type="file" name="file">    
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="msg" class="form-control" id="message" rows="6" required></textarea>
                        </div>
                        <div class="mx-auto">
                        <button type="submit" name="submit" class="btn btn-primary text-right">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                <div class="card-body">
                    <p>3 rue des Champs Elysées</p>
                    <p>75008 PARIS</p>
                    <p>France</p>
                    <p>Email : email@example.com</p>
                    <p>Tel. +33 12 56 11 51 84</p>

                </div>

            </div>
        </div>
    </div>
</div>
 <?php include('footer.php') ?>
