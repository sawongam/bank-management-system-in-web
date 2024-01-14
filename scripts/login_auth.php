<?php
if (!isset($_POST['submit'])) {
   header('Location: ../pages/login.php');
   exit;
}

require('../configs/db.php');

$accNo = $_POST['accountNumber'];
$password = $_POST['password'];

$sql = "SELECT * FROM credentials WHERE AccNo = '$accNo' AND Pass = '$password'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$countUserPass = mysqli_num_rows($result);
if ($countUserPass == 1) {
   session_start();
   $_SESSION['AccNo'] = $data['AccNo'];
   header('Location: ../pages/dashboard.php');
} else {
   header('Location: ../pages/login.php?msg=Invalid Credentials');
}
?>