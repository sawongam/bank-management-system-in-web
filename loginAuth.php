<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$databasename = "bms";
$conn = mysqli_connect($host, $dbusername, $dbpassword, $databasename);

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];
$submitted = $_POST['submit'];

if ($submitted) {
   $sql = "SELECT * from credentials where AccNo = '$username' AND Pass = '$password'";
   $result = mysqli_query($conn, $sql);
   $countUserPass = mysqli_num_rows($result);
   if ($countUserPass == 1) {
    header('Location: dashboard.php');
    exit;
   }
   else echo "failed";
}

?>

