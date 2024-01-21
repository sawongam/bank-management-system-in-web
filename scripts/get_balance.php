<?php
//Balance Extraction
$accNo = $_SESSION['AccNo'];
$sql = "SELECT Balance FROM balance WHERE AccNo = '$accNo'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$balance = $data['Balance'];

