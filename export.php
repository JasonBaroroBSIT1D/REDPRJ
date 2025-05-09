<?php
require_once 'config/db_connect.php';
require('fpdf/fpdf.php');

// Fetch all records
$stmt = $pdo->query("SELECT * FROM patient_records ORDER BY visit_date DESC");
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get export format from URL parameter
$format = isset($_GET['format']) ? $_GET['format'] : 'csv';

if ($format === 'csv') {
    // Set headers for CSV download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="patient_records_' . date('Y-m-d') . '.csv"');
    
    // Create file pointer for output
    $output = fopen('php://output', 'w');
    
    // Add UTF-8 BOM for proper Excel encoding
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
    
    // Add CSV headers
    fputcsv($output, [
        'ID',
        'Patient Name',
        'Student ID',
        'Visit Date',
        'Department',
        'Reason for Visit',
        'Treatment',
        'Notes',
        'Created At'
    ]);
    
    // Add data rows
    foreach ($records as $record) {
        fputcsv($output, [
            $record['id'],
            $record['patient_name'],
            $record['student_id'],
            $record['visit_date'],
            $record['department'],
            $record['reason_visit'],
            $record['treatment'],
            $record['notes'],
            $record['created_at']
        ]);
    }
    
    fclose($output);
} elseif ($format === 'pdf') {
    // Create new PDF document
    $pdf = new FPDF();
    $pdf->AddPage();
    
    // Set font
    $pdf->SetFont('Arial', 'B', 16);
    
    // Title
    $pdf->Cell(0, 10, 'Red Cross Council - Patient Records', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 10, 'Generated on: ' . date('Y-m-d H:i:s'), 0, 1, 'C');
    $pdf->Ln(10);
    
    // Table header
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(10, 7, 'ID', 1);
    $pdf->Cell(40, 7, 'Patient Name', 1);
    $pdf->Cell(25, 7, 'Student ID', 1);
    $pdf->Cell(25, 7, 'Visit Date', 1);
    $pdf->Cell(30, 7, 'Department', 1);
    $pdf->Cell(30, 7, 'Reason', 1);
    $pdf->Cell(30, 7, 'Treatment', 1);
    $pdf->Ln();
    
    // Table data
    $pdf->SetFont('Arial', '', 9);
    foreach ($records as $record) {
        // Check if we need a new page
        if ($pdf->GetY() > 250) {
            $pdf->AddPage();
            // Repeat header
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(10, 7, 'ID', 1);
            $pdf->Cell(40, 7, 'Patient Name', 1);
            $pdf->Cell(25, 7, 'Student ID', 1);
            $pdf->Cell(25, 7, 'Visit Date', 1);
            $pdf->Cell(30, 7, 'Department', 1);
            $pdf->Cell(30, 7, 'Reason', 1);
            $pdf->Cell(30, 7, 'Treatment', 1);
            $pdf->Ln();
            $pdf->SetFont('Arial', '', 9);
        }
        
        $pdf->Cell(10, 6, $record['id'], 1);
        $pdf->Cell(40, 6, $record['patient_name'], 1);
        $pdf->Cell(25, 6, $record['student_id'], 1);
        $pdf->Cell(25, 6, $record['visit_date'], 1);
        $pdf->Cell(30, 6, $record['department'], 1);
        $pdf->Cell(30, 6, $record['reason_visit'], 1);
        $pdf->Cell(30, 6, $record['treatment'], 1);
        $pdf->Ln();
    }
    
    // Footer
    $pdf->SetY(-15);
    $pdf->SetFont('Arial', 'I', 8);
    $pdf->Cell(0, 10, '© 2025 Red Cross Council - USTP. All rights reserved.', 0, 0, 'C');
    
    // Output PDF
    $pdf->Output('D', 'patient_records_' . date('Y-m-d') . '.pdf');
} else {
    // Invalid format
    header('Location: records.php');
    exit;
} 