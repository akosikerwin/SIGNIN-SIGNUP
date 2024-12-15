<?php
session_start();

// Check if the user is logged in; if not, redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: signIn.php");
    exit();
}

// Fetch the logged-in user's username
$username = htmlspecialchars($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Welcome to NourishAnalytics, <?php echo $username; ?>!</h1>
    <p>Your innovative solutions hub for tackling child malnutrition.</p>

    <div class="buttons">
      <a href="profile.php" class="btn">View Profile</a>
      <a href="dashboard.php" class="btn">Go to Dashboard</a>
      <a href="logout.php" class="btn logout">Log Out</a>
    </div>
  </div>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, #2E3192, #1BFFFF);
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      text-align: center;
      background: rgba(46, 49, 146, 0.8);
      padding: 20px 40px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h1 {
      font-size: 28px;
      margin-bottom: 10px;
      color: #fff;
    }

    p {
      font-size: 18px;
      margin-bottom: 20px;
    }

    .buttons {
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .btn {
      padding: 10px 20px;
      text-decoration: none;
      color: white;
      background-color: #333;
      border-radius: 5px;
      font-size: 16px;
      transition: background-color 0.3s;
    }

    .btn:hover {
      background-color: #555;
    }

    .logout {
      background-color: #E63946;
    }

    .logout:hover {
      background-color: #D62828;
    }
  </style>
</body>
</html>
