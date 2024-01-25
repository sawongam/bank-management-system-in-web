<?php
session_start();
require('../configs/db.php');

if (!isset($_POST['change'])) {
    header('Location: ../pages/dashboard/settings.php?msg=Please send a query');
    exit;
}

$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];

if (empty($name) || empty($email) || empty($address)) {
    header('Location: ../pages/dashboard/settings.php?msg=Please fill all the fields');
    exit;
}

$sql = "UPDATE userinfo SET Name='$name', Email='$email', Address='$address' WHERE AccNo =" . $_SESSION['AccNo'];
$update_sql = mysqli_query($conn, $sql);
if (!$update_sql) {
    header('Location: ../pages/dashboard/settings.php?msg=Account info change failed');
    exit;
}

header('Location: ../pages/dashboard/settings.php?msg=Account info changed successfully');
exit;
