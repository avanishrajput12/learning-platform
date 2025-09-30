<?php
include 'config.php'; // DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $user_id = $_POST['user_id'];

    // Simple example query
    $stmt = $conn->prepare("SELECT * FROM users WHERE email ='$email' AND user_idr = '$user_id'");
    $stmt->bind_param("ss", $email, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "✅ Account verified. An OTP has been sent.";
        // Generate & send OTP here...
    } else {
        echo "❌ Invalid email or account number.";
    }
}
?>
