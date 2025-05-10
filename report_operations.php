<?php
require_once 'config/db_connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'get_events':
            getEvents();
            break;
        case 'get_event_report':
            getEventReport();
            break;
        default:
            echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    }
}

function getEvents() {
    global $pdo;
    
    try {
        // First, check if we can connect to the database
        if (!$pdo) {
            throw new Exception("Database connection failed");
        }

        // Check if the events table exists
        $checkTable = $pdo->query("SHOW TABLES LIKE 'events'");
        if ($checkTable->rowCount() === 0) {
            throw new Exception("Events table does not exist");
        }

        // Get events with error checking
        $query = "SELECT id, title, event_date FROM events WHERE status = 'approved' ORDER BY event_date DESC";
        $stmt = $pdo->query($query);
        
        if ($stmt === false) {
            throw new Exception("Query failed: " . implode(" ", $pdo->errorInfo()));
        }

        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($events === false) {
            throw new Exception("Failed to fetch events");
        }

        // Log the number of events found
        error_log("Found " . count($events) . " events");
        
        echo json_encode($events);
    } catch (Exception $e) {
        error_log("Error in getEvents: " . $e->getMessage());
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to load events: ' . $e->getMessage()
        ]);
    }
}

function getEventReport() {
    global $pdo;
    
    try {
        $eventId = $_POST['event_id'] ?? 0;
        $reportType = $_POST['report_type'] ?? 'summary';
        
        // Get event details
        $eventQuery = "SELECT * FROM events WHERE id = ?";
        $stmt = $pdo->prepare($eventQuery);
        $stmt->execute([$eventId]);
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$event) {
            echo json_encode(['status' => 'error', 'message' => 'Event not found']);
            return;
        }
        
        // Get patient records for this event date
        $patientsQuery = "SELECT 
            id,
            patient_name,
            student_id,
            department,
            reason_visit,
            treatment,
            notes,
            created_at
            FROM patient_records 
            WHERE visit_date = ?
            ORDER BY created_at DESC";
            
        $stmt = $pdo->prepare($patientsQuery);
        $stmt->execute([$event['event_date']]);
        $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Calculate statistics
        $totalPatients = count($patients);
        $departments = array_count_values(array_column($patients, 'department'));
        
        // Prepare the response
        $response = [
            'status' => 'success',
            'event' => [
                'id' => $event['id'],
                'title' => $event['title'],
                'event_date' => $event['event_date'],
                'location' => $event['location'],
                'start_time' => $event['start_time'],
                'end_time' => $event['end_time']
            ],
            'statistics' => [
                'totalPatients' => $totalPatients,
                'departmentBreakdown' => $departments
            ],
            'patients' => $patients
        ];
        
        echo json_encode($response);
    } catch (Exception $e) {
        error_log("Error in getEventReport: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
}
?> 