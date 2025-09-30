<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create New Password</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #333;
    }

    .container {
      width: 400px;
      margin: 100px auto;
      background-color: white;
      padding: 20px;
      border: 1px solid #c642d0ff;
      border-radius: 5px;
      text-align: center;
    }

    input, button {
      width: 90%;
      padding: 10px;
      margin: 10px 0;
    }
  </style>
</head>
<body>
  <div class="container">
    <h3>Verify Email</h3>
    <form id="verify-form">
      <input type="password" name="newpass" placeholder="Create New Paswword" required>
      <input type="password" name="confrimnewpass" placeholder="Confirm Your Password" required>
      <button type="submit" name="sbt">Verify</button>
    </form>
  </div>
</body>
</html>
<?php
if(isset($_REQUEST['sbt'])){
    session_start();
    include 'config.php';
    $newpass=$_REQUEST['newpass'];
    $confrimnewpass=$_REQUEST['confrimnewpass'];
    if($newpass==$confrimnewpass){
        $query="UPDATE users SET password='$newpass' WHERE email='$_SESSION[email]' ";
        $result=mysqli_query($conn,$query);
        if($result){
            echo "<script>alert('Password Reset Successfully'); window.location='login.php';</script>";
        }else{
            echo "<script>alert('Error Occurred'); window.location='resetpass.php';</script>";
        }
    }else{
        echo "<script>alert('Password Not Matched'); window.location='resetpass.php';</script>";
    }

}
