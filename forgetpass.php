<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Email Verification with OTP</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
body {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  background: linear-gradient(135deg, #bdc3c7, #2c3e50);
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.container {
  background: #fff;
  padding: 40px 30px;
  border-radius: 12px;
  box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.15);
  width: 100%;
  max-width: 380px;
  text-align: center;
}
.container:hover{
    box-shadow: 0px 8px 25px hsla(0, 86%, 51%, 0.84);
    transform: translateY(-5px);
    transition: all 0.3s ease;
}

.login-heading {
  font-size: 24px;
  font-weight: 600;
  color: #2c3e50;
  margin-bottom: 20px;
  position: relative;
}

.login-heading::after {
  content: "";
  display: block;
  width: 50px;
  height: 3px;
  background-color: #3498db;
  margin: 8px auto 0;
  border-radius: 2px;
}

form input,
#otp-box input {
  width: 100%;
  padding: 12px;
  margin: 10px 0;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 14px;
  transition: all 0.3s ease;
}

form input:focus,
#otp-box input:focus {
  border-color: #3498db;
  outline: none;
  box-shadow: 0px 0px 5px rgba(52, 152, 219, 0.4);
}

button {
  width: 100%;
  padding: 12px;
  margin-top: 10px;
  background: #3498db;
  border: none;
  border-radius: 8px;
  font-size: 15px;
  font-weight: 600;
  color: #fff;
  cursor: pointer;
  transition: background 0.3s ease;
}

button:hover {
  background: #2980b9;
}

.hidden {
  display: none;
}

#response {
  margin-top: 15px;
  font-size: 14px;
  font-weight: 500;
  color: #27ae60;
}
  </style>
</head>
<body>
  <div class="container">
 <h3 class="login-heading">Verify Email</h3>
    <form id="verify-form">
      <input type="email" name="email" placeholder="Email" required>
      <input type="text" name="user_id" placeholder="Enter user Id" required>
      <button type="submit">Verify</button>
    </form>

    <div id="otp-box" class="hidden">
      <input type="number" id="otp" placeholder="Enter OTP">
      <button id="submit-otp">Submit OTP</button>
    </div>

    <div id="response"></div>
  </div>

  <script>
    // STEP 1: Verify Email + Account
    $('#verify-form').on('submit', function(e) {
      e.preventDefault();

      const email = $('input[name="email"]').val();
      const user_id = $('input[name="user_id"]').val();

      $.ajax({
        url: 'mail.php',
        type: 'POST',
        data: { email: email, user_id: user_id},
        success: function(response) {
          $('#response').html(response);

          if (response.includes("✅")) {
            $('#otp-box').removeClass('hidden'); // Show OTP box
          }
        },
        error: function(xhr) {
          $('#response').html("Error: " + xhr.statusText);
        }
      });
    });

    // STEP 2: Submit OTP
    $('#submit-otp').on('click', function() {
      const otp = $('#otp').val();

      $.ajax({
        url: 'otpfetch.php',
        type: 'POST',
        data: { otp: otp },
        success: function(response) {
          $('#response').html(response);
        }
      });
    });
  </script>
</body>
</html>
