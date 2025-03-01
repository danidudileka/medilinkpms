# MediLink Patient Management System

GROUP07_CIS4005_PRAC1

H.D. Danidu Dileka Perera 
CL/BSCSE-CMU/07/07  st20314527 

J.A Nomith Rasanjana 
CL/BSCSE-CMU/07/24  st20315415 

J.P.R Shehara Ruwindi Fernando
CL/BSCSE-CMU/07/17  st20314538

## SQL Code to create the database and tables

```sql
CREATE DATABASE crud_system;
USE crud_system;

CREATE TABLE patient (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    patient_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone_number VARCHAR(20),
    age INT NOT NULL,
    gender ENUM('Male', 'Female') NOT NULL,
    address TEXT,
    patient_detail VARCHAR(250),
    medical_history VARCHAR(250),
    security_answer VARCHAR(100) NOT NULL
);

CREATE TABLE medical_checkups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    checkup_date DATE NOT NULL,
    checkup_type VARCHAR(255) NOT NULL,
    FOREIGN KEY (username) REFERENCES patient(username) ON DELETE CASCADE
);

CREATE TABLE contact_form (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    inquiry_type VARCHAR(50) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
