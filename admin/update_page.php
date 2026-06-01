<?php
if($_POST)
{
    require_once '../db_config.php';
    $sql = "UPDATE career SET job_title = ?, location = ?, job_type = ?, status = ?, no_of_positions = ?, working_days = ?, detail = ? WHERE id = ?;";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Query Preparation Failed: " . $conn->error);
    }
    $stmt->bind_param("sssiissi", $_POST['job'], $_POST['loc'], $_POST['j_t'], $_POST['stat'], $_POST['n-o-p'], $_POST['w-days'], $_POST['det'], $_GET['id']);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location:./Edit-page.php?id=".$_GET['id']);
    exit();
}
?>