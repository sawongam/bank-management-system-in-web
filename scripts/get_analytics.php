<?php
// Analytics Extraction
require 'get_interest.php';

$totalDebit = 0;
$totalCredit = 0 + $interest;

require_once 'get_transactions.php';
foreach ($trns as $trn) {
    if ($trn['Sender'] == $accNo) {
        $totalDebit += $trn['Amount'];
    } else if ($trn['Receiver'] == $accNo) {
        $totalCredit += $trn['Amount'];
    }
}