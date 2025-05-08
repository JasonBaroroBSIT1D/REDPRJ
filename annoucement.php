<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Red Cross Council - Announcements</title>
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
      <a href="annoucement.php" class="active">Announcement</a>
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
      <section class="page-header">
        <h1>Announcements</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAnnouncementModal">
          <i class="bi bi-plus-circle"></i> Add Announcement
        </button>
      </section>
      
      <section>
        <article class="announcement-card">
          <header class="announcement-header announcement-urgency-high">
            <h2>URGENT: Council Meeting</h2>
          </header>
          <div class="announcement-body">
            <div class="row">
              <div class="col-md-3">
                <p><i class="bi bi-calendar-event"></i> Posted: April 20, 2025</p>
                <p><i class="bi bi-clock"></i> Expires: April 22, 2025</p>
                <p><i class="bi bi-person"></i> Posted by: Admin</p>
              </div>
              <div class="col-md-9">
                <p>All Red Cross Council officers are required to attend an emergency meeting on April 21, 2025, at 3:00 PM in Room 101. We will discuss urgent preparations for the upcoming Blood Donation Drive. Please bring your planning materials.</p>
                <p><strong>Topics to be discussed:</strong></p>
                <ul>
                  <li>Venue preparation</li>
                  <li>Volunteer assignments</li>
                  <li>Medical staff coordination</li>
                  <li>Logistics requirements</li>
                </ul>
              </div>
            </div>
          </div>
          <footer class="announcement-footer">
            <div>
              <span class="badge bg-danger">Urgent</span>
              <span class="badge bg-success">Active</span>
            </div>
            <div>
              <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Edit</button>
              <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Delete</button>
            </div>
          </footer>
        </article>
        
        <article class="announcement-card">
          <header class="announcement-header announcement-urgency-medium">
            <h2>First Aid Training Registration</h2>
          </header>
          <div class="announcement-body">
            <div class="row">
              <div class="col-md-3">
                <p><i class="bi bi-calendar-event"></i> Posted: April 15, 2025</p>
                <p><i class="bi bi-clock"></i> Expires: April 30, 2025</p>
                <p><i class="bi bi-person"></i> Posted by: Training Officer</p>
              </div>
              <div class="col-md-9">
                <p>Registration for the First Aid Training Workshop is now open. The workshop will be held on May 5, 2025, from 1:00 PM to 5:00 PM in Room 301.</p>
                <p>Each department should send at least 2 representatives. Space is limited to 30 participants, so please register early. Registration deadline is April 30, 2025.</p>
                <p>To register, please visit the Red Cross office or contact the Training Officer at training@redcross.edu.</p>
              </div>
            </div>
          </div>
          <footer class="announcement-footer">
            <div>
              <span class="badge bg-warning text-dark">Important</span>
              <span class="badge bg-success">Active</span>
            </div>
            <div>
              <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Edit</button>
              <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Delete</button>
            </div>
          </footer>
        </article>
        
        <article class="announcement-card">
          <header class="announcement-header announcement-urgency-low">
            <h2>Volunteer Hours Verification</h2>
          </header>
          <div class="announcement-body">
            <div class="row">
              <div class="col-md-3">
                <p><i class="bi bi-calendar-event"></i> Posted: April 10, 2025</p>
                <p><i class="bi bi-clock"></i> Expires: May 10, 2025</p>
                <p><i class="bi bi-person"></i> Posted by: Secretary</p>
              </div>
              <div class="col-md-9">
                <p>All volunteers who participated in the March Community Health Campaign need to verify their volunteer hours by May 10, 2025.</p>
                <p>Please bring your volunteer log sheets to the Red Cross office during office hours (Monday-Friday, 9:00 AM - 4:00 PM) for verification and signature.</p>
                <p>Certificates of participation will be issued after verification.</p>
              </div>
            </div>
          </div>
          <footer class="announcement-footer">
            <div>
              <span class="badge bg-info">Notice</span>
              <span class="badge bg-success">Active</span>
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

  <!-- Add Announcement Modal -->
  <dialog class="modal fade" id="addAnnouncementModal" tabindex="-1" aria-labelledby="addAnnouncementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <header class="modal-header">
          <h2 id="addAnnouncementModalLabel">Add New Announcement</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </header>
        <section class="modal-body">
          <form>
            <div class="mb-3">
              <label for="announcementTitle" class="form-label">Title</label>
              <input type="text" class="form-control" id="announcementTitle" required>
            </div>
            
            <div class="mb-3">
              <label for="announcementContent" class="form-label">Content</label>
              <textarea class="form-control" id="announcementContent" rows="5" required></textarea>
            </div>
            
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="announcementExpiry" class="form-label">Expiry Date</label>
                <input type="date" class="form-control" id="announcementExpiry" required>
              </div>
              <div class="col-md-6">
                <label for="announcementUrgency" class="form-label">Urgency Level</label>
                <select class="form-select" id="announcementUrgency">
                  <option value="low">Normal</option>
                  <option value="medium">Important</option>
                  <option value="high">Urgent</option>
                </select>
              </div>
            </div>
            
            <div class="mb-3">
              <label for="announcementTarget" class="form-label">Target Audience</label>
              <select class="form-select" id="announcementTarget">
                <option value="all">All Users</option>
                <option value="council">Council Members Only</option>
                <option value="volunteers">Volunteers Only</option>
                <option value="departments">Department Representatives</option>
              </select>
            </div>
          </form>
        </section>
        <footer class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary">Post Announcement</button>
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