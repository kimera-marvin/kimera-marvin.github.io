<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = strip_tags(trim($_POST['name']));
    $email   = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $phone   = strip_tags(trim($_POST['phone']));
    $subj    = strip_tags(trim($_POST['subject']));
    $message = strip_tags(trim($_POST['message']));

    $to      = 'info@ellipticalenterprise.com';
    $subject = "Website Contact: " . ($subj ?: 'No subject');
    $body    = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";
    $headers = "From: $email\r\nReply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        header('Location: thank_you.html');
        exit;
    } else {
        echo 'Sorry, something went wrong. Please try again later.';
    }
}
?>
