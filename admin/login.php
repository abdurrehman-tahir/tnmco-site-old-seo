<?php
if($_POST)
{
$user = $_POST['user-name'];
$pass = $_POST['password'];
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
$sql = "SELECT user_name, password FROM user where user_name = '".$user."';";
$result = $conn->query($sql);
$row=mysqli_fetch_assoc($result);
if(!is_null($row)){
    if($row["password"] == md5($pass)){
        session_start();
        $_SESSION['username'] = $_POST['user-name'];
        header("Location:./DashBoard.php");
        $conn->close();
        exit();
    }
    else{
        session_start();
        $_SESSION['message'] = "pass_error";
        header("Location:./index.php");
        $conn->close();
        exit();
    }
}
else{
    session_start();
    $_SESSION['message'] = "user_error";
    header("Location:./index.php");
    $conn->close();
    exit();
}
}
?>