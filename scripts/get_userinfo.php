<?php
//User Info Extraction
$accNo = $_SESSION['AccNo'];
$sql = "SELECT Name FROM userinfo WHERE AccNo = '$accNo'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$name = $data['Name'];

// Splitting $name by space
$fName = explode(' ', $name)[0];

