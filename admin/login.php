<?php
if($_POST)
{
$user = $_POST['user-name'];
$pass = $_POST['password'];

require_once '../db_config.php';

$sql = "SELECT user_name, password FROM user where user_name = ?;";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Query Preparation Failed: " . $conn->error);
}
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

if(!is_null($row)){
    $password_matched = false;
    $needs_upgrade = false;

    // Check modern bcrypt first
    if (password_verify($pass, $row["password"])) {
        $password_matched = true;
    }
    // Fallback to legacy MD5 check
    else if ($row["password"] === md5($pass)) {
        $password_matched = true;
        $needs_upgrade = true;
    }

    if($password_matched){
        session_start();
        $_SESSION['username'] = $user;

        // Auto-upgrade legacy MD5 hash to Bcrypt
        if ($needs_upgrade) {
            $new_hash = password_hash($pass, PASSWORD_BCRYPT);
            $update_sql = "UPDATE user SET password = ? WHERE user_name = ?;";
            $update_stmt = $conn->prepare($update_sql);
            if ($update_stmt) {
                $update_stmt->bind_param("ss", $new_hash, $user);
                $update_stmt->execute();
                $update_stmt->close();
            }
        }

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