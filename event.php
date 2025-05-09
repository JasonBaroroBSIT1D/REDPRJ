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
      <a href="event.php"  class="active">
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
      <h2>Admin Event</h2>
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
        <h1>Events Summary</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
          <i class="bi bi-plus-circle"></i> Add New Event
        </button>
      </section>
      
      <div class="events-container mt-4">
        <!-- Events will be loaded here -->
      </div>
    </main>
    
    <footer>
      &copy; 2025 BSIT2A. All rights reserved.
    </footer>
  </section>

  <!-- Add Event Modal -->
  <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addEventModalLabel">Add New Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addEventForm">
            <div class="mb-3">
              <label for="eventTitle" class="form-label">Event Title</label>
              <input type="text" class="form-control" id="eventTitle" name="title" required>
            </div>
            
            <div class="mb-3">
              <label for="eventDate" class="form-label">Date</label>
              <input type="date" class="form-control" id="eventDate" name="event_date" required>
            </div>
            
            <div class="row mb-3">
              <div class="col">
                <label for="eventStartTime" class="form-label">Start Time</label>
                <input type="time" class="form-control" id="eventStartTime" name="start_time" required>
              </div>
              <div class="col">
                <label for="eventEndTime" class="form-label">End Time</label>
                <input type="time" class="form-control" id="eventEndTime" name="end_time" required>
              </div>
            </div>
            
            <div class="mb-3">
              <label for="eventLocation" class="form-label">Location</label>
              <input type="text" class="form-control" id="eventLocation" name="location" required>
            </div>
            
            <div class="mb-3">
              <label for="eventDescription" class="form-label">Description</label>
              <textarea class="form-control" id="eventDescription" name="description" rows="3"></textarea>
            </div>

            <div class="mb-3">
              <label for="eventStatus" class="form-label">Status</label>
              <select class="form-select" id="eventStatus" name="status">
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="cancelled">Cancelled</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="saveEventBtn">Save Event</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Event Modal -->
  <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editEventForm">
            <input type="hidden" id="editEventId" name="id">
            <div class="mb-3">
              <label for="editEventTitle" class="form-label">Event Title</label>
              <input type="text" class="form-control" id="editEventTitle" name="title" required>
            </div>
            
            <div class="mb-3">
              <label for="editEventDate" class="form-label">Date</label>
              <input type="date" class="form-control" id="editEventDate" name="event_date" required>
            </div>
            
            <div class="row mb-3">
              <div class="col">
                <label for="editEventStartTime" class="form-label">Start Time</label>
                <input type="time" class="form-control" id="editEventStartTime" name="start_time" required>
              </div>
              <div class="col">
                <label for="editEventEndTime" class="form-label">End Time</label>
                <input type="time" class="form-control" id="editEventEndTime" name="end_time" required>
              </div>
            </div>
            
            <div class="mb-3">
              <label for="editEventLocation" class="form-label">Location</label>
              <input type="text" class="form-control" id="editEventLocation" name="location" required>
            </div>
            
            <div class="mb-3">
              <label for="editEventDescription" class="form-label">Description</label>
              <textarea class="form-control" id="editEventDescription" name="description" rows="3"></textarea>
            </div>

            <div class="mb-3">
              <label for="editEventStatus" class="form-label">Status</label>
              <select class="form-select" id="editEventStatus" name="status">
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="cancelled">Cancelled</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="updateEventBtn">Update Event</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('toggleSidebar').addEventListener('click', function () {
      document.getElementById('sidebar').classList.toggle('active');
    });

    // Load events when page loads
    document.addEventListener('DOMContentLoaded', function() {
      loadEvents();
    });

    // Function to load events
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
        const container = document.querySelector('.events-container');
        container.innerHTML = '';
        
        events.forEach(event => {
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

          const card = document.createElement('div');
          card.className = 'card mb-3';
          card.innerHTML = `
            <div class="card-body">
              <div class="event-header bg-danger text-white p-3 mb-3 rounded">
                <h5 class="card-title mb-0">${event.title}</h5>
              </div>
              <div class="urgency-badge mb-3">
                <span class="badge bg-${statusClass}">${statusText}</span>
              </div>
              <div class="event-details mb-3">
                <p class="mb-2"><i class="bi bi-calendar-event"></i> Date: ${event.event_date}</p>
                <p class="mb-2"><i class="bi bi-clock"></i> Time: ${event.start_time} - ${event.end_time}</p>
                <p class="mb-2"><i class="bi bi-geo-alt"></i> Location: ${event.location}</p>
                <p class="mb-2"><i class="bi bi-info-circle"></i> Description: ${event.description || 'No description provided'}</p>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <small class="text-muted">Posted: ${new Date(event.created_at).toLocaleString()}</small>
                </div>
                <div>
                  <button class="btn btn-primary btn-sm me-2" onclick="editEvent(${event.id})">
                    <i class="bi bi-pencil"></i> Edit
                  </button>
                  <button class="btn btn-danger btn-sm" onclick="deleteEvent(${event.id})">
                    <i class="bi bi-trash"></i> Delete
                  </button>
                </div>
              </div>
            </div>
          `;
          container.appendChild(card);
        });
      })
      .catch(error => console.error('Error:', error));
    }

    // Edit event
    function editEvent(id) {
      fetch('event_operations.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `action=get_event&id=${id}`
      })
      .then(response => response.json())
      .then(data => {
        if(data.status === 'success') {
          const event = data.data;
          document.getElementById('editEventId').value = event.id;
          document.getElementById('editEventTitle').value = event.title;
          document.getElementById('editEventDate').value = event.event_date;
          document.getElementById('editEventStartTime').value = event.start_time;
          document.getElementById('editEventEndTime').value = event.end_time;
          document.getElementById('editEventLocation').value = event.location;
          document.getElementById('editEventDescription').value = event.description;
          document.getElementById('editEventStatus').value = event.status;
          
          const editModal = new bootstrap.Modal(document.getElementById('editEventModal'));
          editModal.show();
        }
      })
      .catch(error => console.error('Error:', error));
    }

    // Update event
    document.getElementById('updateEventBtn').addEventListener('click', function() {
      const form = document.getElementById('editEventForm');
      const formData = new FormData(form);
      formData.append('action', 'update');

      fetch('event_operations.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if(data.status === 'success') {
          const modal = bootstrap.Modal.getInstance(document.getElementById('editEventModal'));
          modal.hide();
          loadEvents();
          alert('Event updated successfully!');
        } else {
          alert('Error: ' + data.message);
        }
      })
      .catch(error => console.error('Error:', error));
    });

    // Save event
    document.getElementById('saveEventBtn').addEventListener('click', function() {
      const form = document.getElementById('addEventForm');
      const formData = new FormData(form);
      formData.append('action', 'add');

      fetch('event_operations.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if(data.status === 'success') {
          const modal = bootstrap.Modal.getInstance(document.getElementById('addEventModal'));
          modal.hide();
          form.reset();
          loadEvents();
          alert('Event added successfully!');
        } else {
          alert('Error: ' + data.message);
        }
      })
      .catch(error => console.error('Error:', error));
    });

    // Delete event
    function deleteEvent(id) {
      if(confirm('Are you sure you want to delete this event?')) {
        fetch('event_operations.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: `action=delete&id=${id}`
        })
        .then(response => response.json())
        .then(data => {
          if(data.status === 'success') {
            loadEvents();
            alert('Event deleted successfully!');
          } else {
            alert('Error: ' + data.message);
          }
        })
        .catch(error => console.error('Error:', error));
      }
    }
  </script>
</body>
</html>