<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "user_management";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    
    $checkUserQuery = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $checkUserQuery->bind_param("s", $user);
    $checkUserQuery->execute();
    $checkUserQuery->store_result();

    if ($checkUserQuery->num_rows > 0) {
        echo "Username already taken. Please try another.";
    } else {
        
        $insertQuery = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $insertQuery->bind_param("ss", $user, $pass);

        if ($insertQuery->execute()) {
            echo "Registration successful!";
            header("Location: signIn.html"); 
            exit();
        } else {
            echo "Error: " . $insertQuery->error;
        }

        $insertQuery->close();
    }

    $checkUserQuery->close();
}

$conn->close();
?>
