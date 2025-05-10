<?php
require_once('../config/db_connect.php');

// Set header to return JSON response
header('Content-Type: application/json');

// Function to validate member data
function validateMemberData($data) {
    $errors = [];
    
    if (empty($data['name'])) {
        $errors[] = 'Name is required';
    }
    
    if (empty($data['student_id'])) {
        $errors[] = 'Student ID is required';
    } elseif (!preg_match('/^[A-Za-z0-9-]+$/', $data['student_id'])) {
        $errors[] = 'Student ID contains invalid characters';
    }
    
    if (empty($data['department'])) {
        $errors[] = 'Department is required';
    }
    
    if (empty($data['year_level'])) {
        $errors[] = 'Year Level is required';
    }
    
    if (empty($data['status'])) {
        $errors[] = 'Status is required';
    }
    
    return $errors;
}

// Handle different request methods
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            // Get a specific member
            $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
            if ($id === false) {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid ID format']);
                exit;
            }
            
            $stmt = $pdo->prepare("SELECT * FROM members WHERE id = ?");
            $stmt->execute([$id]);
            $member = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($member) {
                echo json_encode($member);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Member not found']);
            }
        } else {
            // Get all members
            $stmt = $pdo->query("SELECT * FROM members ORDER BY id DESC");
            $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($members);
        }
        break;
        
    case 'POST':
        // Create a new member
        $data = json_decode(file_get_contents('php://input'), true);
        
        if (!$data) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid JSON data']);
            exit;
        }
        
        // Validate data
        $errors = validateMemberData($data);
        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode(['error' => implode(', ', $errors)]);
            exit;
        }
        
        try {
            // Check if student ID already exists
            $stmt = $pdo->prepare("SELECT id FROM members WHERE student_id = ?");
            $stmt->execute([$data['student_id']]);
            if ($stmt->fetch()) {
                http_response_code(400);
                echo json_encode(['error' => 'Student ID already exists']);
                exit;
            }
            
            $stmt = $pdo->prepare("INSERT INTO members (name, student_id, department, year_level, status) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([
                $data['name'],
                $data['student_id'],
                $data['department'],
                $data['year_level'],
                $data['status']
            ]);
            
            $id = $pdo->lastInsertId();
            echo json_encode(['success' => true, 'id' => $id]);
        } catch (PDOException $e) {
            http_response_code(500);
            error_log("Database error: " . $e->getMessage());
            echo json_encode(['error' => 'An error occurred while saving the member']);
        }
        break;
        
    case 'PUT':
        // Update an existing member
        $data = json_decode(file_get_contents('php://input'), true);
        
        if (!$data || !isset($data['id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid data or missing ID']);
            exit;
        }
        
        // Validate data
        $errors = validateMemberData($data);
        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode(['error' => implode(', ', $errors)]);
            exit;
        }
        
        try {
            // Check if student ID exists for another member
            $stmt = $pdo->prepare("SELECT id FROM members WHERE student_id = ? AND id != ?");
            $stmt->execute([$data['student_id'], $data['id']]);
            if ($stmt->fetch()) {
                http_response_code(400);
                echo json_encode(['error' => 'Student ID already exists for another member']);
                exit;
            }
            
            $stmt = $pdo->prepare("UPDATE members SET name = ?, student_id = ?, department = ?, year_level = ?, status = ? WHERE id = ?");
            $stmt->execute([
                $data['name'],
                $data['student_id'],
                $data['department'],
                $data['year_level'],
                $data['status'],
                $data['id']
            ]);
            
            if ($stmt->rowCount() > 0) {
                echo json_encode(['success' => true]);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Member not found or no changes made']);
            }
        } catch (PDOException $e) {
            http_response_code(500);
            error_log("Database error: " . $e->getMessage());
            echo json_encode(['error' => 'An error occurred while updating the member']);
        }
        break;
        
    case 'DELETE':
        // Delete a member
        if (!isset($_GET['id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Missing ID']);
            exit;
        }
        
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        if ($id === false) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid ID format']);
            exit;
        }
        
        try {
            $stmt = $pdo->prepare("DELETE FROM members WHERE id = ?");
            $stmt->execute([$id]);
            
            if ($stmt->rowCount() > 0) {
                echo json_encode(['success' => true]);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Member not found']);
            }
        } catch (PDOException $e) {
            http_response_code(500);
            error_log("Database error: " . $e->getMessage());
            echo json_encode(['error' => 'An error occurred while deleting the member']);
        }
        break;
        
    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
}
?> 