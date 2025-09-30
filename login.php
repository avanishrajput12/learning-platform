<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User Login - LearnX</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #cecabeff; /* Yellow background */
      font-family: 'Segoe UI', sans-serif;
    }

    .login-box {
      background: linear-gradient(135deg, #2c3e50, #ecf0f1);
      width: 350px;
      margin: 100px auto;
      border-radius: 40px;
      padding: 30px 25px;
      text-align: center;
      box-shadow: 0 8px 16px rgba(243, 240, 240, 0.2);
      position: relative;
    }
    .login-box:hover{
        box-shadow: 0 12px 30px rgba(199, 205, 221, 0.94);
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }

    .login-box .avatar {
      width: 80px;
      height: 80px;
      background-color: #eff5f7ff; 
      border-radius: 50%;
      margin: -70px auto 10px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-box .avatar img {
      width: 40px;
      height: 40px;
    }

    .login-box h2 {
      margin: 20px 0;
      color: #333;
      font-size: 20px;
    }

    .login-box input[type="text"],
    .login-box input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      background-color: #dcdcdc;
      border-radius: 40px;
      font-size: 14px;
    }

    .login-box input::placeholder {
      color: #777777ff;
      text-transform: uppercase;
      font-weight: 600;
    }

    .remember-me {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      margin: 10px 0;
      font-size: 14px;
      color: #333;
    }

    .remember-me input {
      margin-right: 8px;
    }

    .login-box button {
      width: 100%;
      padding: 12px;
      background-color: #27ae60;
      color: white;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
      transition: background 0.3s ease;
    }

    .login-box button:hover {
      background-color: #219150;
    }

    @media (max-width: 400px) {
      .login-box {
        width: 90%;
        padding: 20px;
      }

      .login-box h2 {
        font-size: 18px;
      }
    }
  </style>
</head>
<body>
  <div class="login-box">
    <div class="avatar">
      <img src="https://cdn-icons-png.flaticon.com/128/5264/5264565.png" alt="User Icon" />
    </div>
    <h2>User Login</h2>
    <form action="#" method="post">
      <input type="text" name="username" placeholder="User Name" required />
      <input type="password" name="password" placeholder="Password" required />
      
      <div class="remember-me">
        <input type="checkbox" id="remember" name="remember" />
        <label for="remember">Remember Me</label>
      </div>

      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
