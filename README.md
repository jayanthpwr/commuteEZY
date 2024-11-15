commuteEZY
An Optimized Commute Occupancy Monitoring Platform

commuteEZY is a web-based application designed to optimize commute monitoring through QR code scanning on bus routes and effective bus pass management. It simplifies passenger tracking and helps manage bus pass records efficiently.

Prerequisites
To run this project, ensure you have the following software installed:

XAMPP 7.3
Download link: XAMPP 7.3

Sublime Text (for editing code files)
Download link: Sublime Text Build 3211

AnyDesk (optional, for remote debugging)
Download link: AnyDesk for Windows

Installation and Setup
Follow these steps to set up the project:

1. Install XAMPP
Download and install XAMPP 7.3 from the provided link.
Open the XAMPP Control Panel and start the following services:
Apache
MySQL
2. Import the Database
Open your web browser and navigate to phpMyAdmin.
Create a new database named bus.
Import the bus.sql script:
Click on the Import tab.
Select the bus.sql file from the project folder.
Click on Go to execute the import.
3. Add an Admin Record
Navigate to the admin table in the bus database.
Insert a new record with the following fields:
username: Your desired admin username
password: Your desired admin password
Other fields can be left as is or modified as per your requirements.
4. Configure the Application
Place the project folder in the htdocs directory of your XAMPP installation (usually located at C:\xampp\htdocs).
Ensure the database credentials in the project’s configuration file (likely located in a file like config.php or db.php) match your MySQL settings:
php
Copy code
$host = 'localhost';
$username = 'root'; // Default XAMPP username
$password = '';     // Default XAMPP password is blank
$database = 'bus';  // Database name you created
5. Run the Application
Open your web browser and navigate to the application’s URL:
arduino
Copy code
http://localhost/<your-project-folder>
Replace <your-project-folder> with the name of the folder containing the project files.
Features
QR Scanning:

Scans QR codes to track bus routes and manage passenger occupancy.
Ensures smooth operations for transport authorities.
Bus Pass Management:

Allows users to apply for and manage bus passes.
Facilitates both short-term and long-term pass registration.
Admin Panel:

Enables transport administrators to monitor and manage occupancy.
Admins can view, edit, and delete records as required.
Technologies Used
Frontend: HTML, CSS, JavaScript
Backend: PHP
Database: MySQL
Troubleshooting
Common Issues
XAMPP Services Not Starting

Ensure no other applications are using port 80 or 3306 (e.g., Skype or another web server).
If needed, change the default ports in the XAMPP configuration.
Database Errors

Verify the database name, username, and password in your configuration file.
Ensure the bus.sql script was imported correctly without errors.
QR Scanner Not Working

Ensure your webcam or QR scanning device is properly connected and configured.
Check for JavaScript console errors in your browser.
Contact Support
If you encounter any issues, feel free to reach out via email or through AnyDesk for remote support.

Future Enhancements
Integration with live GPS tracking for buses.
Mobile application for seamless QR code scanning on the go.
Improved analytics and reporting tools for administrators.
Start optimizing your commute operations with commuteEZY! 🚍
