<?php
if (!isset($_POST['submit'])) {
   header('Location: ../pages/login.php');
   exit;
}

require('../configs/db.php');

$accNo = $_POST['accountNumber'];
$password = $_POST['password'];

$sql = "SELECT * FROM credentials WHERE AccNo = '$accNo'";
$result = mysqli_query($conn, $sql);

// Check if the account number exists in the database
if (!$result) {
   header('Location: ../pages/login.php?msg=Cannot connect to database');
   exit;
}

$data = mysqli_fetch_assoc($result);
// Verify the password
if ($data) {
    $hashed_password = $data['Pass'];

    if (password_verify($password, $hashed_password)) {
       session_start();
       $_SESSION['AccNo'] = $data['AccNo'];
       header('Location: ../pages/dashboard/index.php');
       exit;
    } else {
       header('Location: ../pages/login.php?msg=Invalid Credentials');
       exit;
    }
} else {
    // Redirect to the login page with an error message if the account number doesn't exist
    header('Location: ../pages/login.php?msg=Account number does not exist');
    exit;
}