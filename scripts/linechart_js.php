<?php
session_start();
if (!isset($_SESSION['AccNo'])) {
    header('Location: ../pages/login.php?msg=Please login to continue');
    exit;
}
$accNo = $_SESSION['AccNo'];

// Database Connection
require '../configs/db.php';

//Bank Statement Extraction
require_once 'get_transactions.php';

$curr_balances = [];
$currDate = [];
$bal_count = 0;

foreach ($trns as $trn) {
    if ($bal_count == 7) {
        break;
    }
    if ($trn['Sender'] == $accNo) {
        $bal_count++;
        $curr_balances[] = $trn['SenBalance'];
        $currDate[] = $trn['Date'];
    } else if ($trn['Receiver'] == $accNo) {
        $bal_count++;
        $curr_balances[] = $trn['RecBalance'];
        $currDate[] = $trn['Date'];
    }
}

$curr_balances = array_reverse($curr_balances);
$currDate = array_reverse($currDate);

echo json_encode(['currAmounts' => $curr_balances, 'currDate' => $currDate], );
