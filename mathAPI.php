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
  <title>Fruity Brain Puzzle Game</title>
  <link rel="stylesheet" href="mathAPI.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: url('pic1.png.webp') no-repeat center center fixed; /* Add your background image here */
      background-size: cover;
      color: #333;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .header {
      width: 100%;
      position: absolute;
      top: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
    }

    .marks-container {
      font-size: 24px;
      color: black;
      font-weight: bold;
    }

    .profile-container {
      display: flex;
      align-items: center;
      flex-direction: column; /* Ensure the username is displayed below the profile icon */
    }

    .profile-icon {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      cursor: pointer;
      margin-bottom: 5px; /* Add a little space between the icon and the username */
    }

    .username {
      font-size: 20px;
      color: black;
      font-weight: bold;
    }

    .game-container {
      text-align: center;
      background-color: rgba(192, 233, 116, 0.9); /* Semi-transparent white background */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add a subtle shadow for depth */
      animation: fadeIn 1s ease-in-out; /* Fade-in effect */
      width: 80%; /* Adjust the width */
      max-width: 800px; /* Maximum width */
      height: 700px; /* Adjust the height as needed */
}
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    h1 {
      color: #2c3e50;
      font-size: 2.5em;
      margin-bottom: 5px;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); /* Add a subtle text shadow */
    }

    p {
      font-size: 1.2em;
      margin-bottom: 20px;
    }

    #puzzleImage {
      width: 100%;
      max-width: 700px; /* Make the puzzle image responsive */
      height: 360px; /* Adjust the height as needed */
      border-radius: 5px;
      margin-bottom: 15px;
}
    #timer {
      font-size: 1.2em;
      margin-bottom: 15px;
      color: #e74c3c;
      font-weight: bold;
    }

    input[type="number"] {
      padding: 10px;
      font-size: 1em;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 10px;
    }

    button {
      padding: 10px 20px;
      font-size: 1em;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin: 5px;
      transition: background-color 0.5s ease; /* Smooth transition for hover effect */
    }

    #checkButton {
      background-color: #2ecc71; /* Green */
      color: white;
    }

    #checkButton:hover {
      background-color: #27ae60;
    }

    #nextButton {
      background-color: #3498db; /* Blue */
      color: white;
    }

    #nextButton:hover {
      background-color: #2980b9;
    }

    #message {
      margin-top: 10px;
      font-size: 1.5em;
      color: #2c3e50;
    }
  </style>
</head>
<body>
  <div class="header">
    <div class="marks-container">
      Marks: <span id="userMarks">0</span>
    </div>
    <div class="profile-container">
      <img src="profile.jpeg" alt="Profile Icon" class="profile-icon" onclick="window.location.href='profile.php'">
      <span class="username"><?php echo $_SESSION['username']; ?></span>
    </div>
  </div>
  <div class="game-container">
    <h1>Math Quiz</h1>
    <p>Solve the puzzle before time runs out!</p>
    <img id="puzzleImage" alt="Puzzle Image">
    <div id="timer">Time Left: 60s</div>
    <input type="number" id="userAnswer" placeholder="Enter your answer">
    <br>
    <button id="checkButton">Check Answer</button>
    <button onclick="window.location.href='home.php'">Home</button>
    <button id="nextButton" disabled>Next</button>
    <div id="message"></div>
  </div>
  <script src="mathAPI.js"></script>
</body>
</html>
