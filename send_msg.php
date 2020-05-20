<?php
if (($_SESSION['login_user']) == false) {
    header('location: index.php');
}
?>
<?php
//include('config.php');
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    
    
    $msg = preg_replace('/[!@#$%^&*(),.?":{}|<>]/',"",$_POST['msg']);
    $msg  = mysqli_real_escape_string($db, $msg);
    $date    = date('d/m/Y h:i A');
    $emailId = $_SESSION['email_id'];
    $sql     = "insert into contacts(name, emailId, msg, date) values ('$name', '$emailId', '$msg', '$date')";
        if (isset($_FILES["file"]["name"])) {


            $notAllowed = array(
                'php',
                'php1',
                'php2',
                'php3',
                'php4',
                'php5',
                'php6',
                'php7',
                'pht',
                'exe',
                'html',
                'cgi',
                'asp',
                'gif',
                'jpeg',
                'png',
                'vb',
                'inf'
            );

            $splitFileName = explode(".", $_FILES["file"]["name"]);
            $fileExtension = end($splitFileName);

            if (in_array($fileExtension, $notAllowed)) {
                $status    = "Upload error!";
                $statusmsg = "Format not excepted";
                $class     = "alert alert-danger";
            } else {
                $filenameOriginal = urldecode($_FILES["file"]["name"]);
                $filenameOriginal = preg_replace("/^[\/.]+/","",$filenameOriginal);
                $filenameOriginal = str_replace("../","",$filenameOriginal);
                $sql = "SELECT * FROM settings";
                $res = $db->query($sql);
                $row = @mysqli_fetch_array($res);
                $dir = $row['upload_dir'];
                
                $file_upload = move_uploaded_file($_FILES["file"]["tmp_name"], "$dir/" . $filenameOriginal);
                $file = mysqli_real_escape_string($db, $_FILES["file"]["name"]);
                $sql  = "insert into contacts(name, emailId, msg, date, file) values ('$name', '$emailId', '$msg', '$date', '$file')";
                if ($db->query($sql) == TRUE) {
                    $status    = "Success! ";
                    $statusmsg = "Message sent.";
                    $class     = "alert alert-success";
                } else 
                {
                    $status    = "Error: Somthing went wrong";
                    $statusmsg = $db->error;
                    $class     = "alert alert-danger";
                }
            }
        } else {
            $sql = "insert into contacts(name, emailId, msg, date) values ('$name', '$emailId', '$msg', '$date')";
            if ($db->query($sql) === TRUE) {
                $status    = "Success! ";
                $statusmsg = "Message sent.";
                $class     = "alert alert-success";
            } else {
                $status    = "Error: " . $sql;
                $statusmsg = $db->error;
                $class     = "alert alert-danger";
            }
        }
}

?>
