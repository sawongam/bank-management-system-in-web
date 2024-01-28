<?php
session_start();
if (!isset($_SESSION['AccNo'])) {
    header('Location: ../pages/login.php?msg=Please login to continue');
    exit;
}

if (!isset($_POST['submit'])) {
    header('Location: ../pages/dashboard/index.php?msg=Please make the transaction');
    exit;
}

require('../configs/db.php');

$receiver_accNo = $_POST['receiver_accNo'];
$amount = $_POST['amount'];
$remarks = $_POST['remarks'];
$sender_accNo = $_SESSION['AccNo'];

//  Check the referrer
$referrer_raw = basename($_SERVER['HTTP_REFERER']);
$referrer = explode('?', $referrer_raw)[0];

//Check Sender's Balance
$chk_bal = "SELECT Balance FROM balance WHERE AccNo = '$sender_accNo'";
$chk_bal_result = mysqli_query($conn, $chk_bal);
$sender_balance = mysqli_fetch_assoc($chk_bal_result)['Balance'];
if ($sender_balance < $amount) {
    // Check if the referrer is index.php or transfer.php
    if ($referrer == 'index.php') {
        header('Location: ../pages/dashboard/index.php?msg=Insufficient Balance');
    } else if ($referrer == 'transfer.php') {
        header('Location: ../pages/dashboard/transfer.php?msg=Insufficient Balance');
    }

    exit;
}

//Check Receiver's Account existence
$chk_acc = "SELECT AccNo FROM credentials WHERE AccNo = '$receiver_accNo'";
$chk_acc_result = mysqli_query($conn, $chk_acc);
if (mysqli_num_rows($chk_acc_result) == 0 || $receiver_accNo == $sender_accNo) {
    // Check if the referrer is index.php or transfer.php
    if ($referrer == 'index.php') {
        header('Location: ../pages/dashboard/index.php?msg=Invalid Account Number');
    } else if ($referrer == 'transfer.php') {
        header('Location: ../pages/dashboard/transfer.php?msg=Invalid Account Number');
    }

    exit;
}

$receiver_balance = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Balance FROM balance WHERE AccNo = '$receiver_accNo'"))['Balance'];

//Transfer
$sender_balance -= $amount;
$receiver_balance += $amount;

//Get the current Balance
$curr_sen_balance = $sender_balance;
$curr_rec_balance = $receiver_balance;

//Update Sender's Balance
$update_sender_balance = "UPDATE balance SET Balance = '$sender_balance' WHERE AccNo = '$sender_accNo'";
$update_sender_balance_result = mysqli_query($conn, $update_sender_balance);

//Update Receiver's Balance
$update_receiver_balance = "UPDATE balance SET Balance = '$receiver_balance' WHERE AccNo = '$receiver_accNo'";
$update_receiver_balance_result = mysqli_query($conn, $update_receiver_balance);

//Insert into Transactions
$insert_transaction = "INSERT INTO transactions (Sender, Receiver, Amount, Remarks, SenBalance, RecBalance) VALUES ('$sender_accNo', '$receiver_accNo', '$amount', '$remarks', '$curr_sen_balance', '$curr_rec_balance')";
$insert_transaction_result = mysqli_query($conn, $insert_transaction);

// Check if the referrer is index.php or transfer.php
if ($referrer == 'index.php') {
    header('Location: ../pages/dashboard/index.php?msg=Transaction Successful');
} else if ($referrer == 'transfer.php') {
    header('Location: ../pages/dashboard/transfer.php?msg=Transaction Successful');
}

exit;