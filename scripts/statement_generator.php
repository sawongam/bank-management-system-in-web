<?php
session_start();
$accNo = $_SESSION['AccNo'];

require('../configs/db.php');

// Extract the transactions
$chk_trns = "SELECT * FROM transactions WHERE Sender = '$accNo' OR Receiver = '$accNo' ORDER BY Date DESC, Time DESC";
$chk_trns_result = mysqli_query($conn, $chk_trns);
$trns = mysqli_fetch_all($chk_trns_result, MYSQLI_ASSOC);

// Start output buffering
ob_start();

// Include the HTML code
include '../configs/statement_template.php';

// Get the HTML code from the output buffer
$html = ob_get_clean();

// Load Dompdf library
require_once '../vendor/autoload.php';

// Create an instance of Dompdf
$dompdf = new Dompdf\Dompdf();

// Load the HTML into Dompdf
$dompdf->loadHtml($html);

// Set the paper size to A4 and orientation to landscape
// $dompdf->setPaper('Letter', 'landscape');
$dompdf->setPaper('A4', 'portrait');
$dompdf->set_option('default_margin', 0);

// Render the HTML as PDF
$dompdf->render();

// Output the PDF as a download
$dompdf->stream("sawongam-bank-statement.pdf", array("Attachment" => true));
exit(0);
