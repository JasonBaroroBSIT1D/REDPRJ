<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Red Cross Council - Events</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <aside>
    <img src="Red Cross.jpg" alt="Red Cross Logo">
    <nav>
      <a href="index.php">Dashboard</a>
      <a href="event.php" class="active">Events</a>
      <a href="annoucement.php">Announcement</a>
      <a href="records.php">Records</a>
      <a href="member.php">Members</a>
      <a href="report.php" >Reports</a>
      <a href="feedback.php">View Feedbacks</a>
    </nav>
  </aside>

  <section class="content-wrapper">
  <header style="display: flex; justify-content: flex-end; align-items: center; padding: 10px;">
  <a href="logout.php" class="text-white text-decoration-none fw-bold" style="color: red;">
    <i class="bi bi-box-arrow-left" style="font-size: 1.5rem;"></i> 
  </a>
</header>
    
    <main>
      <section class="page-header">
        <h1>Events Summary</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
          <i class="bi bi-plus-circle"></i> Add New Event
        </button>
      </section>
      
      <section>
        <article class="event-card">
          <header class="event-header">
            <h2>Blood Donation Drive</h2>
          </header>
          <div class="event-body">
            <div class="row">
              <div class="col-md-3">
                <p><i class="bi bi-calendar-event"></i> April 25, 2025</p>
                <p><i class="bi bi-clock"></i> 9:00 AM - 4:00 PM</p>
                <p><i class="bi bi-geo-alt"></i> University Gymnasium</p>
              </div>
              <div class="col-md-9">
                <p><strong>Description:</strong></p>
                <p>Join us for the semestral blood donation drive. We aim to collect at least 100 blood bags to support local hospitals. All students, faculty, and staff are encouraged to participate.</p>
                <p><strong>Required Resources:</strong></p>
                <ul>
                  <li>10 Volunteers for registration</li>
                  <li>5 Medical staff</li>
                  <li>Refreshments for donors</li>
                </ul>
              </div>
            </div>
          </div>
          <footer class="event-footer">
            <div>
              <span class="badge bg-success">Approved</span>
              <span class="badge bg-primary">High Priority</span>
            </div>
            <div>
              <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Edit</button>
              <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Delete</button>
            </div>
          </footer>
        </article>
        
        <article class="event-card">
          <header class="event-header">
            <h2>First Aid Training Workshop</h2>
          </header>
          <div class="event-body">
            <div class="row">
              <div class="col-md-3">
                <p><i class="bi bi-calendar-event"></i> May 5, 2025</p>
                <p><i class="bi bi-clock"></i> 1:00 PM - 5:00 PM</p>
                <p><i class="bi bi-geo-alt"></i> Room 301</p>
              </div>
              <div class="col-md-9">
                <p><strong>Description:</strong></p>
                <p>Basic first aid training for all department representatives. The workshop will cover wound care, CPR basics, and emergency response procedures.</p>
                <p><strong>Required Resources:</strong></p>
                <ul>
                  <li>First aid demonstration kits</li>
                  <li>Training manuals</li>
                  <li>Certificates for participants</li>
                </ul>
              </div>
            </div>
          </div>
          <footer class="event-footer">
            <div>
              <span class="badge bg-warning text-dark">Pending Approval</span>
              <span class="badge bg-secondary">Medium Priority</span>
            </div>
            <div>
              <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Edit</button>
              <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Delete</button>
            </div>
          </footer>
        </article>
        
        <article class="event-card">
          <header class="event-header">
            <h2>Red Cross General Assembly</h2>
          </header>
          <div class="event-body">
            <div class="row">
              <div class="col-md-3">
                <p><i class="bi bi-calendar-event"></i> April 30, 2025</p>
                <p><i class="bi bi-clock"></i> 3:00 PM - 5:00 PM</p>
                <p><i class="bi bi-geo-alt"></i> Auditorium</p>
              </div>
              <div class="col-md-9">
                <p><strong>Description:</strong></p>
                <p>General assembly for all Red Cross members. Agenda includes electing new officers, reviewing past activities, and planning for the upcoming semester.</p>
                <p><strong>Required Resources:</strong></p>
                <ul>
                  <li>Presentation materials</li>
                  <li>Attendance sheets</li>
                  <li>Light refreshments</li>
                </ul>
              </div>
            </div>
          </div>
          <footer class="event-footer">
            <div>
              <span class="badge bg-success">Approved</span>
              <span class="badge bg-primary">High Priority</span>
            </div>
            <div>
              <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Edit</button>
              <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Delete</button>
            </div>
          </footer>
        </article>
      </section>
    </main>
    
    <footer>
      &copy; 2025 BSIT2A. All rights reserved.
    </footer>
  </section>

  <!-- Add Event Modal -->
  <dialog class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <header class="modal-header">
          <h2 id="addEventModalLabel">Add New Event</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </header>
        <section class="modal-body">
          <form>
            <div class="mb-3">
              <label for="eventTitle" class="form-label">Event Title</label>
              <input type="text" class="form-control" id="eventTitle" required>
            </div>
            
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="eventDate" class="form-label">Date</label>
                <input type="date" class="form-control" id="eventDate" required>
              </div>
              <div class="col-md-3">
                <label for="eventStartTime" class="form-label">Start Time</label>
                <input type="time" class="form-control" id="eventStartTime" required>
              </div>
              <div class="col-md-3">
                <label for="eventEndTime" class="form-label">End Time</label>
                <input type="time" class="form-control" id="eventEndTime" required>
              </div>
            </div>
            
            <div class="mb-3">
              <label for="eventLocation" class="form-label">Location</label>
              <input type="text" class="form-control" id="eventLocation" required>
            </div>
            
            <div class="mb-3">
              <label for="eventDescription" class="form-label">Description</label>
              <textarea class="form-control" id="eventDescription" rows="3" required></textarea>
            </div>
            
            <div class="mb-3">
              <label for="eventResources" class="form-label">Required Resources</label>
              <textarea class="form-control" id="eventResources" rows="3"></textarea>
            </div>
            
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="eventPriority" class="form-label">Priority</label>
                <select class="form-select" id="eventPriority">
                  <option value="high">High</option>
                  <option value="medium" selected>Medium</option>
                  <option value="low">Low</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="eventStatus" class="form-label">Status</label>
                <select class="form-select" id="eventStatus">
                  <option value="pending" selected>Pending Approval</option>
                  <option value="approved">Approved</option>
                  <option value="cancelled">Cancelled</option>
                </select>
              </div>
            </div>
          </form>
        </section>
        <footer class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary">Save Event</button>
        </footer>
      </div>
    </div>
  </dialog>

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>