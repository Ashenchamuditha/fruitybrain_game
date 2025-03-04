<?php
session_start();
if (!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'game'); // Update with your database credentials
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_username = $_POST['username'];
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if ($new_password == $confirm_password) {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        // Update user data
        $username = $_SESSION['username'];
        $sql = "UPDATE register SET username='$new_username', password='$hashed_password' WHERE username='$username'";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['username'] = $new_username;
            echo "<script>
                    alert('Profile updated successfully!');
                    window.location.href='home.php';
                  </script>";
        } else {
            echo "Error updating profile: " . $conn->error;
        }
    } else {
        echo "Passwords do not match!";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background: url("pic4.jpg") no-repeat center center fixed; /* Replace with your image path */
            background-size: cover; /* Ensure the background image covers the entire viewport */
        }
        .profile-container {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            height: 500px;
            background: rgba(0, 183, 255, 0.7);
            text-align: center;
        }
        .profile-container h2 {
            margin-bottom: 40px;
            font-size: 32px; /* Increase title font size */
        }
        .profile-container input {
            width: 90%;
            padding: 15px;
            margin-bottom: 25px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px; /* Increase input font size */
        }
        ::placeholder {
            font-size: 18px; /* Increase placeholder font size */
            font-family: Arial, sans-serif;
        }
        .profile-container button {
            width: 100%;
            padding: 20px;
            background: #28a745;
            color: #fff;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            font-size: 18px; /* Increase button font size */
        }
        .profile-container button:hover {
            background: #218838;
        }
        .back-button {
            width: 100%;
            padding: 15px;
            background: rgb(5, 52, 102);
            color: #fff;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 20px;
        }
        .back-button:hover {
            background: rgb(54, 71, 90);
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>Update Profile</h2>
        <form method="post" action="profile.php">
            <input type="text" name="username" placeholder="New Username" required>
            <input type="password" name="password" placeholder="New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Update</button>
        </form>
        <button class="back-button" onclick="window.location.href='home.php'">Back</button>
    </div>
</body>
</html>
