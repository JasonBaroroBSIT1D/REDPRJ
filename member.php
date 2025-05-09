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
      <a href="records.php">
        <i class="bi bi-card-checklist"></i> Records
      </a>
      <a href="member.php" class="active">
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
      <h2>Admin Members</h2>
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
        <h1>RED CROSS MEMBERS</h1>
      </section>
      
      <section class="content-columns">
        <section class="main-column">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h2 class="mb-0">Member Directory</h2>
              <div>
                <a href="handlers/export_members.php" class="btn btn-outline-primary me-2">
                  <i class="bi bi-download me-1"></i>Export
                </a>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#memberModal">
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
                      <th>Student ID</th>
                      <th>Department</th>
                      <th>Year Level</th>
                      <th>Position</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="membersTableBody">
                    <!-- Members will be dynamically added here -->
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer">
              <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center" id="pagination">
                  <!-- Pagination will be dynamically added here -->
                </ul>
              </nav>
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

<!-- Add/Edit Member Modal -->
<div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="memberModalLabel">Add New Member</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="memberForm">
          <input type="hidden" id="memberId" name="id">
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="student_id" class="form-label">Student ID</label>
            <input type="text" class="form-control" id="student_id" name="student_id" required>
          </div>
          <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <select class="form-select" id="department" name="department" required>
              <option value="">Select Department</option>
              <option value="BSIT">BSIT</option>
              <option value="BTLED-IA">BTLED-IA</option>
              <option value="BTLED-HE">BTLED-HE</option>
              <option value="BTLED-ICT">BTLED-ICT</option>
              <option value="BFPT">BFPT</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="year_level" class="form-label">Year Level</label>
            <select class="form-select" id="year_level" name="year_level" required>
              <option value="">Select Year Level</option>
              <option value="1st Year">1st Year</option>
              <option value="2nd Year">2nd Year</option>
              <option value="3rd Year">3rd Year</option>
              <option value="4th Year">4th Year</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input type="text" class="form-control" id="position" name="position">
          </div>
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="mb-3">
            <label for="contact_number" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="contact_number" name="contact_number">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveMember">Save Member</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this member?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
      </div>
    </div>
  </div>
</div>

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

    document.addEventListener('DOMContentLoaded', function() {
        // Load members on page load
        loadMembers();

        // Search functionality
        const searchInput = document.querySelector('input[placeholder="Search members..."]');
        searchInput.addEventListener('input', debounce(loadMembers, 500));

        // Department filter
        const departmentSelect = document.querySelector('select:nth-of-type(1)');
        departmentSelect.addEventListener('change', loadMembers);

        // Status filter
        const statusSelect = document.querySelector('select:nth-of-type(2)');
        statusSelect.addEventListener('change', loadMembers);

        // Add member button click handler
        document.querySelector('[data-bs-target="#memberModal"]').addEventListener('click', function() {
            document.getElementById('memberForm').reset();
            document.getElementById('memberId').value = '';
            document.getElementById('memberModalLabel').textContent = 'Add New Member';
        });

        // Save member button click handler
        document.getElementById('saveMember').addEventListener('click', function() {
            const form = document.getElementById('memberForm');
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const formData = new FormData(form);
            const action = formData.get('id') ? 'update' : 'create';
            formData.append('action', action);

            fetch('handlers/member_operations.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const modal = bootstrap.Modal.getInstance(document.getElementById('memberModal'));
                    modal.hide();
                    form.reset();
                    loadMembers();
                }
                alert(data.message);
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while saving the member.');
            });
        });

        // Delete member confirmation handler
        document.getElementById('confirmDelete').addEventListener('click', function() {
            const memberId = this.dataset.memberId;
            if (memberId) {
                const formData = new FormData();
                formData.append('action', 'delete');
                formData.append('id', memberId);

                fetch('handlers/member_operations.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const modal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
                        modal.hide();
                        loadMembers();
                    }
                    alert(data.message);
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the member.');
                });
            }
        });
    });

    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Global variables
    let currentPage = 1;
    const itemsPerPage = 10;
    let members = [];
    let memberToDelete = null;

    // Load members
    function loadMembers() {
      const formData = new FormData();
      formData.append('action', 'getAll');

      fetch('handlers/member_operations.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          displayMembers(data.data);
        } else {
          alert(data.message);
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while loading members.');
      });
    }

    // Display members in table
    function displayMembers(members) {
      const tbody = document.getElementById('membersTableBody');
      tbody.innerHTML = '';
      
      members.forEach(member => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>${member.id}</td>
          <td>${member.name}</td>
          <td>${member.student_id}</td>
          <td>${member.department}</td>
          <td>${member.year_level}</td>
          <td>${member.position || '-'}</td>
          <td><span class="badge ${member.status === 'Active' ? 'bg-success' : 'bg-danger'}">${member.status}</span></td>
          <td>
            <button class="btn btn-sm btn-primary edit-member" data-id="${member.id}">
              <i class="bi bi-pencil"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-member" data-id="${member.id}">
              <i class="bi bi-trash"></i>
            </button>
          </td>
        `;
        tbody.appendChild(tr);
      });

      setupEventListeners();
      updatePagination();
    }

    // Update pagination
    function updatePagination() {
      const totalPages = Math.ceil(members.length / itemsPerPage);
      const pagination = document.getElementById('pagination');
      pagination.innerHTML = '';

      // Previous button
      pagination.innerHTML += `
        <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
          <a class="page-link" href="#" data-page="${currentPage - 1}">Previous</a>
        </li>
      `;

      // Page numbers
      for (let i = 1; i <= totalPages; i++) {
        pagination.innerHTML += `
          <li class="page-item ${currentPage === i ? 'active' : ''}">
            <a class="page-link" href="#" data-page="${i}">${i}</a>
          </li>
        `;
      }

      // Next button
      pagination.innerHTML += `
        <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
          <a class="page-link" href="#" data-page="${currentPage + 1}">Next</a>
        </li>
      `;

      // Add click event listeners to pagination
      document.querySelectorAll('.page-link').forEach(link => {
        link.addEventListener('click', (e) => {
          e.preventDefault();
          const page = parseInt(e.target.dataset.page);
          if (page && page !== currentPage) {
            currentPage = page;
            displayMembers();
          }
        });
      });
    }

    // Setup event listeners
    function setupEventListeners() {
      // Edit member buttons
      document.querySelectorAll('.edit-member').forEach(button => {
        button.addEventListener('click', () => {
          const id = button.dataset.id;
          loadMemberForEdit(id);
        });
      });

      // Delete member buttons
      document.querySelectorAll('.delete-member').forEach(button => {
        button.addEventListener('click', () => {
          memberToDelete = button.dataset.id;
          new bootstrap.Modal(document.getElementById('deleteModal')).show();
        });
      });
    }

    // Load member data for editing
    function loadMemberForEdit(memberId) {
      const formData = new FormData();
      formData.append('action', 'get');
      formData.append('id', memberId);

      fetch('handlers/member_operations.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          const member = data.data;
          document.getElementById('memberId').value = member.id;
          document.getElementById('name').value = member.name;
          document.getElementById('student_id').value = member.student_id;
          document.getElementById('department').value = member.department;
          document.getElementById('year_level').value = member.year_level;
          document.getElementById('position').value = member.position;
          document.getElementById('status').value = member.status;
          document.getElementById('email').value = member.email;
          document.getElementById('contact_number').value = member.contact_number;
          
          document.getElementById('memberModalLabel').textContent = 'Edit Member';
          new bootstrap.Modal(document.getElementById('memberModal')).show();
        } else {
          alert(data.message);
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while loading member data.');
      });
    }
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