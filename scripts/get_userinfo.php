<?php
//User Info Extraction
$accNo = $_SESSION['AccNo'];
$sql = "SELECT * FROM userinfo WHERE AccNo = '$accNo'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

$name = $data['Name'];
$fName = explode(' ', $name)[0];
$address = $data['Address'];
$email = $data['Email'];

