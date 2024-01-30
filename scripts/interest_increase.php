<?php
// Needs a cron job to run this script every month/day
require('../configs/db.php');

$sql = "SELECT AccNo, Balance, Interest FROM balance";
$result = mysqli_query($conn, $sql);

$interest_rate = 0.0609;

while ($row = mysqli_fetch_assoc($result)) {
    $accNo = $row['AccNo'];
    $balance = $row['Balance'];
    $total_interest = $row['Interest'];

    $interest = $balance * $interest_rate;
    $new_balance = $balance + $interest;
    $new_total_interest = $total_interest + $interest;

    $sql = "UPDATE balance SET Balance = '$new_balance', Interest = '$new_total_interest'  WHERE AccNo = '$accNo'";
    mysqli_query($conn, $sql);
}