-- ============================================================
-- Yoga Prosperity Model — Admin System Database Schema
-- Import this file via cPanel > phpMyAdmin after creating your
-- database (see SETUP-GUIDE.md for step-by-step instructions).
-- ============================================================

CREATE TABLE IF NOT EXISTS admin_users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS settings (
  setting_key VARCHAR(100) PRIMARY KEY,
  setting_value TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS landing_pages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  slug VARCHAR(150) UNIQUE NOT NULL,
  title VARCHAR(255) NOT NULL,
  subtitle VARCHAR(255),
  hero_image VARCHAR(500),
  theme VARCHAR(50) NOT NULL DEFAULT 'classic',
  layout VARCHAR(50) NOT NULL DEFAULT 'classic',
  video_url VARCHAR(500),
  testimonial_text TEXT,
  testimonial_author VARCHAR(150),
  urgency_note VARCHAR(255),
  webinar_date VARCHAR(150),
  description TEXT,
  highlights TEXT,
  payment_link VARCHAR(500),
  notify_email VARCHAR(255),
  meta_title VARCHAR(255),
  meta_description VARCHAR(500),
  status ENUM('draft','published') DEFAULT 'draft',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS leads (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150),
  email VARCHAR(255),
  phone VARCHAR(50),
  message TEXT,
  source_page VARCHAR(150),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Default admin login (CHANGE THIS PASSWORD IMMEDIATELY AFTER FIRST LOGIN):
--   username: admin
--   password: ChangeMe123!
INSERT INTO admin_users (username, password_hash)
VALUES ('admin', '$2y$10$IQbS9TNGUYyTRFTYyzJ7PO7yHnhBd.Ycfrz9UpG38A5eOl1Au2TMG')
ON DUPLICATE KEY UPDATE username = username;

-- Default global settings
INSERT INTO settings (setting_key, setting_value) VALUES
  ('default_payment_link', 'https://rzp.io/l/your-razorpay-link'),
  ('default_notify_email', 'leads@yogaprosperitymodel.com')
ON DUPLICATE KEY UPDATE setting_key = setting_key;
