<?php
session_start();
if (!isset($_SESSION['AccNo'])) {
    header('Location: ../login.php?msg=Please login to continue');
    exit;
}

// Generate the statement
$statement = "Account Number: " . $_SESSION['AccNo'] . "\n";
$statement .= "Full Name: " . $_SESSION['name'] . "\n";
$statement .= "Address: " . $_SESSION['address'] . "\n";
$statement .= "Email: " . $_SESSION['email'] . "\n";

// Set the headers to tell the browser to download the file
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="statement.txt"');

// Output the statement
echo $statement;