<?php
if($_POST)
{
    $servername = "localhost";
    $username = "dev_tnm";
    $password = "fQUQK@8kpV^r";
    $dbname = "db_tnm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
}
if($_POST)
{

    $imageFileType = strtolower(pathinfo($_FILES["a_file"]["name"],PATHINFO_EXTENSION));
    $target_dir = "./assets/files/";
    $name= $_POST['a_name'].'.'.$imageFileType;
    $target_file = $target_dir .$name ;
    if ($_FILES["a_file"]["size"] > 2000000) {
        echo "<script>alert('Sorry, your file is too large.')</script>";
    }else {
    if (move_uploaded_file($_FILES["a_file"]["tmp_name"], $target_file)) {
        $sql = "insert into applicants (job_id,name,phone,email,cover_letter,cv) values (".$_POST['id'].",'".$_POST['a_name']."','".$_POST['a_phone']."','".$_POST['a_email']."','".$_POST['a_cover']."','".$name."');";
        $conn->query($sql);
        echo "The file ". htmlspecialchars( basename( $_FILES["a_file"]["name"])). " has been uploaded.";
    } else {
        echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
    }
    }
}
}
$conn->close();
header("Location: ./JobDetail.php?id=".$_POST['id']);
?>