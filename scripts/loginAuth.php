<!-- <?php
require('process/db.php');

$username = $_POST['username'];
$password = $_POST['password'];
$submitted = $_POST['submit'];

if ($submitted) {
   $sql = "SELECT * FROM credentials WHERE AccNo = '$username' AND Pass = '$password'";
   $result = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($result);
   $countUserPass = mysqli_num_rows($result);
   if ($countUserPass == 1) {
      session_start();
      $_SESSION['AccNo'] = $data['AccNo'];
      header('Location: dashboard.php');
   } else
      header('Location: index.php?msg=Invalid Credentials');
}

?> -->