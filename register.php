<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];

    $query = $conn->prepare("SELECT username FROM users WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $query->store_result();

    if ($query->num_rows > 0) {
        echo "<script>alert('Username already exists. Please choose another.'); window.history.back();</script>";
    } else {

        $insert = $conn->prepare("INSERT INTO users (username, password, dob, contact) VALUES (?, ?, ?, ?)");
        $insert->bind_param("ssss", $username, $password, $dob, $contact);

        if ($insert->execute()) {
            echo "<script>alert('Registration successful!'); window.location.href = 'signIn.php';</script>";
        } else {
            echo "Error: " . $insert->error;
        }

        $insert->close();
    }

    $query->close();
    $conn->close();
}
?>
