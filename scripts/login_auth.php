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

if (!$result) {
   header('Location: ../pages/login.php?msg=Cannot connect to database');
   exit;
}

$data = mysqli_fetch_assoc($result);
$hashed_password = $data['Pass'];

if (password_verify($password, $hashed_password)) {
   session_start();
   $_SESSION['AccNo'] = $data['AccNo'];
   header('Location: ../pages/dashboard.php');
} else {
   header('Location: ../pages/login.php?msg=Invalid Credentials');
}