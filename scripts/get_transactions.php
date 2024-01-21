<?php
//Bank Statement Extraction
$chk_trns = "SELECT * FROM transactions WHERE Sender = '$accNo' OR Receiver = '$accNo' ORDER BY Date DESC, Time DESC";
$chk_trns_result = mysqli_query($conn, $chk_trns);
$trns = mysqli_fetch_all($chk_trns_result, MYSQLI_ASSOC);