<?php
if (!isset($_POST['send'])) {
    header('Location: ../pages/dashboard/support.php?msg=Please send a query');
    exit;
}

$query = $_POST['signature'];
$email_to = "info@sangamadhikari.com";
$subject = "BMS Customer Query";
$headers = "From: support@bms.com";

// Send the email
if (mail($email_to, $subject, $query, $headers)) {
    header('Location: ../pages/dashboard/support.php?msg=Email sent successfully');
} else {
    header('Location: ../pages/dashboard/support.php?msg=Email sending failed');
}