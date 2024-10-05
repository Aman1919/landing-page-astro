<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['Name']);
    $email = htmlspecialchars($_POST['Email']);
    $phone = htmlspecialchars($_POST['Phone no.']);
    $subject = htmlspecialchars($_POST['Subject']);
    $message = htmlspecialchars($_POST['Description']);

    // Email setup
    $to = "amansingh33849@gmail.com"; // Replace with your email
    $subject = $subject ? $subject : 'New Contact Form Submission';

    // HTML email template
    $emailContent = "
    <html>
    <head>
        <title>Contact Form Submission</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
            .container { border: 1px solid #ccc; border-radius: 5px; padding: 20px; }
            h1 { color: #333; }
            p { margin: 5px 0; }
            .footer { margin-top: 20px; font-size: 0.9em; color: #666; }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>New Contact Form Submission</h1>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong><br>$message</p>
            <div class='footer'>This email was sent from your website contact form.</div>
        </div>
    </body>
    </html>
    ";

    // Set headers for email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <$email>" . "\r\n"; // From email

    // Send email
    if (mail($to, $subject, $emailContent, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Message failed to send.";
    }
}
?>
