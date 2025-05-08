<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Records - Red Cross Council</title>
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
      <a href="index.php" >
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
      <a href="#" class="logout-btn">
        <i class="bi bi-box-arrow-right"></i> Log Out
      </a>
    </div>
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
        <h1>PATIENT RECORDS</h1>
      </section>
      
      <section class="content-columns">
        <section class="main-column">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h2 class="mb-0">Patient Visit Records</h2>
              <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addRecordModal">
                <i class="bi bi-plus-circle me-2"></i>Add New Record
              </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Patient Name</th>
                      <th>Visit Date</th>
                      <th>Reason for Visit</th>
                      <th>Treatment</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>001</td>
                      <td>Juan Dela Cruz</td>
                      <td>April 18, 2025</td>
                      <td>Minor Injury</td>
                      <td>First Aid</td>
                      <td>
                        <button class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>002</td>
                      <td>Maria Santos</td>
                      <td>April 19, 2025</td>
                      <td>Headache</td>
                      <td>Medication</td>
                      <td>
                        <button class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>003</td>
                      <td>Pedro Gonzales</td>
                      <td>April 20, 2025</td>
                      <td>Fever</td>
                      <td>Rest and Medication</td>
                      <td>
                        <button class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer">
              <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          
          <div class="card">
            <div class="card-header">
              <h2>Monthly Statistics</h2>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4 mb-3">
                  <div class="p-3 bg-danger text-white rounded">
                    <h3>45</h3>
                    <p class="mb-0">Total Visits This Month</p>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="p-3 bg-primary text-white rounded">
                    <h3>28</h3>
                    <p class="mb-0">First Aid Cases</p>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="p-3 bg-success text-white rounded">
                    <h3>17</h3>
                    <p class="mb-0">Medication Dispensed</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        
        <aside class="side-column">
          <section class="calendar">
            <header class="calendar-header">
              <h2>April 2025</h2>
              <div>
                <button class="btn btn-sm btn-outline-secondary">today</button>
                <button class="btn btn-sm btn-outline-primary"><i class="bi bi-arrow-left"></i></button>
                <button class="btn btn-sm btn-outline-primary"><i class="bi bi-arrow-right"></i></button>
              </div>
            </header>
            
            <section class="calendar-grid">
              <div class="calendar-day header">Sun</div>
              <div class="calendar-day header">Mon</div>
              <div class="calendar-day header">Tue</div>
              <div class="calendar-day header">Wed</div>
              <div class="calendar-day header">Thu</div>
              <div class="calendar-day header">Fri</div>
              <div class="calendar-day header">Sat</div>
              
              <div class="calendar-day">30</div>
              <div class="calendar-day">31</div>
              <div class="calendar-day">1</div>
              <div class="calendar-day">2</div>
              <div class="calendar-day">3</div>
              <div class="calendar-day">4</div>
              <div class="calendar-day">5</div>
              
              <div class="calendar-day">6</div>
              <div class="calendar-day">7</div>
              <div class="calendar-day">8</div>
              <div class="calendar-day">9</div>
              <div class="calendar-day">10</div>
              <div class="calendar-day">11</div>
              <div class="calendar-day">12</div>
              
              <div class="calendar-day">13</div>
              <div class="calendar-day">14</div>
              <div class="calendar-day">15</div>
              <div class="calendar-day">16</div>
              <div class="calendar-day">17</div>
              <div class="calendar-day">18</div>
              <div class="calendar-day">19</div>
              
              <div class="calendar-day">20</div>
              <div class="calendar-day today">21</div>
              <div class="calendar-day">22</div>
              <div class="calendar-day">23</div>
              <div class="calendar-day">24</div>
              <div class="calendar-day">25</div>
              <div class="calendar-day">26</div>
              
              <div class="calendar-day">27</div>
              <div class="calendar-day">28</div>
              <div class="calendar-day">29</div>
              <div class="calendar-day">30</div>
              <div class="calendar-day">1</div>
              <div class="calendar-day">2</div>
              <div class="calendar-day">3</div>
            </section>
          </section>
          
          <div class="card mt-4">
            <div class="card-header">
              <h2>Common Issues</h2>
            </div>
            <div class="card-body">
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Minor Injuries
                  <span class="badge bg-primary rounded-pill">18</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Headaches
                  <span class="badge bg-primary rounded-pill">14</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Fever
                  <span class="badge bg-primary rounded-pill">9</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Stomach Pain
                  <span class="badge bg-primary rounded-pill">4</span>
                </li>
              </ul>
            </div>
          </div>
        </aside>
      </section>
    </main>
    
    <footer>
      &copy; 2025 BSIT2A. All rights reserved.
    </footer>
  </section>

  <!-- Add Record Modal -->
  <dialog class="modal fade" id="addRecordModal" tabindex="-1" aria-labelledby="addRecordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <header class="modal-header">
          <h2 id="addRecordModalLabel">Add New Patient Record</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </header>
        <section class="modal-body">
          <form>
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="patientName" class="form-label">Patient Name</label>
                <input type="text" class="form-control" id="patientName" required>
              </div>
              <div class="col-md-6">
                <label for="studentId" class="form-label">Student ID</label>
                <input type="text" class="form-control" id="studentId" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="visitDate" class="form-label">Visit Date</label>
                <input type="date" class="form-control" id="visitDate" required>
              </div>
              <div class="col-md-6">
                <label for="visitTime" class="form-label">Visit Time</label>
                <input type="time" class="form-control" id="visitTime" required>
              </div>
            </div>
            <div class="mb-3">
              <label for="department" class="form-label">Department</label>
              <select class="form-select" id="department" required>
                <option value="" selected disabled>Select Department</option>
                <option value="BSIT">BSIT</option>
                <option value="BTLED-IA">BTLED-IA</option>
                <option value="BTLED-HE">BTLED-HE</option>
                <option value="BTLED-ICT">BTLED-ICT</option>
                <option value="BFPT">BFPT</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="reasonVisit" class="form-label">Reason for Visit</label>
              <textarea class="form-control" id="reasonVisit" rows="2" required></textarea>
            </div>
            <div class="mb-3">
              <label for="treatment" class="form-label">Treatment/Action Taken</label>
              <textarea class="form-control" id="treatment" rows="2" required></textarea>
            </div>
            <div class="mb-3">
              <label for="notes" class="form-label">Additional Notes</label>
              <textarea class="form-control" id="notes" rows="3"></textarea>
            </div>
          </form>
        </section>
        <footer class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger">Save Record</button>
        </footer>
      </div>
    </div>
  </dialog>

 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('toggleSidebar').addEventListener('click', function () {
      document.getElementById('sidebar').classList.toggle('active');
    });
  </script>
</body>
</html>