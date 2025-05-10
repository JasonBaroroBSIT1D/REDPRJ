<?php
require_once 'config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventId = $_POST['event_id'] ?? 0;
    $reportType = $_POST['report_type'] ?? 'summary';
    $format = $_POST['format'] ?? 'html';
    
    try {
        // Get event details
        $eventQuery = "SELECT * FROM events WHERE id = ?";
        $stmt = $pdo->prepare($eventQuery);
        $stmt->execute([$eventId]);
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$event) {
            throw new Exception("Event not found");
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
        
        if ($format === 'html') {
            // HTML Report
            header('Content-Type: text/html');
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Event Report - <?php echo htmlspecialchars($event['title']); ?></title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
                <link rel="stylesheet" href="styles.css">
            </head>
            <body>
                <aside id="sidebar">
                    <div class="sidebar-header">
                        <img src="Red Cross.jpg" alt="Red Cross Logo" class="logo">
                        <h3>RED CROSS</h3>
                        <p>USTP Council</p>
                    </div>
                    
                    <nav>
                        <a href="index.php">
                            <i class="bi bi-grid-1x2-fill"></i> Dashboard
                        </a>
                        <a href="event.php">
                            <i class="bi bi-calendar-event-fill"></i> Events
                        </a>
                        <a href="annoucement.php">
                            <i class="bi bi-megaphone-fill"></i> Announcement
                        </a>
                        <a href="records.php">
                            <i class="bi bi-card-checklist"></i> Records
                        </a>
                        <a href="member.php">
                            <i class="bi bi-people-fill"></i> Members
                        </a>
                        <a href="report.php" class="active">
                            <i class="bi bi-file-earmark-text-fill"></i> Reports
                        </a>
                        <a href="feedback.php">
                            <i class="bi bi-chat-square-text-fill"></i> View Feedbacks
                        </a>
                    </nav>
                    
                    <div class="user-profile">
                        <img src="Red Cross.jpg" alt="Admin User" class="user-avatar">
                        <h4>Admin User</h4>
                        <p>Administrator</p>
                        <a href="logout.php" class="logout-btn">
                            <i class="bi bi-box-arrow-right"></i> Log Out
                        </a>
                    </div>
                </aside>

                <section class="content-wrapper">
                    <header>
                        <button class="hamburger" id="toggleSidebar">
                            <i class="bi bi-list"></i>
                        </button>
                        <h2>Event Report</h2>
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="Red Cross.jpg" alt="Avatar" class="rounded-circle me-2" style="width:32px; height:32px;">
                                <span class="fw-bold">Administrator</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="profile.php">
                                        <i class="bi bi-person me-2"></i> Profile
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="logout.php">
                                        <i class="bi bi-box-arrow-right me-2"></i> Log Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </header>

                    <main>
                        <section class="welcome-banner">
                            <h1><?php echo htmlspecialchars($event['title']); ?></h1>
                        </section>

                        <div class="report-container">
                            <div class="event-details mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Event Information</h5>
                                        <p class="card-text">
                                            <strong>Date:</strong> <?php echo htmlspecialchars($event['event_date']); ?><br>
                                            <strong>Location:</strong> <?php echo htmlspecialchars($event['location']); ?><br>
                                            <strong>Time:</strong> <?php echo htmlspecialchars($event['start_time'] . ' - ' . $event['end_time']); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <div class="stat-card">
                                        <h5>Total Patients</h5>
                                        <div class="stat-value"><?php echo $totalPatients; ?></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="stat-card" style="border-left-color: #198754;">
                                        <h5>Departments</h5>
                                        <div class="stat-value"><?php echo count($departments); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stat-card">
                                        <h5>Department Breakdown</h5>
                                        <div class="stat-value">
                                            <?php foreach ($departments as $dept => $count): ?>
                                                <span class="badge bg-primary me-2"><?php echo htmlspecialchars($dept); ?>: <?php echo $count; ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="patient-records">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Patient Records</h5>
                                        <div class="btn-group">
                                            <button class="btn btn-outline-secondary" onclick="window.print()">
                                                <i class="bi bi-printer me-2"></i>Print
                                            </button>
                                            <button class="btn btn-outline-primary" onclick="exportToExcel()">
                                                <i class="bi bi-file-earmark-excel me-2"></i>Excel
                                            </button>
                                            <button class="btn btn-outline-danger" onclick="exportToPDF()">
                                                <i class="bi bi-file-pdf me-2"></i>PDF
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <?php foreach ($patients as $patient): ?>
                                            <div class="patient-card mb-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo htmlspecialchars($patient['patient_name']); ?></h5>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p class="mb-1">
                                                                    <strong>Student ID:</strong> <?php echo htmlspecialchars($patient['student_id']); ?>
                                                                </p>
                                                                <p class="mb-1">
                                                                    <strong>Department:</strong> <?php echo htmlspecialchars($patient['department']); ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p class="mb-1">
                                                                    <strong>Reason for Visit:</strong> <?php echo htmlspecialchars($patient['reason_visit']); ?>
                                                                </p>
                                                                <p class="mb-1">
                                                                    <strong>Treatment:</strong> <?php echo htmlspecialchars($patient['treatment']); ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <?php if ($patient['notes']): ?>
                                                            <div class="mt-2">
                                                                <strong>Notes:</strong>
                                                                <p class="mb-0"><?php echo htmlspecialchars($patient['notes']); ?></p>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>

                    <footer>
                        &copy; 2025 BSIT2A. All rights reserved.
                    </footer>
                </section>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                <script>
                    // Toggle sidebar
                    document.getElementById('toggleSidebar').addEventListener('click', function () {
                        document.getElementById('sidebar').classList.toggle('active');
                    });

                    function exportToExcel() {
                        // Implement Excel export
                        alert('Excel export functionality will be implemented');
                    }

                    function exportToPDF() {
                        // Implement PDF export
                        alert('PDF export functionality will be implemented');
                    }
                </script>
            </body>
            </html>
            <?php
        } else {
            // For other formats (PDF, Excel, CSV), return JSON data
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 'success',
                'event' => $event,
                'statistics' => [
                    'totalPatients' => $totalPatients,
                    'departmentBreakdown' => $departments
                ],
                'patients' => $patients
            ]);
        }
    } catch (Exception $e) {
        if ($format === 'html') {
            echo "<div class='alert alert-danger'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
        } else {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
} else {
    header('HTTP/1.1 405 Method Not Allowed');
    echo "Method not allowed";
}
?> 