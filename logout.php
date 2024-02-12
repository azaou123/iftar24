<?php
// Start the session
session_start();

// Unset all session variables
$student['bourse'] = array();

// Destroy the session
session_destroy();

// Redirect to the main page
header("Location: index.php");
exit;
?>