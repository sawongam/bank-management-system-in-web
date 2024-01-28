<?php
session_start();
if (!isset($_SESSION['AccNo'])) {
    header('Location: ../pages/login.php?msg=Please login to continue');
    exit;
}

// Database Connection
require '../configs/db.php';

//Doughtnut Data
$totalDebit = 0;
$totalCredit = 0;
$accNo = $_SESSION['AccNo'];

require_once 'get_transactions.php';

foreach ($trns as $trn) {
    if ($trn['Sender'] == $accNo) {
        $totalDebit += $trn['Amount'];
    } else if ($trn['Receiver'] == $accNo) {
        $totalCredit += $trn['Amount'];
    }
}

echo json_encode(['totalCredit' => $totalCredit, 'totalDebit' => $totalDebit]);
