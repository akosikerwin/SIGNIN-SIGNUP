<?php
session_start();

// Redirect to home if already logged in
if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
  <div class="container">
    <h1>Sign Up</h1>
    <form action="register.php" method="POST">
      <input type="text" name="username" placeholder="Email or username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="date" name="dob" placeholder="Date of Birth" required>
      <input type="tel" name="contact" placeholder="Contact Number" pattern="[0-9]{10,15}" required>
      <button type="submit">Register</button>
    </form>
    <div class="sign-up">
      <p>Already have an account? <a href="signIn.php">Sign in</a></p>
    </div>
  </div>
</body>
</html>
