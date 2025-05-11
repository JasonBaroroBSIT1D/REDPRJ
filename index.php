<?php
session_start();
// Check if user is logged in by verifying session username exists
// If not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page
    exit(); // Stop executing rest of the page
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Red Cross Council Dashboard</title>
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
      <a href="index.php" class="active">
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
      <h2>Admin Dashboard</h2>
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
    <div class="hero-banner text-center mb-4">
      <h1 class="hero-title mt-3">Welcome to the Philippine Red Cross USTP Council Dashboard</h1>
      <p class="hero-subtitle">Humanity. Neutrality. Impartiality. Independence. Voluntary Service. Unity. Universality.</p>
    </div>
     <section class="feature-grid">
        <a href="event.php" class="feature-item" style="background-color: #dc3545;">
          <i class="bi bi-calendar-event"></i>
          <span>Upcoming Events</span>
        </a>
        <a href="annoucement.php" class="feature-item" style="background-color: #0d6efd;">
          <i class="bi bi-megaphone"></i>
          <span>Announcements</span>
        </a>
        <a href="member.php" class="feature-item" style="background-color: #198754;">
          <i class="bi bi-people"></i>
          <span>Members</span>
        </a>
        <a href="records.php" class="feature-item" style="background-color: #6610f2;">
          <i class="bi bi-card-checklist"></i>
          <span>Records</span>
        </a>
        <a href="report.php" class="feature-item" style="background-color: #fd7e14;">
          <i class="bi bi-file-earmark-text"></i>
          <span>Reports</span>
        </a>
        <a href="feedback.php" class="feature-item" style="background-color: #20c997;">
          <i class="bi bi-chat-dots"></i>
          <span>Feedback</span>
        </a>
      </section>
      
      <section class="content-columns">
        <section class="main-column">
          <article>
            <h2>ANNOUNCEMENT</h2>
            <div id="announcementsList" class="list-group">
              <!-- Announcements will be loaded here -->
            </div>
            <div class="text-end mt-2">
              <a href="annoucement.php" class="btn btn-sm btn-outline-danger">View All Announcements</a>
            </div>
          </article>
          
          <article>
            <h2>UPCOMING EVENTS</h2>
            <div id="eventsList" class="list-group">
              <!-- Events will be loaded here -->
            </div>
            <div class="text-end mt-2">
              <a href="event.php" class="btn btn-sm btn-outline-danger">View All Events</a>
            </div>
          </article>
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
              
              <div class="calendar-day">27</div>
              <div class="calendar-day">28</div>
              <div class="calendar-day">29</div>
              <div class="calendar-day">30</div>
              <div class="calendar-day">1</div>
              <div class="calendar-day">2</div>
              <div class="calendar-day">3</div>
              
              <div class="calendar-day">4</div>
              <div class="calendar-day">5</div>
              <div class="calendar-day">6</div>
              <div class="calendar-day">7</div>
              <div class="calendar-day today">8</div>
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
              <div class="calendar-day">21</div>
              <div class="calendar-day">22</div>
              <div class="calendar-day">23</div>
              <div class="calendar-day">24</div>
              
              <div class="calendar-day">25</div>
              <div class="calendar-day">26</div>
              <div class="calendar-day">27</div>
              <div class="calendar-day">28</div>
              <div class="calendar-day">29</div>
              <div class="calendar-day">30</div>
              <div class="calendar-day">31</div>
            </section>
          </section>
        </aside>
      </section>
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

    // Load announcements
    function loadAnnouncements() {
      fetch('handlers/announcement_handler.php?action=get_all')
        .then(response => response.json())
        .then(data => {
          if (data.status === 'success') {
            const container = document.getElementById('announcementsList');
            container.innerHTML = '';
            
            // Only show the first 5 announcements
            data.data.slice(0, 5).forEach(announcement => {
              const urgencyClass = {
                'high': 'danger',
                'medium': 'warning',
                'low': 'info'
              }[announcement.urgency];

              const urgencyText = {
                'high': 'Urgent',
                'medium': 'Important',
                'low': 'Normal'
              }[announcement.urgency];

              const item = document.createElement('a');
              item.href = 'annoucement.php';
              item.className = 'list-group-item list-group-item-action d-flex justify-content-between align-items-center';
              item.innerHTML = `
                <div>
                  <h6 class="mb-1">${announcement.title}</h6>
                  <small class="text-muted">Posted: ${new Date(announcement.created_at).toLocaleDateString()}</small>
                </div>
                <span class="badge bg-${urgencyClass} rounded-pill">${urgencyText}</span>
              `;
              container.appendChild(item);
            });
          }
        })
        .catch(error => console.error('Error:', error));
    }

    // Load events
    function loadEvents() {
      fetch('event_operations.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=get_events'
      })
      .then(response => response.json())
      .then(events => {
        const container = document.getElementById('eventsList');
        container.innerHTML = '';
        
        // Only show the first 5 events
        events.slice(0, 5).forEach(event => {
          const statusClass = {
            'approved': 'success',
            'pending': 'warning',
            'cancelled': 'danger'
          }[event.status];

          const statusText = {
            'approved': 'Approved',
            'pending': 'Pending',
            'cancelled': 'Cancelled'
          }[event.status];

          const item = document.createElement('a');
          item.href = 'event.php';
          item.className = 'list-group-item list-group-item-action d-flex justify-content-between align-items-center';
          item.innerHTML = `
            <div>
              <h6 class="mb-1">${event.title}</h6>
              <small class="text-muted">
                <i class="bi bi-calendar-event"></i> ${event.event_date} | 
                <i class="bi bi-clock"></i> ${event.start_time}
              </small>
            </div>
            <span class="badge bg-${statusClass} rounded-pill">${statusText}</span>
          `;
          container.appendChild(item);
        });
      })
      .catch(error => console.error('Error:', error));
    }

    // Load announcements and events when page loads
    document.addEventListener('DOMContentLoaded', function() {
      loadAnnouncements();
      loadEvents();
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
      padding: 5px;
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
      padding: 10px;
      background-color: #f8f9fa;
      border-radius: 8px;
      margin-bottom: 15px;
    }
    
    .calendar-header h2 {
      font-size: 1.5rem;
      font-weight: 600;
      color: #333;
      margin: 0;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    
    .calendar-header .nav-buttons {
      display: flex;
      gap: 8px;
      align-items: center;
    }
    
    .calendar-header button {
      padding: 6px 12px;
      border: 1px solid #dee2e6;
      background-color: white;
      border-radius: 4px;
      cursor: pointer;
      transition: all 0.2s ease;
      display: flex;
      align-items: center;
      justify-content: center;
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
      font-size: 1rem;
    }

    /* Calendar grid styles */
    .calendar-grid {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 5px;
      padding: 10px;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .calendar-day {
      aspect-ratio: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.9rem;
      border-radius: 50%;
      transition: all 0.2s ease;
    }

    .calendar-day.header {
      font-weight: bold;
      color: #666;
      border-radius: 0;
    }

    .calendar-day:not(.header):hover {
      background-color: #e9ecef;
    }

    .calendar-day.today {
      background-color: #dc3545;
      color: white;
      font-weight: bold;
    }

    /* Hero Banner Styles */
    .hero-banner {
      position: relative;
      background: url('red-cross.jpg') center center/cover no-repeat;
      padding: 60px 10px 50px 10px;
      border-radius: 18px;
      box-shadow: 0 6px 24px rgba(220,53,69,0.10);
      margin-top: 24px;
      animation: heroFadeIn 1.2s ease;
      color: #fff;
      overflow: hidden;
    }
    .hero-banner::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(220,53,69,0.55); /* Red overlay, adjust opacity as needed */
      z-index: 1;
      border-radius: 18px;
    }
    .hero-banner .hero-title,
    .hero-banner .hero-subtitle {
      position: relative;
      z-index: 2;
    }
    .hero-title {
      font-size: 2.2rem;
      font-weight: 700;
      letter-spacing: 1px;
      margin-bottom: 0.5rem;
      text-shadow: 0 2px 8px rgba(0,0,0,0.18);
    }
    .hero-subtitle {
      font-size: 1.1rem;
      font-style: italic;
      opacity: 0.95;
      text-shadow: 0 2px 8px rgba(0,0,0,0.18);
    }
    @keyframes heroFadeIn {
      from { opacity: 0; transform: translateY(-30px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</body>
</html>