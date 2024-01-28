<?php
if (!isset($_POST['submit'])) {
    header('Location: ../pages/register.php');
    exit;
}

require('../configs/db.php');

$fullname = $_POST['fullName'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

//Check for Duplicate Account
$sql_dupCheck = "SELECT * FROM userinfo WHERE Email = '$email'";
$result_dubCheck = mysqli_query($conn, $sql_dupCheck);
//Database Connection Check
if (!$result_dubCheck) {
    header('Location: ../pages/register.php?msg=Cannot connect to database');
    exit;
}
$dubCount = mysqli_num_rows($result_dubCheck);
if ($dubCount != 0) {
    header('Location: ../pages/register.php?msg=Account Already Exists');
    exit;
}

//Generate a Account Number
$sql_genCreds = "INSERT INTO credentials (AccNo, Pass) VALUES (NULL, '$password')";
$result_genCreds = mysqli_query($conn, $sql_genCreds);

//Retrieve the generated Account Number
$sql_getAccNo = "SELECT AccNo FROM credentials ORDER BY AccNo DESC LIMIT 1";
$result_getAccNo = mysqli_query($conn, $sql_getAccNo);
$accNo = mysqli_fetch_assoc($result_getAccNo)['AccNo'];

//Generate Balance for the Account
$sql_genBal = "INSERT INTO balance (AccNo, Balance) VALUES ('$accNo', '69')";
$result_genBal = mysqli_query($conn, $sql_genBal);

//Save the User Info for the Account
$sql_saveUserInfo = "INSERT into userinfo (AccNo, Name, Address, Email) VALUES ('$accNo', '$fullname', '$address', '$email')";
$result_saveUserInfo = mysqli_query($conn, $sql_saveUserInfo);

session_start();
$_SESSION['AccNo'] = $accNo;
header('Location: ../pages/dashboard/index.php');