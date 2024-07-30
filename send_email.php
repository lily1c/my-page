<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $project_type = htmlspecialchars($_POST['project_type']);
    $additional_details = htmlspecialchars($_POST['additional_details']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email format. Please provide a valid email address.';
        exit;
    }

    // Prepare data to be written to the file
    $data = "Name: $name\nEmail: $email\nType of Project: $project_type\nAdditional Details: $additional_details\n\n";

    // File path
    $file = 'collaboration_requests.txt';

    // Attempt to open the file
    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
        echo 'Thank you! Your request has been received.';
    } else {
        error_log("Failed to save request: Name: $name, Email: $email, Project Type: $project_type, Additional Details: $additional_details");
        echo 'Failed to save request. Please try again.';
    }
} else {
    http_response_code(405); // HTTP 405 Method Not Allowed
    echo 'Method Not Allowed';
}
?>
