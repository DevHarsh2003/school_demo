# school_demo
**Project Overview**

School Demo is a PHP-based web application designed for managing student records, class data, and image uploads. The application allows administrators to manage student details, such as name, email, address, class, and profile images. It also enables the management of classes within a school, with functionality to add, edit, view, and delete students and classes.

This application is built using PHP for backend functionality, MySQL for database management, and Bootstrap for responsive and visually appealing frontend design.

**Features**
**1. Home Page (index.php)**
    Display a list of all students, including:
      Student name
      Email
      Class name (from the classes table)
      Image (displayed as a thumbnail)
      Date of creation
      Options to view, edit, or delete a student.
      
**2. Create Student (create.php)**
    Form to add a new student with:
      Name, email, address, and class dropdown.
      Image upload (only jpg/png allowed).
      On form submission, the student's data is stored in the MySQL database and the image is uploaded to the uploads directory.
      
**3. View Student (view.php)**
    View detailed information about a student:
      Full name, email, address, class name, image, and the date when the student was created.
      
**4. Edit Student (edit.php)**
    Form pre-filled with existing student details for editing.
    Update student details, including name, email, address, class, and image (optional).
    Validate image format (only jpg/png allowed).
    
**5. Delete Student (delete.php)**
    Confirm the deletion of a student and its associated image from the server.
    Delete student data from the database.
    
**6. Manage Classes (classes.php)**
    View a list of all classes with options to add, edit, or delete classes.
    Add a new class, providing the class name.
    
**7. Image Upload Handling**
    Upload student profile images to the uploads directory.
    Validate the image format to only allow jpg and png formats.
    Ensure images are uniquely named to avoid overwriting.
    
**8. Basic Styling**
    The application is styled using Bootstrap to make the user interface responsive and visually appealing.
    
**Installation**
  **Prerequisites**
      PHP 7.4 or higher
      MySQL or MariaDB
      Web server (Apache, Nginx, etc.)
      Composer (if using dependencies)
      
**1. Clone the repository**

git clone https://github.com/your-username/school_demo.git
cd school_demo

**2. Set up the database**

Create a new MySQL database:

CREATE DATABASE school_db;
Import the SQL file (schema.sql) to create the tables:

USE school_db;

-- Schema for 'students' table
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    class_id INT,
    image VARCHAR(255),
    FOREIGN KEY (class_id) REFERENCES classes(class_id)
);

-- Schema for 'classes' table
CREATE TABLE classes (
    class_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    created_at DATETIME
);

**3. Configure the Database Connection**

Open db.php and configure the database connection settings (database host, username, password, etc.).


<?php
$con = mysqli_connect("localhost", "root", "", "school_db");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

**4. Start the Web Server**

You can now host this project on your local server or any web hosting service that supports PHP.

**Usage**

Home Page: View all students with options to add, edit, or delete.
Create Student: Add new students with necessary details and images.
Edit Student: Modify existing student details.
View Student: View full details of a student.
Delete Student: Remove student records along with their images.
Manage Classes: Add, edit, or delete classes.

**Technologies Used**

PHP: Backend server-side scripting.
MySQL: Database for storing student and class information.
Bootstrap: Frontend framework for responsive design.
HTML/CSS: Basic web page structure and styling.
Contribution Guidelines
Feel free to fork this repository and submit pull requests for improvements, bug fixes, or feature additions.

**Fork the repository.**
Create a new branch (git checkout -b feature-xyz).
Commit your changes (git commit -am 'Add feature xyz').
Push to the branch (git push origin feature-xyz).
Create a new pull request.
License
This project is licensed under the MIT License - see the LICENSE file for details.

