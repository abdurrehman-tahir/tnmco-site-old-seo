<?php
// Centralized Database and SMTP Mailer Configurations
// Note: This file is ignored by Git to prevent credentials exposure.

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'dev_tnm');
define('DB_PASSWORD', 'fQUQK@8kpV^r');
define('DB_NAME', 'db_tnm');

define('SMTP_HOST', 'tnmco.uk');
define('SMTP_USERNAME', 'test@tnmco.uk');
define('SMTP_PASSWORD', '1qa2ws3ed');
define('SMTP_PORT', 465);

// Create Connection (graceful error handling for local/dev envs where DB is offline)
try {
    mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);
    $conn = @new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) {
        $conn = null;
    } else {
        $conn->set_charset("utf8mb4");
    }
} catch (Exception $e) {
    $conn = null;
}

/**
 * Execute a secure prepared query with bound parameters
 * Useful helper function for standard SELECT queries
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
