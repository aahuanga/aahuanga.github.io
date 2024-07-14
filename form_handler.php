<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get the form fields and sanitize input
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Validate data
    if (empty($name) || empty($email) || empty($message)) {
        // Handle empty fields error
        echo "Please fill out all fields.";
        exit;
    }

    $to = "your_email@example.com";
    $subject = "New message from your website";

    // Compose the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Set up email headers
    $headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // Handle if the form is not submitted
    echo "There was a problem with your submission, please try again.";
}
?>
