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
  <aside id= "sidebar">
    <img src="Red Cross.jpg" alt="Red Cross Logo">
    <nav>
      <a href="index.php" class="active">Dashboard</a>
      <a href="event.php">Events</a>
      <a href="annoucement.php">Announcement</a>
      <a href="records.php">Records</a>
      <a href="member.php">Members</a>
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
        <h1>WELCOME, RED CROSS COUNCIL</h1>
      </section>
      
      <section class="content-columns">
        <section class="main-column">
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
        </aside>
      </section>
    </main>
    
    <footer>
      &copy; 2025 BSIT2A. All rights reserved.
    </footer>
  </section>

 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('toggleSidebar').addEventListener('click', function () {
      document.getElementById('sidebar').classList.toggle('active');
    });
  </script>
</body>
</html>