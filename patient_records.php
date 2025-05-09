<?php
require_once 'config.php';

// Function to add a new patient
function addPatient($student_id, $full_name, $department) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("INSERT INTO patients (student_id, full_name, department) VALUES (?, ?, ?)");
        return $stmt->execute([$student_id, $full_name, $department]);
    } catch(PDOException $e) {
        return false;
    }
}

// Function to add a new patient record
function addPatientRecord($patient_id, $visit_date, $visit_time, $reason_for_visit, $treatment, $additional_notes = null) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("INSERT INTO patient_records (patient_id, visit_date, visit_time, reason_for_visit, treatment, additional_notes) 
                              VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$patient_id, $visit_date, $visit_time, $reason_for_visit, $treatment, $additional_notes]);
    } catch(PDOException $e) {
        return false;
    }
}

// Function to get all patient records
function getAllPatientRecords() {
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT pr.*, p.full_name, p.student_id, p.department 
                            FROM patient_records pr 
                            JOIN patients p ON pr.patient_id = p.id 
                            ORDER BY pr.visit_date DESC, pr.visit_time DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return [];
    }
}

// Function to get common issues
function getCommonIssues() {
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT * FROM common_issues ORDER BY issue_name");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return [];
    }
}

// Function to search patient records
function searchPatientRecords($search_term) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT pr.*, p.full_name, p.student_id, p.department 
                              FROM patient_records pr 
                              JOIN patients p ON pr.patient_id = p.id 
                              WHERE p.full_name LIKE ? OR p.student_id LIKE ? 
                              ORDER BY pr.visit_date DESC, pr.visit_time DESC");
        $search = "%$search_term%";
        $stmt->execute([$search, $search]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return [];
    }
}

// Function to get patient record by ID
function getPatientRecordById($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT pr.*, p.full_name, p.student_id, p.department 
                              FROM patient_records pr 
                              JOIN patients p ON pr.patient_id = p.id 
                              WHERE pr.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return null;
    }
}

// Function to update patient record
function updatePatientRecord($id, $reason_for_visit, $treatment, $additional_notes = null) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("UPDATE patient_records 
                              SET reason_for_visit = ?, treatment = ?, additional_notes = ? 
                              WHERE id = ?");
        return $stmt->execute([$reason_for_visit, $treatment, $additional_notes, $id]);
    } catch(PDOException $e) {
        return false;
    }
}

// Function to delete patient record
function deletePatientRecord($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("DELETE FROM patient_records WHERE id = ?");
        return $stmt->execute([$id]);
    } catch(PDOException $e) {
        return false;
    }
}
?> 