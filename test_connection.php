<?php
require_once 'config/database.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connection successful!<br>";
    
    // Test if table exists
    $result = $conn->query("SHOW TABLES LIKE 'members'");
    if ($result->num_rows > 0) {
        echo "Members table exists!<br>";
        
        // Count members
        $result = $conn->query("SELECT COUNT(*) as count FROM members");
        $row = $result->fetch_assoc();
        echo "Number of members in database: " . $row['count'];
    } else {
        echo "Members table does not exist!";
    }
}
?> 