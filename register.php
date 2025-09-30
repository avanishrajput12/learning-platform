
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LearnX - Register</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f3f4f6;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      min-height: 100vh;
    }

    .container {
      background:linear-gradient(135deg, #cdee0fff, #764ba2);
      padding: 25px 30px;
      border-radius: 30px;
      box-shadow: 0 8px 20px rgba(247, 13, 24, 0.93);
      width: 100%;
      max-width: 500px;
    }
    .container:hover{
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        transform: translateY(-5px);
        transition: all 0.3s ease;

    }

    h2 {
      text-align: center;
      color: #1f2937;
      margin-bottom: 20px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: 500;
      color: #374151;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="date"],
    input[type="password"] {
      padding: 10px;
      border: 1px solid #d1d5db;
      border-radius: 35px;
      font-size: 15px;
    }

    .gender-options {
      display: flex;
      gap: 15px;
      align-items: center;
    }

    .gender-options label {
      font-weight: normal;
      color: #374151;
    }

    .toggle-password {
      font-size: 14px;
      color: #6b7280;
      cursor: pointer;
      user-select: none;
      margin-top: 5px;
      align-self: flex-end;
    }

    button {
      background-color: #3b82f6;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #2563eb;
    }

    @media screen and (max-width: 480px) {
      .container {
        padding: 20px;
      }

      form {
        gap: 12px;
      }

      input,
      button {
        font-size: 14px;
      }

      .toggle-password {
        font-size: 13px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Register on LearnX</h2>
    <form action="#" method="post">
      <div class="form-group">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname" required />
      </div>

      <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lname" required />
      </div>

      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required />
      </div>

      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" required pattern="[0-9]{10}" placeholder="e.g. 9876543210" />
      </div>

      <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" required />
      </div>

      <div class="form-group">
        <label>Gender</label>
        <div class="gender-options">
          <input type="radio" id="male" name="gender" value="male" required />
          <label for="male">Male</label>

          <input type="radio" id="female" name="gender" value="female" />
          <label for="female">Female</label>
        </div>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
        <span class="toggle-password" onclick="togglePassword('password', this)">Show Password</span>
      </div>

      <div class="form-group">
        <label for="repassword">Confirm Password</label>
        <input type="password" id="repassword" name="repassword" required />
        <span class="toggle-password" onclick="togglePassword('repassword', this)">Show Password</span>
      </div>

      <button type="submit">Register</button>
    </form>
  </div>

  <script>
    function togglePassword(id, toggleElement) {
      const input = document.getElementById(id);
      if (input.type === "password") {
        input.type = "text";
        toggleElement.keyup= "Hide Password";
      } else {
        input.type = "password";
        toggleElement.textContent = "Show Password";
      }
    }
  </script>
</body>

</html>

<?php
include "config.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $dob=$_POST['dob'];
    $gender=$_REQUEST['gender'];
    
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];

    if($password==$repassword){
        $hash=password_hash($password,PASSWORD_DEFAULT);
        $user_id=rand(11111,999999);
        $sql="INSERT INTO `users` (`user_id`,`fname`, `lname`, `email`, `phone`, `dob`, `gender`, `password`) VALUES ('$user_id','$fname', '$lname', '$email', '$phone', '$dob', '$gender', '$hash')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "<script>alert('Registration Successful! You can now login.');</script>";
            header("location:login.php");
        }
        else{
            echo "<script>alert('Error: ".mysqli_error($conn)."');</script>";
        }
    }
    else{
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
    }
  
}