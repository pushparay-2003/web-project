# Visa Application Website

## Requirements
- XAMPP (PHP, MySQL, Apache)

## Setup
1. Copy files to `htdocs/visa-application`.
2. Start Apache and MySQL using XAMPP.
3. Create a database `visa_application` in phpMyAdmin.
4. Import the following table:

```sql
CREATE TABLE applications (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  passport_number VARCHAR(50) NOT NULL,
  visa_type VARCHAR(50) NOT NULL,
  email VARCHAR(150) NOT NULL,
  verification_status ENUM('pending', 'verified') DEFAULT 'pending',
  verification_token VARCHAR(64) NOT NULL,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
 
