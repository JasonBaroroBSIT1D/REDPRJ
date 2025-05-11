-- Create feedback table
CREATE TABLE IF NOT EXISTS feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    submitter_name VARCHAR(100) NOT NULL,
    department VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    service_type ENUM('General Service', 'First Aid', 'Event Support', 'Training') NOT NULL,
    rating INT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    comments TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data (optional)
INSERT INTO feedback (submitter_name, department, email, service_type, rating, comments) VALUES
('John Doe', 'BSIT', 'john.doe@example.com', 'First Aid', 5, 'Excellent service and very professional staff.'),
('Jane Smith', 'BTLED-IA', 'jane.smith@example.com', 'Training', 4, 'Great training session, learned a lot.'),
('Mike Johnson', 'BFPT', 'mike.johnson@example.com', 'Event Support', 5, 'Outstanding support during our event.'); 