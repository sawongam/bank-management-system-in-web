<?php
session_start();
if (!isset($_SESSION['AccNo'])) {
  header('Location: ../pages/login.php?msg=Please login to continue');
  exit;
}

require('../configs/db.php');

//Balance Extraction
$accNo = $_SESSION['AccNo'];
$sql = "SELECT Balance FROM balance WHERE AccNo = '$accNo'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$balance = $data['Balance'];

//Bank Statement Extraction
$chk_trns = "SELECT * FROM transactions WHERE Sender = '$accNo' OR Receiver = '$accNo'";
$chk_trns_result = mysqli_query($conn, $chk_trns);
$trns = mysqli_fetch_all($chk_trns_result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Bank Dashboard</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <style>
    body {
      background-color: #AFB3FF;
    }

    .dashboard {
      background-color: #fff;
      margin: 50px auto;
      padding: 30px;
      max-width: 800px;
      border-radius: 10px;
      box-shadow: 0 0 10px #999;
    }

    .account-info {
      background-color: #f7f7f7;
      padding: 20px;
      margin-bottom: 30px;
      border-radius: 5px;
    }

    .balance {
      font-size: 32px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .btn-primary {
      background-color: #AFB3FF;
      border: none;
    }

    .transaction {
      font-size: 0.9rem;
      line-height: 1.5;
    }
  </style>

</head>

<body>

  <div class="dashboard">

    <h1 class="text-center mb-5">Dashboard</h1>

    <div class="account-info">
      <h3>Account Info</h3>
      <p class="balance">Balance: Rs.
        <?php echo $balance ?>
      </p>
      <p>Account Number:
        <?php echo $accNo ?>
      </p>
    </div>

    <h3 class="mt-5">Transfer Funds</h3>

    <form action="../scripts/bal_transfer.php" method="POST">
      <div class="form-group">
        <label>To</label>
        <input type="text" class="form-control" name="receiver_accNo">
      </div>

      <div class="form-group">
        <label>Amount</label>
        <input type="number" class="form-control" name="amount">
      </div>

      <div class="form-group">
        <label for="Remarks">Remarks</label>
        <textarea class="form-control" name="remarks"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Transfer</button>
    </form>

    <h3>Transactions</h3>

    <div class="transactions">

      <?php
      foreach ($trns as $trn) {
        $date = $trn['Date'];
        $sender = $trn['Sender'];
        $receiver = $trn['Receiver'];
        $amount = $trn['Amount'];
        $remarks = $trn['Remarks'];
        if ($sender == $accNo) {
          echo "<div class='transaction'>
                <p>$date - Online transfer to $receiver - Rs. $amount</p>
              </div>";
        } else {
          echo "<div class='transaction'>
                <p>$date - Online transfer from $sender - Rs. $amount</p>
              </div>";
        }
      }
      ?>
    </div>

  </div>

</body>

</html>