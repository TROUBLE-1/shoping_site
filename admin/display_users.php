<?php 

$sql = "SELECT * FROM users order by id desc";
$res = $db->query($sql);
$count = 0;

while($row = @mysqli_fetch_array($res)){
    $count++;
    $username = $row['username'];
    $email = $row['emailId'];
    $mobile = $row['mobile'];
    $address = $row['address'];
    echo "<div class='sales' >";
    echo "<h2>Username: $username</h2><br><br>";
    echo "<h2>EMAIL-ID: $email</h2><br><br>";
    echo "<h2>Mobile: $mobile</h2><br><br>";
    echo "<h2>Address: $address</h2><br><br>";
    echo "</div><br><br>";
}

?>