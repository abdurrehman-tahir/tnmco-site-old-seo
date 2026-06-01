<?php
// Centralized Database and SMTP Mailer Configurations Template
// Instructions: Copy this file as `db_config.php` and fill in the active credentials.

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'your_db_user');
define('DB_PASSWORD', 'your_db_password');
define('DB_NAME', 'your_db_name');

define('SMTP_HOST', 'mail.yourdomain.com');
define('SMTP_USERNAME', 'your_smtp_email');
define('SMTP_PASSWORD', 'your_smtp_password');
define('SMTP_PORT', 465);

// Create Connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check Connection
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

/**
 * Execute a secure prepared query with bound parameters
 */
function executeSecureQuery($conn, $sql, $types = "", $params = []) {
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Query Preparation Failed: " . $conn->error);
    }
    
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    
    if (!$stmt->execute()) {
        die("Execution Failed: " . $stmt->error);
    }
    
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}
?>
