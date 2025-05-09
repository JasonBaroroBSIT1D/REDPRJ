<?php
require_once 'config/db_connect.php';

// Check if ID is provided
if (!isset($_GET['id'])) {
    header('Location: records.php');
    exit;
}

$id = $_GET['id'];

// Handle form submission for update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_record') {
    $stmt = $pdo->prepare("UPDATE patient_records SET 
        patient_name = ?, 
        student_id = ?, 
        visit_date = ?, 
        department = ?, 
        reason_visit = ?, 
        treatment = ?, 
        notes = ? 
        WHERE id = ?");
    
    $stmt->execute([
        $_POST['patientName'],
        $_POST['studentId'],
        $_POST['visitDate'],
        $_POST['department'],
        $_POST['reasonVisit'],
        $_POST['treatment'],
        $_POST['notes'],
        $id
    ]);
    
    header('Location: records.php');
    exit;
}

// Fetch the record
$stmt = $pdo->prepare("SELECT * FROM patient_records WHERE id = ?");
$stmt->execute([$id]);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

// If record not found, redirect to records page
if (!$record) {
    header('Location: records.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Record - Red Cross Council</title>
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
        <a href="records.php" class="active">
            <i class="bi bi-card-checklist"></i> Records
        </a>
        <a href="member.php">
            <i class="bi bi-people-fill"></i> Members
        </a>
        <a href="report.php">
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
        <h2>View Patient Record</h2>
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
        <div class="container mt-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Patient Record Details</h3>
                    <a href="records.php" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Back to Records
                    </a>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <input type="hidden" name="action" value="update_record">
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="patientName" class="form-label">Patient Name</label>
                                <input type="text" class="form-control" id="patientName" name="patientName" 
                                    value="<?php echo htmlspecialchars($record['patient_name']); ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="studentId" class="form-label">Student ID</label>
                                <input type="text" class="form-control" id="studentId" name="studentId" 
                                    value="<?php echo htmlspecialchars($record['student_id']); ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="visitDate" class="form-label">Visit Date</label>
                                <input type="date" class="form-control" id="visitDate" name="visitDate" 
                                    value="<?php echo htmlspecialchars($record['visit_date']); ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="department" class="form-label">Department</label>
                                <select class="form-select" id="department" name="department" required>
                                    <option value="BSIT" <?php echo $record['department'] === 'BSIT' ? 'selected' : ''; ?>>BSIT</option>
                                    <option value="BTLED-IA" <?php echo $record['department'] === 'BTLED-IA' ? 'selected' : ''; ?>>BTLED-IA</option>
                                    <option value="BTLED-HE" <?php echo $record['department'] === 'BTLED-HE' ? 'selected' : ''; ?>>BTLED-HE</option>
                                    <option value="BTLED-ICT" <?php echo $record['department'] === 'BTLED-ICT' ? 'selected' : ''; ?>>BTLED-ICT</option>
                                    <option value="BFPT" <?php echo $record['department'] === 'BFPT' ? 'selected' : ''; ?>>BFPT</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="reasonVisit" class="form-label">Reason for Visit</label>
                            <input type="text" class="form-control" id="reasonVisit" name="reasonVisit" 
                                value="<?php echo htmlspecialchars($record['reason_visit']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="treatment" class="form-label">Treatment</label>
                            <textarea class="form-control" id="treatment" name="treatment" rows="3" required><?php echo htmlspecialchars($record['treatment']); ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="notes" class="form-label">Additional Notes</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3"><?php echo htmlspecialchars($record['notes']); ?></textarea>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="records.php" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-danger">Update Record</button>
                        </div>
                    </form>
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
    document.getElementById('toggleSidebar').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('active');
    });
</script>
</body>
</html> 