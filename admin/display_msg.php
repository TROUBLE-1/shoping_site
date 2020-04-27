<?php 

$sql = "SELECT * FROM contacts order by id desc";
$res = $db->query($sql);
$count = 0;

while($row = @mysqli_fetch_array($res)){
    $count++;
    $name = $row['name'];
    $email = $row['emailId'];
    $msg = $row['msg'];
    $date = $row['date'];
    echo "<div class='sales' >";
    echo "<h2>NAME: $name</h2>";
    echo "<h2 style='float:right'>$date</h2><br><br>";
    echo "<h2>EMAIL-ID: $email</h2><br><br>";
    echo "<h2>MESSAGE:</h2><br><br><br>";
    echo "<div style='padding:5px' class='bg-info'>";
    echo "<p style='font-size:24px'>$msg</p>";
    echo "</div>";
    echo "</div><br><br>";
    
}

?>