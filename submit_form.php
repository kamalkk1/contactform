<?php
// database configuration file
require_once 'config.php';

// validate the form data
function validateForm($data)
{
    // To Check if all required fields are filled
    if (empty($data['name']) || empty($data['phone']) || empty($data['email']) || empty($data['subject']) || empty($data['message'])) {
        return "All fields are mandatory!";
    }

    // for email validity
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format!";
    }

    return null; // Validation passed
}

// save the form data to the database
function saveFormData($data)
{
    global $conn;

    //SQL statement
    $stmt = $conn->prepare("INSERT INTO contact_form (name, phone, email, subject, message, ip_address, submission_time) VALUES (?, ?, ?, ?, ?, ?, NOW())");

    // Bind parameters execute the statement
    $stmt->bind_param("ssssss", $data['name'], $data['phone'], $data['email'], $data['subject'], $data['message'], $_SERVER['REMOTE_ADDR']);
    $stmt->execute();
    $stmt->close();
}

// Custom function to send an email
function sendEmail($to, $subject, $message, $from)
{
    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: " . $from . "\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    // Send the email using the mail() function
    if (mail($to, $subject, $message, $headers)) {
        // Email sent successfully
        return true;
    } else {
        // Error sending email
        return false;
    }
}

//submission handling
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $form_data = $_POST;

    $validation_error = validateForm($form_data);
    if ($validation_error) {
        // Redirect back to the form with an error message
        header("Location: index.html?error=" . urlencode($validation_error));
        exit();
    } else {
        // Save the form data to the database
        saveFormData($form_data);

        // Send email notification to the owner
        $to = 'dowofib215@quipas.com';
        $subject = 'Form Submission';
        $message = "A contact form has been submitted with the following details:\n\n";
        $message .= "Full Name: " . $form_data['name'] . "\n";
        $message .= "Phone Number: " . $form_data['phone'] . "\n";
        $message .= "Email: " . $form_data['email'] . "\n";
        $message .= "Subject: " . $form_data['subject'] . "\n";
        $message .= "Message: " . $form_data['message'] . "\n";
        $from = 'kamalk2620@gmail.com';

        if (sendEmail($to, $subject, $message, $from)) {
            // Email sent successfully
            echo "Email sent successfully!";
        } else {
            // Error sending email
            echo "Failed to send the email.";
        }

        // Redirect
        header("Location: index.html?success=Form submitted successfully!");
        exit();
    }
}

?>
