# Online-Food-Ordering-
Online Restaurant Food Ordering System (FYP)
# Install XAMPP:

Download and install XAMPP from the official website: XAMPP Download.
Follow the installation instructions for your operating system.
# Start XAMPP:

Once installed, start XAMPP. On Windows, you can do this by running the XAMPP Control Panel and clicking on the "Start" buttons next to Apache and MySQL.
Place Project Files:

Place your project files in the htdocs directory within the XAMPP installation directory. This directory serves as the web root for Apache.
Accessing the Project:

Open a web browser and navigate to http://localhost/your_project_folder where your_project_folder is the name of the folder containing your project files.
Importing MySQL File in phpMyAdmin:

# Access phpMyAdmin:

Open a web browser and go to http://localhost/phpmyadmin.
Log in:

Log in to phpMyAdmin using your MySQL username and password. By default, the username is root and there's no password (if you didn't set one during XAMPP installation).
Select Database:

Select the database where you want to import your MySQL  file. <b>SQL file in database folder</b> file  If the database doesn't exist, you can create a new one by clicking on the "New" button in the left sidebar and providing a name for the database.
Import File:

Once inside the database, click on the "Import" tab in the top navigation menu.
Choose File:

Click on the "Choose File" button and select the MySQL file you want to import from your local system.
Import Options:

You can leave the import options as default unless you have specific requirements. Ensure that the correct character set and collation are selected.
Import:

Click on the "Go" button to start the import process. phpMyAdmin will execute the SQL commands in the file and import the database structure and data into your selected database.
Confirmation:

Once the import is complete, phpMyAdmin will display a confirmation message. You can now use the imported database in your project.
That's it! Your project should now be running on your XAMPP server, and you have successfully imported a MySQL file using phpMyAdmin.
