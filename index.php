<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
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
      <img src="/api/placeholder/60/60" alt="Admin User" class="user-avatar">
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
      <h2>Red Cross Council Dashboard</h2>
      <a href="logout.php" class="text-white text-decoration-none fw-bold">
        <i class="bi bi-box-arrow-left" style="font-size: 1.5rem;"></i> 
      </a>
    </header>

    <main>
      <section class="welcome-banner">
        <h2>WELCOME, RED CROSS COUNCIL</h2>
      </section>
      
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
            <ul>
              <li>MEETING</li>
              <li>URGENT MEETING</li>
            </ul>
          </article>
          
          <article>
            <h2>UPCOMING EVENTS</h2>
            <ul>
              <li>MEETING</li>
              <li>URGENT MEETING</li>
            </ul>
          </article>
        </section>
        
        <aside class="side-column">
          <section class="calendar">
            <header class="calendar-header">
              <h2>May 2025</h2>
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
  </script>
</body>
</html>