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
$sql = "UPDATE career SET job_title = '".$_POST['job']."', location = '".$_POST['loc']."', job_type='".$_POST['j_t']."',status = ".$_POST['stat'].", no_of_positions = ".$_POST['n-o-p'].", working_days = '".$_POST['w-days']."', detail = '".$_POST['det']."' WHERE id = ".$_GET['id'].";";
$conn->query($sql);
header("Location:./Edit-page.php?id=".$_GET['id']);
$conn->close();
exit();
}
?>