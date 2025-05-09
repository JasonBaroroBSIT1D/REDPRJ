<?php
require_once 'config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add':
                $title = $_POST['title'];
                $event_date = $_POST['event_date'];
                $start_time = $_POST['start_time'];
                $end_time = $_POST['end_time'];
                $location = $_POST['location'];
                $description = $_POST['description'];
                
                $sql = "INSERT INTO events (title, event_date, start_time, end_time, location, description) 
                        VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                
                try {
                    $stmt->execute([$title, $event_date, $start_time, $end_time, $location, $description]);
                    echo json_encode(['status' => 'success', 'message' => 'Event added successfully']);
                } catch(PDOException $e) {
                    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
                }
                break;

            case 'get_event':
                $id = $_POST['id'];
                $sql = "SELECT * FROM events WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                try {
                    $stmt->execute([$id]);
                    $event = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo json_encode(['status' => 'success', 'data' => $event]);
                } catch(PDOException $e) {
                    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
                }
                break;
                
            case 'get_events':
                $sql = "SELECT * FROM events ORDER BY event_date DESC";
                $stmt = $pdo->query($sql);
                $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($events);
                break;

            case 'update':
                $id = $_POST['id'];
                $title = $_POST['title'];
                $event_date = $_POST['event_date'];
                $start_time = $_POST['start_time'];
                $end_time = $_POST['end_time'];
                $location = $_POST['location'];
                $description = $_POST['description'];
                $status = $_POST['status'];
                
                $sql = "UPDATE events SET 
                        title = ?, 
                        event_date = ?, 
                        start_time = ?, 
                        end_time = ?, 
                        location = ?, 
                        description = ?,
                        status = ?
                        WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                
                try {
                    $stmt->execute([$title, $event_date, $start_time, $end_time, $location, $description, $status, $id]);
                    echo json_encode(['status' => 'success', 'message' => 'Event updated successfully']);
                } catch(PDOException $e) {
                    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
                }
                break;

            case 'delete':
                $id = $_POST['id'];
                $sql = "DELETE FROM events WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                
                try {
                    $stmt->execute([$id]);
                    echo json_encode(['status' => 'success', 'message' => 'Event deleted successfully']);
                } catch(PDOException $e) {
                    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
                }
                break;
        }
    }
}
?> 