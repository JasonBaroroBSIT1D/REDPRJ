<?php
require_once 'config/db_connect.php';
require_once 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventId = $_POST['event_id'] ?? 0;
    $format = $_POST['format'] ?? '';
    
    try {
        // Get event details
        $eventQuery = "SELECT * FROM events WHERE id = ?";
        $stmt = $pdo->prepare($eventQuery);
        $stmt->execute([$eventId]);
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$event) {
            throw new Exception("Event not found");
        }
        
        // Get patient records
        $patientsQuery = "SELECT * FROM patient_records WHERE visit_date = ? ORDER BY created_at DESC";
        $stmt = $pdo->prepare($patientsQuery);
        $stmt->execute([$event['event_date']]);
        $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // No PDF or Excel export logic here
        echo "Export functionality for this format is not available.";
        exit;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header('HTTP/1.1 405 Method Not Allowed');
    echo "Method not allowed";
}
?> 