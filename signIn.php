<?php
session_start();

// If the user is already logged in, redirect to the home page
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
  <title>Sign In</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
  <div class="login-container">
    <div class="user-icon">
      <i class="fas fa-user"></i>
    </div>
    <h1>NourishAnalytics: Innovative Solutions for Child Malnutrition</h1>
    <h1>Sign In</h1>
    <form action="signIn.php" method="POST">
      <input type="text" name="username" placeholder="Email or username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Sign In</button>
    </form>
    <div class="sign-up">
      <p>Don't have an account? <a href="signUp.php">Sign up</a></p>
    </div>
  </div>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      include 'db_connect.php';

      $username = $_POST['username'];
      $password = $_POST['password'];

      // Check the credentials
      $query = $conn->prepare("SELECT password FROM users WHERE username = ?");
      $query->bind_param("s", $username);
      $query->execute();
      $query->bind_result($hashed_password);

      if ($query->fetch() && password_verify($password, $hashed_password)) {
          $_SESSION['username'] = $username;
          header("Location: home.php");
          exit();
      } else {
          echo "<p style='color: red; text-align: center;'>Invalid username or password.</p>";
      }

      $query->close();
      $conn->close();
  }
  ?>
</body>
</html>
