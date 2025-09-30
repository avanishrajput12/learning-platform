<?php

session_start();

include 'config.php';

require "./PHPMailer/src/PHPMailer.php";

require "./PHPMailer/src/SMTP.php";

require "./PHPMailer/src/Exception.php";



use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;





$email = $_POST['email'];

$user_id = $_POST['user_id'];



$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND user_id = ?");

$stmt->bind_param("ss", $email, $user_id);

$stmt->execute();

$result = $stmt->get_result();



if ($result->num_rows > 0) {

    // Generate OTP and send it via email

    $otp = rand(100000, 999999);

    $_SESSION['otp'] = $otp;

    $_SESSION['email'] = $email;



    // Send OTP via PHPMailer (omitted here — already provided earlier)



    

// Send email

$mail = new PHPMailer(true);



try {

    // Server settings

    $mail->isSMTP();

    $mail->Host       = 'smtp.gmail.com';

    $mail->SMTPAuth   = true;

    $mail->Username   = 'avanishrajput208017@gmail.com';   // Your Gmail

    $mail->Password   = 'adca uypl rrga ljvp';             // App password

    $mail->SMTPSecure = 'tls';

    $mail->Port       = 587;



    // Recipients

    $mail->setFrom('avanishrajput208017@gmail.com', 'Avanish Rajput');

    $mail->addAddress($email);  // Recipient is the user



    // Content

    $mail->isHTML(true);

    $mail->Subject = 'Your OTP Code';

    $mail->Body    = "<h2>Your OTP is: <strong>$otp</strong></h2><p>Enter this to verify your identity.</p>";



    $mail->send();

    



    echo "✅ Account verified. OTP sent to your email.";



 }

 catch (Exception $e) {

        echo "❌ OTP could not be sent. Mailer Error: {$mail->ErrorInfo}";

    }



 } else {

    echo "❌ Invalid email or user_id number.";

}

    





?>

