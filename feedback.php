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
      <a href="feedback.php" class="active">
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
          <!-- Feedback List -->
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h2 class="mb-0">Feedback Submissions</h2>
              <div>
                <button class="btn btn-outline-primary me-2" onclick="exportFeedback()">
                  <i class="bi bi-download me-1"></i>Export Report
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-6">
                  <div class="input-group">
                    <input type="text" class="form-control" id="searchFeedback" placeholder="Search feedback...">
                    <button class="btn btn-outline-secondary" type="button" onclick="searchFeedback()">
                      <i class="bi bi-search"></i>
                    </button>
                  </div>
                </div>
                <div class="col-md-3">
                  <select class="form-select" id="categoryFilter" onchange="filterFeedback()">
                    <option value="">All Categories</option>
                    <option value="General Service">General Service</option>
                    <option value="First Aid">First Aid</option>
                    <option value="Event Support">Event Support</option>
                    <option value="Training">Training</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <select class="form-select" id="ratingFilter" onchange="filterFeedback()">
                    <option value="">All Ratings</option>
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="2">2 Stars</option>
                    <option value="1">1 Star</option>
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
                  <tbody id="feedbackTableBody">
                    <!-- Feedback entries will be loaded here -->
                  </tbody>
                </table>
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
        </aside>
      </section>
    </main>
    
    <footer>
      &copy; 2025 BSIT2A. All rights reserved.
    </footer>
  </section>

  <!-- View Feedback Modal -->
  <div class="modal fade" id="viewFeedbackModal" tabindex="-1" aria-labelledby="viewFeedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewFeedbackModalLabel">Feedback Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex justify-content-between">
                <span><strong>Feedback ID:</strong> <span id="modalFeedbackId"></span></span>
                <span><strong>Date:</strong> <span id="modalFeedbackDate"></span></span>
              </div>
            </div>
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-6">
                  <p><strong>Submitter:</strong> <span id="modalSubmitter"></span></p>
                  <p><strong>Department:</strong> <span id="modalDepartment"></span></p>
                  <p><strong>Contact:</strong> <span id="modalEmail"></span></p>
                </div>
                <div class="col-md-6">
                  <p><strong>Service Type:</strong> <span id="modalServiceType"></span></p>
                  <p><strong>Rating:</strong> <span id="modalRating"></span></p>
                </div>
              </div>
              <hr>
              <div class="mb-3">
                <h5>Comments:</h5>
                <p id="modalComments"></p>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('toggleSidebar').addEventListener('click', function() {
      document.getElementById('sidebar').classList.toggle('active');
    });

    // Load feedbacks when page loads
    document.addEventListener('DOMContentLoaded', function() {
        loadFeedbacks();
    });

    function loadFeedbacks() {
        fetch('feedback_operations.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'action=get_feedbacks'
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                displayFeedbacks(data.data);
            } else {
                alert('Error loading feedbacks: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error loading feedbacks');
        });
    }

    function displayFeedbacks(feedbacks) {
        const tbody = document.getElementById('feedbackTableBody');
        tbody.innerHTML = '';
        
        feedbacks.forEach(feedback => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>FB-${String(feedback.id).padStart(3, '0')}</td>
                <td>${feedback.submitter_name}</td>
                <td>${feedback.department}</td>
                <td>${feedback.service_type}</td>
                <td>${'★'.repeat(feedback.rating)}${'☆'.repeat(5-feedback.rating)}</td>
                <td>${new Date(feedback.created_at).toLocaleDateString()}</td>
                <td>
                    <button class="btn btn-sm btn-info" onclick="viewFeedback(${feedback.id})">
                        <i class="bi bi-eye"></i>
                    </button>
                </td>
            `;
            tbody.appendChild(row);
        });
    }

    function viewFeedback(id) {
        fetch('feedback_operations.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `action=get_feedback_details&id=${id}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                const feedback = data.data;
                
                // Update modal content
                document.getElementById('modalFeedbackId').textContent = `FB-${String(feedback.id).padStart(3, '0')}`;
                document.getElementById('modalSubmitter').textContent = feedback.submitter_name;
                document.getElementById('modalDepartment').textContent = feedback.department;
                document.getElementById('modalEmail').textContent = feedback.email;
                document.getElementById('modalServiceType').textContent = feedback.service_type;
                document.getElementById('modalRating').textContent = '★'.repeat(feedback.rating) + '☆'.repeat(5-feedback.rating);
                document.getElementById('modalFeedbackDate').textContent = new Date(feedback.created_at).toLocaleDateString();
                document.getElementById('modalComments').textContent = feedback.comments;

                // Show the modal
                const modal = new bootstrap.Modal(document.getElementById('viewFeedbackModal'));
                modal.show();
            } else {
                alert('Error loading feedback details: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error loading feedback details');
        });
    }

    function searchFeedback() {
        const searchTerm = document.getElementById('searchFeedback').value.toLowerCase();
        const rows = document.getElementById('feedbackTableBody').getElementsByTagName('tr');
        
        for (let row of rows) {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        }
    }

    function filterFeedback() {
        const category = document.getElementById('categoryFilter').value;
        const rating = document.getElementById('ratingFilter').value;
        const rows = document.getElementById('feedbackTableBody').getElementsByTagName('tr');
        
        for (let row of rows) {
            const serviceType = row.cells[3].textContent;
            const ratingStars = row.cells[4].textContent;
            
            const categoryMatch = !category || serviceType === category;
            const ratingMatch = !rating || ratingStars.includes('★'.repeat(parseInt(rating)));
            
            row.style.display = categoryMatch && ratingMatch ? '' : 'none';
        }
    }

    function exportFeedback() {
        window.location.href = 'export_feedback.php';
    }

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
                