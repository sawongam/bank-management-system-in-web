<?php
session_start();
if (!isset($_SESSION['AccNo'])) {
    header('Location: ../pages/login.php');
    exit;
}

require('../configs/db.php');

$AccNo = $_SESSION['AccNo'];
$sql = "SELECT * FROM balance WHERE AccNo = '$AccNo'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$balance = $data['Balance'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h1>Welcome to Sawongam Bank</h1>
    <p>Your account balance is <?php echo $balance?></p>
    <a href="../scripts/logout.php">Logout</a>
</body>

</html>