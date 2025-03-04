<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "game";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($username)) {
        $_SESSION['error_message'] = "Please enter username";
    } elseif (empty($password)) {
        $_SESSION['error_message'] = "Please enter password";
    } elseif (empty($confirm_password)) {
        $_SESSION['error_message'] = "Please confirm your password";
    } elseif ($password !== $confirm_password) {
        $_SESSION['error_message'] = "Passwords do not match!";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO register (username, password) VALUES ('$username', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['success_message'] = "Registration successful!";
            echo "<script>alert('Registration successful!'); window.location.href = 'login.php';</script>";
            exit;
        } else {
            $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url("pic2.png.webp"); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
      background: rgba(0, 183, 255, 0.7);
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      width: 80%; /* Adjust the width as needed */
      max-width: 800px; /* Maximum width */
      height: auto; /* Adjust the height as needed */
        }


        h1 {
            color: red;
            font-size: 56px;
            font-style: italic;
        }

        .input-field {
            display: block;
            width: 50%;
            margin: 10px auto;
            padding: 15px;
            font-size: 18px;
            background:rgb(20, 16, 16);
            color: #fff;
            border: none;
            border-radius: 10px;
            text-align: center;
            font-weight: bold;
        }

        .register-btn {
            background: red;
            color: white;
            font-style: italic;
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            cursor: pointer;
        }

        .register-btn:hover {
            background: darkred;
        }

        .message {
            color: red;
            font-weight: bold;
        }

        .success {
            color: green;
            font-weight: bold;
        }
        .login-btn {
            background: #1E3A8A;
            color: white;
            font-style: italic;
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            cursor: pointer;
            
        }

        .login-btn:hover {
            background: #142366;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form method="POST">
            <div id="error-message" class="message"><?php echo $_SESSION['error_message'] ?? ''; unset($_SESSION['error_message']); ?></div>
            <input type="text" name="username" class="input-field" placeholder="Username">
            <input type="password" name="password" class="input-field" placeholder="Password">
            <input type="password" name="confirm_password" class="input-field" placeholder="Confirm password">
            <button type="submit" class="register-btn">Register</button>
            
        </form>
        <br>
        
        <button class="register-btn" onclick="window.location.href='login.php'">Login</button>
    </div>
</body>
</html>
