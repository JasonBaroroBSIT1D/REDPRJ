CREATE TABLE IF NOT EXISTS patient_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(100) NOT NULL,
    student_id VARCHAR(20) NOT NULL,
    visit_date DATE NOT NULL,
    department VARCHAR(50) NOT NULL,
    reason_visit TEXT NOT NULL,
    treatment TEXT NOT NULL,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    student_id VARCHAR(20) NOT NULL UNIQUE,
    department VARCHAR(50) NOT NULL,
    year_level VARCHAR(20) NOT NULL,
    position VARCHAR(50),
    status ENUM('Active', 'Inactive') DEFAULT 'Active',
    email VARCHAR(100),
    contact_number VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

