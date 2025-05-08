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
<aside id= "sidebar">
      <img src="Red Cross.jpg" alt="Red Cross Logo">
    <nav>
      <a href="index.php">Dashboard</a>
      <a href="event.php">Events</a>
      <a href="annoucement.php">Announcement</a>
      <a href="records.php">Records</a>
      <a href="member.php">Members</a>
      <a href="report.php" class="active">Reports</a>
      <a href="feedback.php">View Feedbacks</a>
    </nav>
  </aside>

  <section class="content-wrapper">
  <header style="display: flex; justify-content: flex-end; align-items: center; padding: 10px;">
  <button class="hamburger" id="toggleSidebar"><i class="bi bi-list"></i></button>
  <a href="logout.php" class="text-white text-decoration-none fw-bold" style="color: red;">
    <i class="bi bi-box-arrow-left" style="font-size: 1.5rem;"></i> 
  </a>
</header>
    
    <main>
      <section class="welcome-banner">
        <h1>EVENT REPORTS</h1>
      </section>
      
      <div class="report-container">
        <div class="filter-section">
          <h4>Generate Patient Summary Report</h4>
          <div class="row g-3 align-items-end">
            <div class="col-md-4">
              <label for="eventSelect" class="form-label">Select Event</label>
              <select class="form-select" id="eventSelect">
                <option value="" selected disabled>Choose an event...</option>
                <option value="1">Blood Donation Drive - April 15, 2025</option>
                <option value="2">First Aid Training - April 21, 2025</option>
                <option value="3">COVID-19 Vaccination - April 27, 2025</option>
                <option value="4">Emergency Response Drill - May 2, 2025</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="reportType" class="form-label">Report Type</label>
              <select class="form-select" id="reportType">
                <option value="summary" selected>General Summary</option>
                <option value="detailed">Detailed Patient List</option>
                <option value="stats">Statistical Analysis</option>
              </select>
            </div>
            <div class="col-md-4">
              <button class="btn btn-primary w-100" id="generateReport">
                <i class="bi bi-file-earmark-text me-2"></i>Generate Report
              </button>
            </div>
          </div>
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
          
          <div class="report-actions">
            <button class="btn btn-outline-secondary">
              <i class="bi bi-printer me-2"></i>Print
            </button>
            <button class="btn btn-outline-primary">
              <i class="bi bi-file-earmark-excel me-2"></i>Export to Excel
            </button>
            <button class="btn btn-outline-danger">
              <i class="bi bi-file-earmark-pdf me-2"></i>Export to PDF
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
    // Sample data - in a real application, this would come from a database
    const eventData = {
      1: {
        name: "Blood Donation Drive - April 15, 2025",
        location: "Main Campus Hall",
        patients: [
          { id: 101, name: "John Smith", age: 22, gender: "Male", bloodType: "O+", condition: "Normal", treatment: "Blood Donation (450ml)", status: "Completed", time: 25 },
          { id: 102, name: "Maria Garcia", age: 19, gender: "Female", bloodType: "A-", condition: "Slight dizziness", treatment: "Blood Donation (350ml), Rest and Hydration", status: "Completed", time: 45 },
          { id: 103, name: "David Chen", age: 21, gender: "Male", bloodType: "B+", condition: "Normal", treatment: "Blood Donation (450ml)", status: "Completed", time: 30 },
          { id: 104, name: "Sarah Johnson", age: 20, gender: "Female", bloodType: "AB+", condition: "Low blood pressure", treatment: "Attempted donation, Provided rest and fluids", status: "Deferred", time: 20 },
          { id: 105, name: "Robert Lee", age: 23, gender: "Male", bloodType: "O-", condition: "Normal", treatment: "Blood Donation (450ml)", status: "Completed", time: 25 }
        ]
      },
      2: {
        name: "First Aid Training - April 21, 2025",
        location: "Sports Complex",
        patients: [
          { id: 201, name: "Emily Wilson", age: 19, gender: "Female", condition: "Sprained ankle (simulation)", treatment: "RICE demonstration", status: "Training Complete", time: 15 },
          { id: 202, name: "Michael Brown", age: 20, gender: "Male", condition: "Cut wound (simulation)", treatment: "Wound cleaning and dressing demo", status: "Training Complete", time: 10 },
          { id: 203, name: "Sophia Martinez", age: 21, gender: "Female", condition: "Actual minor cut during training", treatment: "Wound cleaning, antiseptic, bandage", status: "Treated", time: 15 },
          { id: 204, name: "Daniel Kim", age: 22, gender: "Male", condition: "CPR training", treatment: "CPR demonstration on mannequin", status: "Training Complete", time: 30 },
          { id: 205, name: "Olivia Taylor", age: 19, gender: "Female", condition: "Burn simulation", treatment: "Burn treatment demonstration", status: "Training Complete", time: 20 },
          { id: 206, name: "James Wilson", age: 20, gender: "Male", condition: "Dehydration (real)", treatment: "Oral rehydration, rest", status: "Treated", time: 25 }
        ]
      },
      3: {
        name: "COVID-19 Vaccination - April 27, 2025",
        location: "Medical Center",
        patients: [
          { id: 301, name: "Emma Davis", age: 19, gender: "Female", condition: "Normal", treatment: "COVID-19 Booster Shot", status: "Completed", time: 15 },
          { id: 302, name: "Lucas Garcia", age: 21, gender: "Male", condition: "Mild anxiety", treatment: "COVID-19 Booster Shot, Counseling", status: "Completed", time: 25 },
          { id: 303, name: "Ava Robinson", age: 20, gender: "Female", condition: "Normal", treatment: "COVID-19 Booster Shot", status: "Completed", time: 15 },
          { id: 304, name: "Noah Martinez", age: 22, gender: "Male", condition: "Normal", treatment: "COVID-19 Booster Shot", status: "Completed", time: 15 },
          { id: 305, name: "Isabella Johnson", age: 19, gender: "Female", condition: "Minor allergic reaction", treatment: "COVID-19 Booster Shot, Antihistamine", status: "Monitored", time: 45 },
          { id: 306, name: "William Thompson", age: 23, gender: "Male", condition: "Normal", treatment: "COVID-19 Booster Shot", status: "Completed", time: 15 },
          { id: 307, name: "Mia Anderson", age: 20, gender: "Female", condition: "Fever post-vaccination", treatment: "COVID-19 Booster Shot, Paracetamol", status: "Monitored", time: 30 }
        ]
      },
      4: {
        name: "Emergency Response Drill - May 2, 2025",
        location: "Campus Grounds",
        patients: [
          { id: 401, name: "Ethan Williams", age: 21, gender: "Male", condition: "Simulated fracture", treatment: "Splinting demonstration", status: "Drill Complete", time: 20 },
          { id: 402, name: "Charlotte Brown", age: 19, gender: "Female", condition: "Simulated shock", treatment: "Position and comfort measures demo", status: "Drill Complete", time: 15 },
          { id: 403, name: "Alexander Davis", age: 22, gender: "Male", condition: "Simulated bleeding", treatment: "Pressure application demonstration", status: "Drill Complete", time: 15 },
          { id: 404, name: "Amelia Martinez", age: 20, gender: "Female", condition: "Actual heat exhaustion", treatment: "Cooling, hydration, rest", status: "Treated", time: 35 },
          { id: 405, name: "Benjamin Wilson", age: 21, gender: "Male", condition: "Simulated unconsciousness", treatment: "Recovery position demonstration", status: "Drill Complete", time: 10 },
          { id: 406, name: "Harper Thompson", age: 19, gender: "Female", condition: "Simulated breathing difficulty", treatment: "Position and oxygen demo", status: "Drill Complete", time: 15 }
        ]
      }
    };

    document.getElementById('generateReport').addEventListener('click', function() {
      const eventId = document.getElementById('eventSelect').value;
      const reportType = document.getElementById('reportType').value;
      
      if (!eventId) {
        alert('Please select an event to generate a report');
        return;
      }
      
      const event = eventData[eventId];
      generateReport(event, reportType);
    });

    function generateReport(event, reportType) {
      // Show the report output section
      const reportOutput = document.getElementById('reportOutput');
      reportOutput.classList.remove('d-none');
      
      // Set the report title
      document.getElementById('reportTitle').textContent = `${event.name} - Patient Summary`;
      
      // Calculate statistics
      const totalPatients = event.patients.length;
      const successfulCases = event.patients.filter(p => p.status === "Completed" || p.status === "Treated").length;
      const successRate = Math.round((successfulCases / totalPatients) * 100);
      const criticalCases = event.patients.filter(p => 
        p.condition.includes("allergic") || 
        p.condition.includes("Low blood pressure") || 
        p.condition.includes("heat exhaustion")).length;
      const avgTime = Math.round(event.patients.reduce((sum, p) => sum + p.time, 0) / totalPatients);
      
      // Update statistics display
      document.getElementById('totalPatients').textContent = totalPatients;
      document.getElementById('successRate').textContent = `${successRate}%`;
      document.getElementById('criticalCases').textContent = criticalCases;
      document.getElementById('avgTime').textContent = `${avgTime} min`;
      
      // Generate patient list based on report type
      const patientListContainer = document.getElementById('patientList');
      patientListContainer.innerHTML = '';
      
      if (reportType === 'summary') {
        // Generate summary view
        const summaryDiv = document.createElement('div');
        summaryDiv.className = 'mb-4';
        summaryDiv.innerHTML = `
          <h4>Event Summary</h4>
          <p><strong>Location:</strong> ${event.location}</p>
          <p><strong>Total Patients:</strong> ${totalPatients}</p>
          <p><strong>Patient Breakdown:</strong></p>
          <ul>
            <li>Male patients: ${event.patients.filter(p => p.gender === "Male").length}</li>
            <li>Female patients: ${event.patients.filter(p => p.gender === "Female").length}</li>
            <li>Average age: ${Math.round(event.patients.reduce((sum, p) => sum + p.age, 0) / totalPatients)}</li>
          </ul>
          <p><strong>Treatment Summary:</strong></p>
          <ul>
            <li>Completed treatments: ${event.patients.filter(p => p.status === "Completed" || p.status === "Treated").length}</li>
            <li>Pending/Monitored cases: ${event.patients.filter(p => p.status === "Monitored").length}</li>
            <li>Deferred cases: ${event.patients.filter(p => p.status === "Deferred").length}</li>
          </ul>
        `;
        patientListContainer.appendChild(summaryDiv);
        
      } else if (reportType === 'detailed') {
        // Generate detailed patient list
        const table = document.createElement('table');
        table.className = 'table table-striped table-hover';
        
        let tableHTML = `
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Age</th>
              <th>Gender</th>
              <th>Condition</th>
              <th>Treatment</th>
              <th>Status</th>
              <th>Time (min)</th>
            </tr>
          </thead>
          <tbody>
        `;
        
        event.patients.forEach(patient => {
          tableHTML += `
            <tr>
              <td>${patient.id}</td>
              <td>${patient.name}</td>
              <td>${patient.age}</td>
              <td>${patient.gender}</td>
              <td>${patient.condition}</td>
              <td>${patient.treatment}</td>
              <td>${patient.status}</td>
              <td>${patient.time}</td>
            </tr>
          `;
        });
        
        tableHTML += '</tbody>';
        table.innerHTML = tableHTML;
        patientListContainer.appendChild(table);
        
      } else if (reportType === 'stats') {
        // Generate statistical analysis
        const statsDiv = document.createElement('div');
        
        // Calculate gender distribution
        const maleCount = event.patients.filter(p => p.gender === "Male").length;
        const femaleCount = event.patients.filter(p => p.gender === "Female").length;
        const malePercentage = Math.round((maleCount / totalPatients) * 100);
        const femalePercentage = Math.round((femaleCount / totalPatients) * 100);
        
        // Calculate status distribution
        const completedCount = event.patients.filter(p => p.status === "Completed").length;
        const treatedCount = event.patients.filter(p => p.status === "Treated").length;
        const monitoredCount = event.patients.filter(p => p.status === "Monitored").length;
        const deferredCount = event.patients.filter(p => p.status === "Deferred").length;
        
        statsDiv.innerHTML = `
          <h4>Statistical Analysis</h4>
          
          <div class="card mb-4">
            <div class="card-header">Gender Distribution</div>
            <div class="card-body">
              <div class="progress mb-2" style="height: 25px;">
                <div class="progress-bar bg-primary" style="width: ${malePercentage}%" role="progressbar" 
                  aria-valuenow="${malePercentage}" aria-valuemin="0" aria-valuemax="100">
                  Male: ${maleCount} (${malePercentage}%)
                </div>
                <div class="progress-bar bg-info" style="width: ${femalePercentage}%" role="progressbar" 
                  aria-valuenow="${femalePercentage}" aria-valuemin="0" aria-valuemax="100">
                  Female: ${femaleCount} (${femalePercentage}%)
                </div>
              </div>
            </div>
          </div>
          
          <div class="card mb-4">
            <div class="card-header">Treatment Status</div>
            <div class="card-body">
              <div class="progress mb-2" style="height: 25px;">
                <div class="progress-bar bg-success" style="width: ${(completedCount/totalPatients)*100}%" role="progressbar">
                  Completed: ${completedCount}
                </div>
                <div class="progress-bar bg-primary" style="width: ${(treatedCount/totalPatients)*100}%" role="progressbar">
                  Treated: ${treatedCount}
                </div>
                <div class="progress-bar bg-warning" style="width: ${(monitoredCount/totalPatients)*100}%" role="progressbar">
                  Monitored: ${monitoredCount}
                </div>
                <div class="progress-bar bg-danger" style="width: ${(deferredCount/totalPatients)*100}%" role="progressbar">
                  Deferred: ${deferredCount}
                </div>
              </div>
            </div>
          </div>
          
          <div class="card mb-4">
            <div class="card-header">Age Distribution</div>
            <div class="card-body">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th>Age Range</th>
                    <th>Count</th>
                    <th>Percentage</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>18-20</td>
                    <td>${event.patients.filter(p => p.age >= 18 && p.age <= 20).length}</td>
                    <td>${Math.round((event.patients.filter(p => p.age >= 18 && p.age <= 20).length / totalPatients) * 100)}%</td>
                  </tr>
                  <tr>
                    <td>21-23</td>
                    <td>${event.patients.filter(p => p.age >= 21 && p.age <= 23).length}</td>
                    <td>${Math.round((event.patients.filter(p => p.age >= 21 && p.age <= 23).length / totalPatients) * 100)}%</td>
                  </tr>
                  <tr>
                    <td>24+</td>
                    <td>${event.patients.filter(p => p.age >= 24).length}</td>
                    <td>${Math.round((event.patients.filter(p => p.age >= 24).length / totalPatients) * 100)}%</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          
          <div class="card">
            <div class="card-header">Treatment Time Analysis</div>
            <div class="card-body">
              <p><strong>Average treatment time:</strong> ${avgTime} minutes</p>
              <p><strong>Minimum treatment time:</strong> ${Math.min(...event.patients.map(p => p.time))} minutes</p>
              <p><strong>Maximum treatment time:</strong> ${Math.max(...event.patients.map(p => p.time))} minutes</p>
            </div>
          </div>
        `;
        
        patientListContainer.appendChild(statsDiv);
      }
    }
  </script>
  <script>
    document.getElementById('toggleSidebar').addEventListener('click', function () {
      document.getElementById('sidebar').classList.toggle('active');
    });
  </script>
</body>
</html>