<?php
$servername = "localhost";
$username ="root";
$password = "";
$database = "your_database_name";
 
$conn = new mysqli($servername, $username,$password, $database);
 
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
 
    $sql = "INSERT INTO your_table_name (name,email) VALUES ('$name', '$email')";
 
    if ($conn-> query($sql) === TRUE){
        echo "New record created successfully";
        else{
            echo "Error: " . $sql . "<br>" . $conn-error;
        }
    }  
}
$conn->close();
?>
