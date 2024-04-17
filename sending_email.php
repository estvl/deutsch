<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Include Composer's autoloader
require 'vendor/autoload.php';


// Include PHPMailer classes
require 'C:\xampp\htdocs\contact-form\vendor\phpmailer\phpmailer\src\Exception.php';
require 'C:\xampp\htdocs\contact-form\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\contact-form\vendor\phpmailer\phpmailer\src\SMTP.php';

// Instantiate PHPMailer
$mail = new PHPMailer(true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server hostname
        $mail->SMTPAuth = true;
        $mail->Username = 'esat.shehaj@gmail.com'; // Your SMTP username
        $mail->Password = 'gvzifvdzhykjwncc'; // Your SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender information
        $mail->setFrom($email, $fullName); // Specify the sender's email address and name

        // Recipient
        $mail->addAddress('esat.shehaj@gmail.com', 'Your Name'); // Add the recipient's email address and name
        $mail->addReplyTo($email, 'Reply To ' .$fullName);


        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Send email
        $mail->send();

        // Output success message
        echo "Email sent successfully.";
    } catch (Exception $e) {
        // Output error message
        echo "Failed to send email. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Form not submitted.";
}
?>
