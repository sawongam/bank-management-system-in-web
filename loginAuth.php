<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = ""; 
$databasename = "bms";
$conn = mysqli_connect($host,$dbusername,$dbpassword,$databasename);

$username = $_POST['username'];
$password = $_POST['password'];
$submitted = $_POST['submit'];

if($submitted) {
    
} else {
    echo("s");
}

?>