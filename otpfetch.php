<?php
session_start();

if (!isset($_POST['otp'])) {
    echo "❌ OTP not provided.";
    exit;
}

if ($_POST['otp'] == $_SESSION['otp']) {
    echo "✅ OTP matched! .<a href='resetpass.php'> Reset Password</a>";
} else {
    echo "❌ Incorrect OTP.";
}
?>
