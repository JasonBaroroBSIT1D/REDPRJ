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
      <a href="annoucement.php" class="active">
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
      <h2>Admin Announcement</h2>
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
      <section class="page-header">
        <h1>Announcements</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAnnouncementModal">
          <i class="bi bi-plus-circle"></i> Add Announcement
        </button>
      </section>
      
      <div class="announcements-container mt-4">
        <!-- Announcements will be loaded here -->
      </div>
    </main>
    
    <footer>
      &copy; 2025 BSIT2A. All rights reserved.
    </footer>
  </section>

  <!-- Add Announcement Modal -->
  <dialog class="modal fade" id="addAnnouncementModal" tabindex="-1" aria-labelledby="addAnnouncementModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <header class="modal-header">
          <h2 id="addAnnouncementModalLabel">Add New Announcement</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </header>
        <section class="modal-body">
          <form id="announcementForm">
            <input type="hidden" id="announcementId">
            <div class="mb-3">
              <label for="announcementTitle" class="form-label">Title</label>
              <input type="text" class="form-control" id="announcementTitle" required>
            </div>
            
            <div class="mb-3">
              <label for="announcementContent" class="form-label">Content</label>
              <textarea class="form-control" id="announcementContent" rows="5" required></textarea>
            </div>

            <div class="mb-3">
              <label for="announcementUrgency" class="form-label">Urgency Level</label>
              <select class="form-select" id="announcementUrgency" required>
                <option value="low">Normal</option>
                <option value="medium">Important</option>
                <option value="high">Urgent</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="announcementExpiry" class="form-label">Expiry Date</label>
              <input type="date" class="form-control" id="announcementExpiry" required>
            </div>
          </form>
        </section>
        <footer class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="saveAnnouncementBtn">Save Announcement</button>
        </footer>
      </div>
    </div>
  </dialog>

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('toggleSidebar').addEventListener('click', function () {
      document.getElementById('sidebar').classList.toggle('active');
    });

    // Load announcements
    function loadAnnouncements() {
      fetch('handlers/announcement_handler.php?action=get_all')
        .then(response => response.json())
        .then(data => {
          if (data.status === 'success') {
            const container = document.querySelector('.announcements-container');
            container.innerHTML = '';
            
            data.data.forEach(announcement => {
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

              const card = document.createElement('div');
              card.className = 'card mb-3';
              card.innerHTML = `
                <div class="card-body">
                  <div class="announcement-header bg-danger text-white p-3 mb-3 rounded">
                    <h5 class="card-title mb-0">${announcement.title}</h5>
                  </div>
                  <div class="urgency-badge mb-3">
                    <span class="badge bg-${urgencyClass}">${urgencyText}</span>
                  </div>
                  <p class="card-text">${announcement.content}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <small class="text-muted">Posted: ${new Date(announcement.created_at).toLocaleString()}</small>
                      <br>
                      <small class="text-muted">Expires: ${announcement.expiry_date ? new Date(announcement.expiry_date).toLocaleDateString() : 'No expiry'}</small>
                    </div>
                    <div>
                      <button class="btn btn-primary btn-sm me-2" onclick="editAnnouncement(${announcement.id})">
                        <i class="bi bi-pencil"></i> Edit
                      </button>
                      <button class="btn btn-danger btn-sm" onclick="deleteAnnouncement(${announcement.id})">
                        <i class="bi bi-trash"></i> Delete
                      </button>
                    </div>
                  </div>
                </div>
              `;
              container.appendChild(card);
            });
          }
        })
        .catch(error => console.error('Error:', error));
    }

    // Edit announcement
    function editAnnouncement(id) {
      fetch(`handlers/announcement_handler.php?action=get_one&id=${id}`)
        .then(response => response.json())
        .then(data => {
          if (data.status === 'success') {
            const announcement = data.data;
            document.getElementById('announcementId').value = announcement.id;
            document.getElementById('announcementTitle').value = announcement.title;
            document.getElementById('announcementContent').value = announcement.content;
            document.getElementById('announcementUrgency').value = announcement.urgency;
            document.getElementById('announcementExpiry').value = announcement.expiry_date;
            
            document.getElementById('addAnnouncementModalLabel').textContent = 'Edit Announcement';
            document.getElementById('saveAnnouncementBtn').textContent = 'Update Announcement';
            
            new bootstrap.Modal(document.getElementById('addAnnouncementModal')).show();
          }
        })
        .catch(error => console.error('Error:', error));
    }

    // Save announcement (Add/Update)
    document.getElementById('saveAnnouncementBtn').addEventListener('click', function() {
      const id = document.getElementById('announcementId').value;
      const title = document.getElementById('announcementTitle').value;
      const content = document.getElementById('announcementContent').value;
      const urgency = document.getElementById('announcementUrgency').value;
      const expiry_date = document.getElementById('announcementExpiry').value;

      const formData = new FormData();
      formData.append('action', id ? 'update' : 'add');
      formData.append('title', title);
      formData.append('content', content);
      formData.append('urgency', urgency);
      formData.append('expiry_date', expiry_date);
      if (id) formData.append('id', id);

      fetch('handlers/announcement_handler.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          // Close modal and reset form
          bootstrap.Modal.getInstance(document.getElementById('addAnnouncementModal')).hide();
          resetForm();
          // Reload announcements
          loadAnnouncements();
        } else {
          alert(data.message);
        }
      })
      .catch(error => console.error('Error:', error));
    });

    // Reset form
    function resetForm() {
      document.getElementById('announcementId').value = '';
      document.getElementById('announcementTitle').value = '';
      document.getElementById('announcementContent').value = '';
      document.getElementById('announcementUrgency').value = 'low';
      document.getElementById('announcementExpiry').value = '';
      document.getElementById('addAnnouncementModalLabel').textContent = 'Add New Announcement';
      document.getElementById('saveAnnouncementBtn').textContent = 'Save Announcement';
    }

    // Add new announcement button
    document.querySelector('[data-bs-target="#addAnnouncementModal"]').addEventListener('click', resetForm);

    // Delete announcement
    function deleteAnnouncement(id) {
      if (confirm('Are you sure you want to delete this announcement?')) {
        const formData = new FormData();
        formData.append('action', 'delete');
        formData.append('id', id);

        fetch('handlers/announcement_handler.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.status === 'success') {
            loadAnnouncements();
          } else {
            alert(data.message);
          }
        })
        .catch(error => console.error('Error:', error));
      }
    }

    // Load announcements when page loads
    document.addEventListener('DOMContentLoaded', loadAnnouncements);
  </script>
</body>
</html>