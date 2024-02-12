<?php
include 'Database.php';

$db = Database::getInstance();
$conn = $db->getConnection();

// Form fields
$message = $_POST["message"];
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];

// Insert data into the database
$sql = "INSERT INTO contact_messages (message, name, email, subject)
        VALUES ('$message', '$name', '$email', '$subject')";

if ($conn->query($sql) === TRUE) {
    // Successful insertion
    session_start();
    $student['bourse']['success_message'] = "Message sent successfully";
    header("Location: ../contact.php");
    exit();
} else {
    // Error during insertion
    session_start();
    $student['bourse']['error_message'] = "Error: " . $sql . "<br>" . $conn->error;
    header("Location: ../contact.php");
    exit();
}

$conn->close();
?>
