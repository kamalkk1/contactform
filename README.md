# contactform

Contact Form PHP Project
This is a simple PHP project called "Contact Form" that allows users to fill out a contact form with their information, which is then validated on the server-side using PHP. The project utilizes XAMPP as the local server environment and MySQL as the database for storing form submissions.

Project Overview
The project consists of three main files:

config.php:

This file is responsible for establishing the connection to the MySQL database. It contains the necessary database credentials (hostname, username, password, and database name). Any modifications to the database configuration should be made in this file.
index.html:

This file contains the HTML structure and form elements for the contact form. Users can enter their name, email address, subject, and message. The form includes client-side validation using HTML5 attributes, such as required and pattern, to ensure that the fields are correctly filled out before submission.
submit-form.php:

This file handles form submissions on the server-side. When the user submits the form, the data is sent to this PHP script for validation and processing.
The PHP script validates the input data to ensure that all required fields are filled, and the email address follows the correct format. If any validation errors occur, the user is redirected back to the contact form with appropriate error messages.
To prevent duplicate form submissions on page refresh, the PHP script uses a token-based approach or a unique session identifier to verify whether the form has already been submitted.
Setup and Configuration
XAMPP Setup:

Install XAMPP on your local machine and ensure that the Apache server and MySQL database are running.
Place the "contact-form" project folder in the htdocs directory of your XAMPP installation.
Database Configuration:

Open the config.php file and modify the database credentials according to your MySQL setup.
Create a MySQL database table to store the form submissions. The table should have columns for name, email, subject, and message.


Web Access:

Access the project by visiting http://localhost/contactform/submit_form in your web browser.
Usage

Configure php.ini:

Go to php folder in XAMPP installation directory.

Open the php.ini file as text.

[Mail Functions] section found in php.ini

Updated SMTP settings to point to SMTP2GO server address: smtp.smtp2go.com.

Update smtp_port setting to SMTP2GO port number for secure communication 

SMTP = smtp.smtp2go.com
smtp_port = 587
Save the changes made in php.
ini and close the file.

Restart the Apache server in XAMPP for the changes to take effect.

Configure sendmail.ini:

Go to the sendmail folder in the XAMPP installation directory.

Open mail.
Open the ini file in the text.

Update the following settings with your SMTP2GO SMTP credentials:

smtp_server=smtp.smtp2go.com
smtp_port=587
smtp44smlstp=
2go_ email@example. com
auth_password=your_smtp2go_password

Save the changes before sending the email.
ini and close the file.

Restart Apache and try:

After php.ini and sendmail.ini settings, restart Apache server in XAMPP. Try sending an email from the
Contact form.
If everything is configured correctly, the email should be sent from the SMTP2GO SMTP server.

Contact Form:

Open the "Contact Form" by visiting http://localhost/contactform/submit_form in your web browser.
Fill out the form with your name, email address, subject, and message. Ensure that all required fields are correctly filled.
Submit the form to process the data on the server-side.
Form Validation:

The PHP script in submit-form.php will validate the input data. If any errors are detected, you will be redirected back to the contact form with appropriate error messages displayed.


Preventing Duplicate Submissions:

To avoid duplicate form submissions on page refresh, the PHP script utilizes a token-based approach or a unique session identifier. This prevents accidental resubmissions when users refresh the page after submitting the form.
Email Sending (Optional):

The project includes an inbuilt email function to send form submissions via the PHP mail() function. However, due to security reasons, this feature might not work correctly on local servers like XAMPP. As an alternative, you can use an external SMTP service like Sendinblue or SMTP2GO  for email.


Troubleshooting
If you encounter any issues with the project setup or functionality, consider the following steps:

Check that XAMPP's Apache and MySQL services are running correctly.
Ensure that the database credentials in config.php are accurate and match your MySQL setup.
Review the PHP validation code in submit-form.php to identify any potential errors or issues.
If the inbuilt mail() function is not sending emails, consider using an external SMTP service for email.
