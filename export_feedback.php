<?php
require_once('config/db_connect.php');
require_once('fpdf/fpdf.php');

class PDF extends FPDF {
    // Table header
    function Header() {
        // Logo
        $this->Image('Red Cross.jpg', 10, 10, 30);
        
        // Title
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(30); // Move to the right of the logo
        $this->Cell(130, 10, 'RED CROSS COUNCIL', 0, 1, 'C');
        
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(30);
        $this->Cell(130, 10, 'Feedback Report', 0, 1, 'C');
        
        // Line break
        $this->Ln(10);
        
        // Table header
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(220, 220, 220); // Light gray background
        $this->Cell(15, 8, 'ID', 1, 0, 'C', true);
        $this->Cell(35, 8, 'Name', 1, 0, 'C', true);
        $this->Cell(30, 8, 'Department', 1, 0, 'C', true);
        $this->Cell(30, 8, 'Service', 1, 0, 'C', true);
        $this->Cell(15, 8, 'Rating', 1, 0, 'C', true);
        $this->Cell(25, 8, 'Date', 1, 0, 'C', true);
        $this->Cell(40, 8, 'Comments', 1, 1, 'C', true);
    }
    
    // Table footer
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . ' of {nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages(); // For page numbers
$pdf->AddPage();
$pdf->SetFont('Arial', '', 9);

try {
    $stmt = $pdo->query("SELECT id, submitter_name, department, service_type, rating, comments, created_at 
                         FROM feedback 
                         ORDER BY created_at DESC");
    $feedbacks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $fill = false; // For alternating row colors
    foreach ($feedbacks as $feedback) {
        // Alternate row colors
        $pdf->SetFillColor(245, 245, 245);
        $fill = !$fill;
        
        // Format the data
        $id = 'FB-'.str_pad($feedback['id'], 3, '0', STR_PAD_LEFT);
        $name = $feedback['submitter_name'];
        $department = $feedback['department'];
        $service = $feedback['service_type'];
        $rating = $feedback['rating'] . '/5'; // Changed rating format
        $date = date('Y-m-d', strtotime($feedback['created_at']));
        
        // Format comments to fit in the cell
        $comments = $feedback['comments'];
        if (strlen($comments) > 40) {
            $comments = substr($comments, 0, 37) . '...';
        }
        
        // Add cells with alternating colors
        $pdf->Cell(15, 8, $id, 1, 0, 'C', $fill);
        $pdf->Cell(35, 8, $name, 1, 0, 'L', $fill);
        $pdf->Cell(30, 8, $department, 1, 0, 'L', $fill);
        $pdf->Cell(30, 8, $service, 1, 0, 'L', $fill);
        $pdf->Cell(15, 8, $rating, 1, 0, 'C', $fill);
        $pdf->Cell(25, 8, $date, 1, 0, 'C', $fill);
        $pdf->Cell(40, 8, $comments, 1, 1, 'L', $fill);
    }
} catch (PDOException $e) {
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Error occurred while exporting data', 1, 1, 'C');
}

$pdf->Output('D', 'feedback_report_' . date('Y-m-d') . '.pdf');
exit;
?> 