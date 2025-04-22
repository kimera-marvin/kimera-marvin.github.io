<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = strip_tags(trim($_POST['name']));
    $email   = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $phone   = strip_tags(trim($_POST['phone']));
    $subj    = strip_tags(trim($_POST['subject']));
    $message = strip_tags(trim($_POST['message']));

    if ($name && $email && $message) {
        $to      = 'info@ellipticalenterprises.com';
        $subject = "Website Contact: " . ($subj ?: 'No subject');
        $body    = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";
        $headers = "From: $email\r\nReply-To: $email\r\n";

        if (mail($to, $subject, $body, $headers)) {
            header('Location: contact.html?success=1'); 
            exit;
        } else {
            echo 'Sorry, something went wrong. Please try again later.';
        }
    } else {
        echo 'Please fill out all required fields.';
    }
}
?>
