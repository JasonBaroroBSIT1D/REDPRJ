<?php
require_once('../config/db_connect.php');
require_once('../fpdf/fpdf.php');

class PDF extends FPDF {
    // Table header
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Red Cross Council - Members Export', 0, 1, 'C');
        $this->Ln(2);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(15, 8, 'ID', 1);
        $this->Cell(45, 8, 'Name', 1);
        $this->Cell(35, 8, 'Student ID', 1);
        $this->Cell(35, 8, 'Department', 1);
        $this->Cell(25, 8, 'Year Level', 1);
        $this->Cell(25, 8, 'Status', 1);
        $this->Ln();
    }
    // Table footer
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

try {
    $stmt = $pdo->query("SELECT * FROM members ORDER BY id DESC");
    $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($members as $member) {
        $pdf->Cell(15, 8, $member['id'], 1);
        $pdf->Cell(45, 8, $member['name'], 1);
        $pdf->Cell(35, 8, $member['student_id'], 1);
        $pdf->Cell(35, 8, $member['department'], 1);
        $pdf->Cell(25, 8, $member['year_level'], 1);
        $pdf->Cell(25, 8, $member['status'], 1);
        $pdf->Ln();
    }
} catch (PDOException $e) {
    $pdf->Cell(0, 10, 'Error occurred while exporting data', 1, 1, 'C');
}

$pdf->Output('D', 'members_export_' . date('Y-m-d') . '.pdf');
exit;
?> 