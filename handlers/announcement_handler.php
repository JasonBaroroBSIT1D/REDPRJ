<?php
require_once '../config/db_connect.php';

// Add new announcement
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    try {
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $urgency = $_POST['urgency'];
        $expiry_date = $_POST['expiry_date'];
        
        if (empty($title) || empty($content)) {
            echo json_encode(['status' => 'error', 'message' => 'Title and content are required']);
            exit;
        }

        $stmt = $pdo->prepare("INSERT INTO announcements (title, content, urgency, expiry_date) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $content, $urgency, $expiry_date]);
        
        echo json_encode(['status' => 'success', 'message' => 'Announcement added successfully']);
    } catch(PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add announcement']);
    }
}

// Update announcement
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update') {
    try {
        $id = $_POST['id'];
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $urgency = $_POST['urgency'];
        $expiry_date = $_POST['expiry_date'];
        
        if (empty($title) || empty($content)) {
            echo json_encode(['status' => 'error', 'message' => 'Title and content are required']);
            exit;
        }

        $stmt = $pdo->prepare("UPDATE announcements SET title = ?, content = ?, urgency = ?, expiry_date = ? WHERE id = ?");
        $stmt->execute([$title, $content, $urgency, $expiry_date, $id]);
        
        echo json_encode(['status' => 'success', 'message' => 'Announcement updated successfully']);
    } catch(PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update announcement']);
    }
}

// Get all announcements
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'get_all') {
    try {
        $stmt = $pdo->query("SELECT * FROM announcements WHERE expiry_date >= CURDATE() OR expiry_date IS NULL ORDER BY 
            CASE urgency 
                WHEN 'high' THEN 1 
                WHEN 'medium' THEN 2 
                WHEN 'low' THEN 3 
            END, 
            created_at DESC");
        $announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(['status' => 'success', 'data' => $announcements]);
    } catch(PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to fetch announcements']);
    }
}

// Get single announcement
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'get_one') {
    try {
        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM announcements WHERE id = ?");
        $stmt->execute([$id]);
        $announcement = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(['status' => 'success', 'data' => $announcement]);
    } catch(PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to fetch announcement']);
    }
}

// Delete announcement
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    try {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM announcements WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(['status' => 'success', 'message' => 'Announcement deleted successfully']);
    } catch(PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete announcement']);
    }
}
?> 