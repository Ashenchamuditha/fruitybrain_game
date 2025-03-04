<?php
session_start();

if (!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruity Brain</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url("pic1.png.webp"); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .profile-container {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            cursor: pointer;
        }

        .username {
            margin-top: 10px;
            font-size: 20px;
            color: white ;
            font-size: 35px; 
            font-weight: bold;
        }

        .container {
            background: rgba(0, 183, 255, 0.7);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 40%; /* Adjust the width as needed */
            height: 400px; /* Adjust the height as needed */
        }

        h1 {
            color: black;
            font-weight: bold;
            font-size: 56px;
        }

        .btn {
            display: block;
            width: 50%;
            margin: 25px auto;
            padding: 20px;
            font-size: 18px;
            background: #6a5acd;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn:hover {
            background: #4b3fad;
        }

        .logout {
            background: red;
            color: white;
            font-style:normal;
            width: 90%;
        }

        .logout:hover {
            background: darkred;
        }
        @media (max-width: 768px) 
        {
            .profile-container {
                top: 10px; /* Adjust top position for smaller screens */
                right: 10px; /* Adjust right position for smaller screens */
            }
        }
        @media (max-width: 480px) {
            .profile-container {
                top: 5px; /* Adjust top position for very small screens */
                right: 5px; /* Adjust right position for very small screens */
            }
        }
        
    </style>
</head>
<body>
    <div class="profile-container">
        <img src="profile.jpeg" alt="Profile Icon" class="profile-icon" onclick="window.location.href='profile.php'">
        <span class="username"><?php echo $_SESSION['username']; ?></span>
    </div>
    <div class="container">
        <h1>Fruity Brain</h1>
        <!--<p style="font-size: 24px; color: brown;">You are logged in as <?php echo $_SESSION['username']; ?></p>-->

        <button class="btn" onclick="window.location.href='mathAPI.php'">Start Game</button>
        
        <button class="btn" onclick="window.location.href='scorebord.php'">Score Board</button>
        <button class="btn logout" onclick="window.location.href='logout.php'">Logout</button>
    </div>
</body>
</html>
