<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "game";

    // Create database connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and trim user inputs
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // SQL query to select username and password
    $sql = "SELECT username, password FROM register WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $stored_password = $user['password'];

        // Debugging: Log the entered password and stored hashed password
        error_log("Entered password: " . $password);
        error_log("Stored hashed password: " . $stored_password);

        // Verify the password
        if (password_verify($password, $stored_password)) {
            // Login successful
            $_SESSION['username'] = $username;
            echo "<script>alert('Login successful!'); window.location.href = 'home.php';</script>";
            exit;
        } else {
            // Invalid password
            $_SESSION['error_message'] = "Invalid password";
        }
    } else {
        // User not found
        $_SESSION['error_message'] = "User not found";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        
        body {
            margin: 0;
            padding: 0;
            background-image: url("pic3.png.webp"); /* Replace with your image path */
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
            background: rgb(20, 16, 16);
            color: #fff;
            border: none;
            border-radius: 10px;
            text-align: center; 
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            cursor: pointer;
            font-style: italic;
            margin-top: 10px;
        }

        .login-btn {
            background: #1E3A8A;
            color: white;
        }

        .login-btn:hover {
            background: #142366;
        }

        .register-btn {
            background: red;
            color: white;
        }

        .register-btn:hover {
            background: darkred;
        }

        .text {
            font-size: 14px;
            font-style: italic;
            color: black;
            margin-top: 10px;
        }

        .message {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form method="POST">
            <!-- Display error message if any -->
            <div id="error-message" class="message">
                <?php 
                if (isset($_SESSION['error_message'])) {
                    echo $_SESSION['error_message'];
                    unset($_SESSION['error_message']);
                }
                ?>
            </div>

            <!-- Username input -->
            <input type="text" name="username" class="input-field" placeholder="Username" required>

            <!-- Password input -->
            <input type="password" name="password" class="input-field" placeholder="Password" required>

            <!-- Login button -->
            <button type="submit" class="btn login-btn">Log in</button>
        </form>

        <!-- Register and Home buttons -->
        <p class="text">Don't have an account?</p>
        <button class="btn register-btn" onclick="window.location.href='register.php'">Register</button>
        
    </div>
</body>
</html>