<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Reports - Red Cross Council Dashboard</title>
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
      <a href="report.php"  class="active">
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
      <h2>Admin Reports</h2>
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
        <h1>EVENT REPORTS</h1>
      </section>
      
      <div class="report-container">
        <div class="filter-section">
          <h4>Generate Patient Summary Report</h4>
          <form id="reportForm" method="POST" action="generate_report.php">
            <div class="row g-3 align-items-end">
              <div class="col-md-4">
                <label for="eventSelect" class="form-label">Select Event</label>
                <select class="form-select" id="eventSelect" name="event_id" required>
                  <option value="">Select an Event</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="reportType" class="form-label">Report Type</label>
                <select class="form-select" id="reportType" name="report_type">
                  <option value="summary">Summary Report</option>
                  <option value="detailed">Detailed Report</option>
                  <option value="stats">Statistical Analysis</option>
                </select>
              </div>
              <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100" id="generateReport">
                  <i class="bi bi-file-earmark-text me-2"></i>Generate Report
                </button>
              </div>
            </div>
            <input type="hidden" name="format" id="reportFormat" value="html">
          </form>
        </div>
        
        <div id="reportOutput" class="mt-4 d-none">
          <h3 id="reportTitle" class="mb-4">Report Title</h3>
          
          <div class="row mb-4">
            <div class="col-md-3">
              <div class="stat-card">
                <h5>Total Patients</h5>
                <div class="stat-value" id="totalPatients">0</div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="stat-card" style="border-left-color: #198754;">
                <h5>Treatment Success</h5>
                <div class="stat-value" id="successRate" style="color: #198754;">0%</div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="stat-card" style="border-left-color: #dc3545;">
                <h5>Critical Cases</h5>
                <div class="stat-value" id="criticalCases" style="color: #dc3545;">0</div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="stat-card" style="border-left-color: #fd7e14;">
                <h5>Avg. Treatment Time</h5>
                <div class="stat-value" id="avgTime" style="color: #fd7e14;">0 min</div>
              </div>
            </div>
          </div>
          
          <div id="patientList">
            <!-- Patient summaries will be dynamically inserted here -->
          </div>
          
          <div class="report-actions mt-4">
            <button class="btn btn-outline-danger" onclick="generateReport('csv')">
              <i class="bi bi-file-earmark-text me-2"></i>Export as CSV
            </button>
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

    // Load events when page loads
    document.addEventListener('DOMContentLoaded', function() {
      loadEvents();
    });

    // Function to load events into dropdown
    function loadEvents() {
      // Show loading state
      const select = document.getElementById('eventSelect');
      select.innerHTML = '<option value="">Loading events...</option>';
      
      fetch('report_operations.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=get_events'
      })
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      })
      .then(events => {
        select.innerHTML = '<option value="">Select an Event</option>';
        
        if (Array.isArray(events)) {
          events.forEach(event => {
            const option = document.createElement('option');
            option.value = event.id;
            option.textContent = `${event.title} (${event.event_date})`;
            select.appendChild(option);
          });
        } else {
          console.error('Invalid events data:', events);
          select.innerHTML = '<option value="">Error loading events</option>';
        }
      })
      .catch(error => {
        console.error('Error:', error);
        select.innerHTML = '<option value="">Error loading events</option>';
      });
    }

    // Handle form submission
    document.getElementById('reportForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const eventId = document.getElementById('eventSelect').value;
      
      if (!eventId) {
        alert('Please select an event to generate a report');
        return;
      }
      
      this.submit();
    });

    function generateReport(format) {
      const eventId = document.getElementById('eventSelect').value;
      
      if (!eventId) {
        alert('Please select an event to generate a report');
        return;
      }
      // Only allow CSV and HTML
      if (format === 'csv') {
        // Implement CSV export logic here if needed
        alert('CSV export functionality will be implemented');
        return;
      } else {
        // For HTML format, use the existing form
        document.getElementById('reportFormat').value = format;
        document.getElementById('reportForm').submit();
      }
    }
  </script>
</body>
</html>