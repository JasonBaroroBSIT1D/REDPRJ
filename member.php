<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Members - Red Cross Council</title>
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
      <a href="member.php" class="active">Members</a>
      <a href="report.php" >Reports</a>
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
        <h1>RED CROSS MEMBERS</h1>
      </section>
      
      <section class="content-columns">
        <section class="main-column">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h2 class="mb-0">Member Directory</h2>
              <div>
                <button class="btn btn-outline-primary me-2">
                  <i class="bi bi-download me-1"></i>Export
                </button>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addMemberModal">
                  <i class="bi bi-person-plus me-1"></i>Add Member
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-6">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search members...">
                    <button class="btn btn-outline-secondary" type="button">
                      <i class="bi bi-search"></i>
                    </button>
                  </div>
                </div>
                <div class="col-md-3">
                  <select class="form-select">
                    <option selected>All Departments</option>
                    <option>BSIT</option>
                    <option>BTLED-IA</option>
                    <option>BTLED-HE</option>
                    <option>BTLED-ICT</option>
                    <option>BFPT</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <select class="form-select">
                    <option selected>All Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                  </select>
                </div>
              </div>
              
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Department</th>
                      <th>Year Level</th>
                      <th>Position</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>RC-001</td>
                      <td>Maria Clara</td>
                      <td>BSIT</td>
                      <td>2nd Year</td>
                      <td>President</td>
                      <td><span class="badge bg-success">Active</span></td>
                      <td>
                        <button class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>RC-002</td>
                      <td>Jose Rizal</td>
                      <td>BTLED-ICT</td>
                      <td>3rd Year</td>
                      <td>Vice President</td>
                      <td><span class="badge bg-success">Active</span></td>
                      <td>
                        <button class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>RC-003</td>
                      <td>Andres Bonifacio</td>
                      <td>BFPT</td>
                      <td>1st Year</td>
                      <td>Secretary</td>
                      <td><span class="badge bg-success">Active</span></td>
                      <td>
                        <button class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>RC-004</td>
                      <td>Gabriela Silang</td>
                      <td>BTLED-HE</td>
                      <td>2nd Year</td>
                      <td>Treasurer</td>
                      <td><span class="badge bg-success">Active</span></td>
                      <td>
                        <button class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>RC-005</td>
                      <td>Emilio Aguinaldo</td>
                      <td>BTLED-IA</td>
                      <td>4th Year</td>
                      <td>Member</td>
                      <td><span class="badge bg-secondary">Inactive</span></td>
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
          
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="card">
                <div class="card-header">
                  <h2>Department Distribution</h2>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Department</th>
                          <th>Members</th>
                          <th>Percentage</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>BSIT</td>
                          <td>15</td>
                          <td>30%</td>
                        </tr>
                        <tr>
                          <td>BTLED-IA</td>
                          <td>8</td>
                          <td>16%</td>
                        </tr>
                        <tr>
                          <td>BTLED-HE</td>
                          <td>10</td>
                          <td>20%</td>
                        </tr>
                        <tr>
                          <td>BTLED-ICT</td>
                          <td>12</td>
                          <td>24%</td>
                        </tr>
                        <tr>
                          <td>BFPT</td>
                          <td>5</td>
                          <td>10%</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="card">
                <div class="card-header">
                  <h2>Member Statistics</h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <div class="p-3 bg-danger text-white rounded">
                        <h3>50</h3>
                        <p class="mb-0">Total Members</p>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="p-3 bg-success text-white rounded">
                        <h3>45</h3>
                        <p class="mb-0">Active Members</p>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="p-3 bg-primary text-white rounded">
                        <h3>12</h3>
                        <p class="mb-0">New This Year</p>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="p-3 bg-warning text-dark rounded">
                        <h3>8</h3>
                        <p class="mb-0">Officers</p>
                      </div>
                    </div>
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
              <h2>Recent Activities</h2>
            </div>
            <div class="card-body p-0">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">New member added</h5>
                    <small class="text-muted">Today</small>
                  </div>
                  <p class="mb-1">Juan Dela Cruz joined Red Cross Council</p>
                </li>
                <li class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Member status updated</h5>
                    <small class="text-muted">Yesterday</small>
                </div>
                <p class="mb-1">Maria Santos changed to inactive status</p>
              </li>
              <li class="list-group-item">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Position updated</h5>
                  <small class="text-muted">2 days ago</small>
                </div>
                <p class="mb-1">Pedro Gonzales promoted to Committee Head</p>
              </li>
              <li class="list-group-item">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Member profile updated</h5>
                  <small class="text-muted">3 days ago</small>
                </div>
                <p class="mb-1">Contact information updated for 5 members</p>
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

<!-- Add Member Modal -->
<dialog class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <header class="modal-header">
        <h2 id="addMemberModalLabel">Add New Member</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </header>
      <section class="modal-body">
        <form>
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="firstName" class="form-label">First Name</label>
              <input type="text" class="form-control" id="firstName" required>
            </div>
            <div class="col-md-6">
              <label for="lastName" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="lastName" required>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="studentId" class="form-label">Student ID</label>
              <input type="text" class="form-control" id="studentId" required>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" required>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
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
            <div class="col-md-6">
              <label for="yearLevel" class="form-label">Year Level</label>
              <select class="form-select" id="yearLevel" required>
                <option value="" selected disabled>Select Year Level</option>
                <option value="1st Year">1st Year</option>
                <option value="2nd Year">2nd Year</option>
                <option value="3rd Year">3rd Year</option>
                <option value="4th Year">4th Year</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="position" class="form-label">Position</label>
              <select class="form-select" id="position" required>
                <option value="" selected disabled>Select Position</option>
                <option value="President">President</option>
                <option value="Vice President">Vice President</option>
                <option value="Secretary">Secretary</option>
                <option value="Treasurer">Treasurer</option>
                <option value="Public Relations Officer">Public Relations Officer</option>
                <option value="Committee Head">Committee Head</option>
                <option value="Member">Member</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="contactNumber" class="form-label">Contact Number</label>
              <input type="tel" class="form-control" id="contactNumber" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" rows="2"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="active" value="active" checked>
              <label class="form-check-label" for="active">
                Active
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="inactive" value="inactive">
              <label class="form-check-label" for="inactive">
                Inactive
              </label>
            </div>
          </div>
          <div class="mb-3">
            <label for="profilePicture" class="form-label">Profile Picture</label>
            <input class="form-control" type="file" id="profilePicture">
          </div>
        </form>
      </section>
      <footer class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger">Save Member</button>
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