<?php
require_once 'config/db_connect.php';

try {
    // Check database connection
    echo "<h2>Database Connection Test</h2>";
    if ($pdo) {
        echo "<p style='color: green;'>✓ Database connection successful</p>";
    } else {
        echo "<p style='color: red;'>✗ Database connection failed</p>";
        exit;
    }

    // Check if events table exists
    echo "<h2>Events Table Check</h2>";
    $checkTable = $pdo->query("SHOW TABLES LIKE 'events'");
    if ($checkTable->rowCount() > 0) {
        echo "<p style='color: green;'>✓ Events table exists</p>";
    } else {
        echo "<p style='color: red;'>✗ Events table does not exist</p>";
        exit;
    }

    // Check events in the table
    echo "<h2>Events in Database</h2>";
    $query = "SELECT id, title, event_date, status FROM events ORDER BY event_date DESC";
    $stmt = $pdo->query($query);
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($events) > 0) {
        echo "<p style='color: green;'>✓ Found " . count($events) . " events</p>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>ID</th><th>Title</th><th>Date</th><th>Status</th></tr>";
        foreach ($events as $event) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($event['id']) . "</td>";
            echo "<td>" . htmlspecialchars($event['title']) . "</td>";
            echo "<td>" . htmlspecialchars($event['event_date']) . "</td>";
            echo "<td>" . htmlspecialchars($event['status']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color: orange;'>⚠ No events found in the database</p>";
    }

    // Check approved events specifically
    echo "<h2>Approved Events</h2>";
    $query = "SELECT COUNT(*) as count FROM events WHERE status = 'approved'";
    $stmt = $pdo->query($query);
    $approvedCount = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

    if ($approvedCount > 0) {
        echo "<p style='color: green;'>✓ Found " . $approvedCount . " approved events</p>";
    } else {
        echo "<p style='color: red;'>✗ No approved events found</p>";
    }

} catch (PDOException $e) {
    echo "<p style='color: red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}
?> 