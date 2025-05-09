<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback - Red Cross Council</title>
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
      <a href="report.php">
        <i class="bi bi-file-earmark-text-fill"></i> Reports
      </a>
      <a href="feedback.php"  class="active">
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
  <header>
      <button class="hamburger" id="toggleSidebar">
        <i class="bi bi-list"></i>
      </button>
      <h2>Admin Feedback</h2>
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
        <h1>SERVICE FEEDBACK</h1>
      </section>
      
      <section class="content-columns">
        <section class="main-column">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h2 class="mb-0">Feedback Submissions</h2>
              <div>
                <button class="btn btn-outline-primary me-2">
                  <i class="bi bi-download me-1"></i>Export Report
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-6">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search feedback...">
                    <button class="btn btn-outline-secondary" type="button">
                      <i class="bi bi-search"></i>
                    </button>
                  </div>
                </div>
                <div class="col-md-3">
                  <select class="form-select">
                    <option selected>All Categories</option>
                    <option>General Service</option>
                    <option>First Aid</option>
                    <option>Event Support</option>
                    <option>Training</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <select class="form-select">
                    <option selected>All Ratings</option>
                    <option>5 Stars</option>
                    <option>4 Stars</option>
                    <option>3 Stars</option>
                    <option>2 Stars</option>
                    <option>1 Star</option>
                  </select>
                </div>
              </div>
              
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Submitter</th>
                      <th>Department</th>
                      <th>Service Type</th>
                      <th>Rating</th>
                      <th>Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>FB-001</td>
                      <td>Juan Dela Cruz</td>
                      <td>BSIT</td>
                      <td>First Aid</td>
                      <td>
                        <div class="text-warning">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star"></i>
                        </div>
                      </td>
                      <td>April 18, 2025</td>
                      <td>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#viewFeedbackModal1">
                          <i class="bi bi-eye"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>FB-002</td>
                      <td>Maria Santos</td>
                      <td>BTLED-HE</td>
                      <td>Training</td>
                      <td>
                        <div class="text-warning">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                        </div>
                      </td>
                      <td>April 15, 2025</td>
                      <td>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#viewFeedbackModal2">
                          <i class="bi bi-eye"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>FB-003</td>
                      <td>Pedro Gonzales</td>
                      <td>BTLED-ICT</td>
                      <td>Event Support</td>
                      <td>
                        <div class="text-warning">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star"></i>
                          <i class="bi bi-star"></i>
                        </div>
                      </td>
                      <td>April 12, 2025</td>
                      <td>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#viewFeedbackModal3">
                          <i class="bi bi-eye"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>FB-004</td>
                      <td>Ana Cruz</td>
                      <td>BFPT</td>
                      <td>General Service</td>
                      <td>
                        <div class="text-warning">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star"></i>
                        </div>
                      </td>
                      <td>April 10, 2025</td>
                      <td>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#viewFeedbackModal4">
                          <i class="bi bi-eye"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>FB-005</td>
                      <td>Carlos Reyes</td>
                      <td>BTLED-IA</td>
                      <td>First Aid</td>
                      <td>
                        <div class="text-warning">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star"></i>
                          <i class="bi bi-star"></i>
                          <i class="bi bi-star"></i>
                        </div>
                      </td>
                      <td>April 05, 2025</td>
                      <td>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#viewFeedbackModal5">
                          <i class="bi bi-eye"></i>
                        </button>
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
                  <h2>Feedback Statistics</h2>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <div class="p-3 bg-danger text-white rounded">
                        <h3>45</h3>
                        <p class="mb-0">Total Feedback</p>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="p-3 bg-success text-white rounded">
                        <h3>4.2</h3>
                        <p class="mb-0">Average Rating</p>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="p-3 bg-primary text-white rounded">
                        <h3>12</h3>
                        <p class="mb-0">This Month</p>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="p-3 bg-warning text-dark rounded">
                        <h3>85%</h3>
                        <p class="mb-0">Positive Rate</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="card">
                <div class="card-header">
                  <h2>Rating Distribution</h2>
                </div>
                <div class="card-body">
                  <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <div class="text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                      <span>15 (33%)</span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 33%"></div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <div class="text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                      </div>
                      <span>20 (44%)</span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-primary" role="progressbar" style="width: 44%"></div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <div class="text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                      </div>
                      <span>5 (11%)</span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 11%"></div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <div class="text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                      </div>
                      <span>3 (7%)</span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 7%"></div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <div class="text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                      </div>
                      <span>2 (5%)</span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 5%"></div>
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
              <h2>May 2025</h2>
              <div class="nav-buttons">
                <button class="today-btn">Today</button>
                <button class="prev-btn"><i class="bi bi-chevron-left"></i></button>
                <button class="next-btn"><i class="bi bi-chevron-right"></i></button>
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
            </section>
          </section>
          
          <div class="card mt-4">
            <div class="card-header">
              <h2>Recent Comments</h2>
            </div>
            <div class="card-body p-0">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Juan Dela Cruz</h5>
                    <small class="text-muted">3 days ago</small>
                  </div>
                  <p class="mb-1">"The assistance provided was very prompt and professional. Thank you!"</p>
                </li>
                <li class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Maria Santos</h5>
                    <small class="text-muted">1 week ago</small>
                  </div>
                  <p class="mb-1">"The training was comprehensive and well-organized. Great job!"</p>
                </li>
                <li class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Pedro Gonzales</h5>
                    <small class="text-muted">1 week ago</small>
                  </div>
                  <p class="mb-1">"Service was good but could improve on response time."</p>
                </li>
                <li class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Ana Cruz</h5>
                    <small class="text-muted">2 weeks ago</small>
                  </div>
                  <p class="mb-1">"Volunteers were very helpful during the campus event."</p>
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

  <!-- View Feedback Modal 1 -->
  <dialog class="modal fade" id="viewFeedbackModal1" tabindex="-1" aria-labelledby="viewFeedbackModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <header class="modal-header">
          <h2 id="viewFeedbackModal1Label">Feedback Details</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </header>
        <section class="modal-body">
          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex justify-content-between">
                <span><strong>Feedback ID:</strong> FB-001</span>
                <span><strong>Date:</strong> April 18, 2025</span>
              </div>
            </div>
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-6">
                  <p><strong>Submitter:</strong> Juan Dela Cruz</p>
                  <p><strong>Department:</strong> BSIT</p>
                  <p><strong>Contact:</strong> juan.delacruz@email.com</p>
                </div>
                <div class="col-md-6">
                  <p><strong>Service Type:</strong> First Aid</p>
                  <p><strong>Date of Service:</strong> April 17, 2025</p>
                  <p><strong>Rating:</strong> 
                    <span class="text-warning">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star"></i>
                    </span>
                  </p>
                </div>
              </div>
              <hr>
              <div class="mb-3">
                <h5>Comments:</h5>
                <p>I received first aid treatment for a minor injury. The Red Cross Council staff was very professional and provided prompt assistance. The wound was cleaned and dressed properly. I appreciate their help and the follow-up they provided afterward. The only suggestion would be to have more staff available during peak hours.</p>
              </div>
              <hr>
              <div class="mb-3">
                <h5>Ratings by Category:</h5>
                <div class="row">
                  <div class="col-md-6">
                    <p><strong>Response Time:</strong> 
                      <span class="text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                      </span>
                    </p>
                    <p><strong>Staff Courtesy:
                        <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Juan Dela Cruz</h5>
                              <h6 class="card-subtitle mb-2 text-muted">First Aid - BSIT</h6>
                              <p class="card-text mt-3">
                                "The assistance provided was very prompt and professional. Thank you!"
                              </p>
                              <div class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                              </div>
                              <p class="text-muted mt-2"><small>Submitted on: April 18, 2025</small></p>
                            </div>
                          </div>
                        </section>
                        <footer class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </footer>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </dialog>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('toggleSidebar').addEventListener('click', function() {
      document.getElementById('sidebar').classList.toggle('active');
    });

    // Calendar functionality
    class Calendar {
      constructor() {
        this.date = new Date();
        this.currentMonth = this.date.getMonth();
        this.currentYear = this.date.getFullYear();
        this.today = new Date();
        
        this.calendarHeader = document.querySelector('.calendar-header h2');
        this.calendarGrid = document.querySelector('.calendar-grid');
        this.prevButton = document.querySelector('.calendar-header .prev-btn');
        this.nextButton = document.querySelector('.calendar-header .next-btn');
        this.todayButton = document.querySelector('.calendar-header .today-btn');
        
        this.init();
      }
      
      init() {
        this.prevButton.addEventListener('click', () => this.previousMonth());
        this.nextButton.addEventListener('click', () => this.nextMonth());
        this.todayButton.addEventListener('click', () => this.goToToday());
        this.renderCalendar();
      }
      
      renderCalendar() {
        const firstDay = new Date(this.currentYear, this.currentMonth, 1);
        const lastDay = new Date(this.currentYear, this.currentMonth + 1, 0);
        const startingDay = firstDay.getDay();
        const totalDays = lastDay.getDate();
        
        // Update header
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 
                          'July', 'August', 'September', 'October', 'November', 'December'];
        this.calendarHeader.textContent = `${monthNames[this.currentMonth]} ${this.currentYear}`;
        
        // Clear existing days except headers
        const headers = Array.from(this.calendarGrid.children).slice(0, 7);
        this.calendarGrid.innerHTML = '';
        headers.forEach(header => this.calendarGrid.appendChild(header));
        
        // Add previous month's days
        const prevMonthLastDay = new Date(this.currentYear, this.currentMonth, 0).getDate();
        for (let i = startingDay - 1; i >= 0; i--) {
          const dayElement = document.createElement('div');
          dayElement.className = 'calendar-day other-month';
          dayElement.textContent = prevMonthLastDay - i;
          this.calendarGrid.appendChild(dayElement);
        }
        
        // Add current month's days
        for (let i = 1; i <= totalDays; i++) {
          const dayElement = document.createElement('div');
          dayElement.className = 'calendar-day';
          
          // Check if it's today
          if (i === this.today.getDate() && 
              this.currentMonth === this.today.getMonth() && 
              this.currentYear === this.today.getFullYear()) {
            dayElement.classList.add('today');
          }
          
          dayElement.textContent = i;
          this.calendarGrid.appendChild(dayElement);
        }
        
        // Add next month's days
        const remainingDays = 42 - (startingDay + totalDays); // 42 = 6 rows * 7 days
        for (let i = 1; i <= remainingDays; i++) {
          const dayElement = document.createElement('div');
          dayElement.className = 'calendar-day other-month';
          dayElement.textContent = i;
          this.calendarGrid.appendChild(dayElement);
        }
      }
      
      previousMonth() {
        this.currentMonth--;
        if (this.currentMonth < 0) {
          this.currentMonth = 11;
          this.currentYear--;
        }
        this.renderCalendar();
      }
      
      nextMonth() {
        this.currentMonth++;
        if (this.currentMonth > 11) {
          this.currentMonth = 0;
          this.currentYear++;
        }
        this.renderCalendar();
      }
      
      goToToday() {
        this.currentMonth = this.today.getMonth();
        this.currentYear = this.today.getFullYear();
        this.renderCalendar();
      }
    }

    // Initialize calendar when the page loads
    document.addEventListener('DOMContentLoaded', () => {
      new Calendar();
    });
  </script>
  <style>
    .calendar-day.other-month {
      color: #ccc;
    }
    .calendar-day.today {
      background-color: #dc3545;
      color: white;
      border-radius: 50%;
    }
    .calendar-day {
      cursor: pointer;
      padding: 3px;
      text-align: center;
    }
    .calendar-day:hover {
      background-color: #f8f9fa;
    }
    
    /* New calendar header styles */
    .calendar-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 8px;
      background-color: #f8f9fa;
      border-radius: 6px;
      margin-bottom: 10px;
    }
    
    .calendar-header h2 {
      font-size: 1.2rem;
      font-weight: 600;
      color: #333;
      margin: 0;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    
    .calendar-header .nav-buttons {
      display: flex;
      gap: 4px;
      align-items: center;
    }
    
    .calendar-header button {
      padding: 4px 8px;
      border: 1px solid #dee2e6;
      background-color: white;
      border-radius: 4px;
      cursor: pointer;
      transition: all 0.2s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.8rem;
    }
    
    .calendar-header button:hover {
      background-color: #e9ecef;
      border-color: #ced4da;
    }
    
    .calendar-header button.today-btn {
      background-color: #dc3545;
      color: white;
      border: none;
    }
    
    .calendar-header button.today-btn:hover {
      background-color: #bb2d3b;
    }
    
    .calendar-header button i {
      font-size: 0.8rem;
    }

    /* Calendar grid styles */
    .calendar-grid {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 2px;
      padding: 8px;
      background-color: white;
      border-radius: 6px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .calendar-day {
      aspect-ratio: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.8rem;
      border-radius: 50%;
      transition: all 0.2s ease;
      min-height: 24px;
    }

    .calendar-day.header {
      font-weight: bold;
      color: #666;
      border-radius: 0;
      font-size: 0.7rem;
    }

    .calendar-day:not(.header):hover {
      background-color: #e9ecef;
    }

    .calendar-day.today {
      background-color: #dc3545;
      color: white;
      font-weight: bold;
    }
  </style>
</body>
</html>
                