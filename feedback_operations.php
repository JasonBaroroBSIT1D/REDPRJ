<?php
// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'red_cross_council';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Handle different operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'get_feedbacks':
            getFeedbacks($conn);
            break;
        case 'get_feedback_details':
            getFeedbackDetails($conn);
            break;
        default:
            echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    }
}

function getFeedbacks($conn) {
    $sql = "SELECT id, submitter_name, department, service_type, rating, created_at 
            FROM feedback 
            ORDER BY created_at DESC";
    
    $result = $conn->query($sql);
    
    if ($result) {
        $feedbacks = [];
        while ($row = $result->fetch_assoc()) {
            $feedbacks[] = $row;
        }
        echo json_encode(['status' => 'success', 'data' => $feedbacks]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error fetching feedbacks: ' . $conn->error]);
    }
}

function getFeedbackDetails($conn) {
    if (!isset($_POST['id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Feedback ID is required']);
        return;
    }

    $id = $conn->real_escape_string($_POST['id']);
    $sql = "SELECT * FROM feedback WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        echo json_encode(['status' => 'success', 'data' => $row]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Feedback not found']);
    }
    
    $stmt->close();
}

$conn->close();
?> 