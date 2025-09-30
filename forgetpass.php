<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Email Verification with OTP</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #491082a7;
    }

    .container {
      width: 400px;
      margin: 100px auto;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      text-align: center;
      background: skyblue;
    }

    .hidden {
      display: none;
    }

    input, button {
      width: 90%;
      padding: 10px;
      margin: 10px 0;
    }

    #response {
      margin-top: 10px;
      color: red;
    }
  </style>
</head>
<body>
  <div class="container">
    <h3>Verify Email</h3>
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
