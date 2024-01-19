<?php
session_start();
if (!isset($_SESSION['AccNo'])) {
    header('Location: ../pages/login.php?msg=Please login to continue');
    exit;
}

require('../configs/db.php');

$accNo = $_SESSION['AccNo'];
$sql = "SELECT * FROM balance WHERE AccNo = '$accNo'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$balance = $data['Balance'];
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sawongam Bank</title>
    <link rel="icon" href="../assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #AFB3FF;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .balance {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        .logout {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to Sawongam Bank</h1>
        <div class="balance">Your account balance is <?php echo $balance ?></div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">View Account Info</h5>
                        <p class="card-text">View your account information.</p>
                        <a href="#" class="btn btn-primary">Go to Account Info</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Transfer Balance</h5>
                        <p class="card-text">Transfer balance to another account.</p>
                        <a href="#" class="btn btn-primary">Go to Transfer Balance</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">View Transactions</h5>
                        <p class="card-text">View your transaction history.</p>
                        <a href="#" class="btn btn-primary">Go to Transactions</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Other Functionality</h5>
                        <p class="card-text">Explore other features of the bank system.</p>
                        <a href="#" class="btn btn-primary">Go to Other Functionality</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="logout">
            <a href="../scripts/logout.php">Logout</a>
        </div>
    </div>
</body>

</html> -->


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
    <p class="balance">Balance: Rs. <?php echo $balance ?></p>
    <p>Account Number: <?php echo $accNo ?></p>    
  </div>

  <h3>Transactions</h3>
  
  <div class="transactions">
  
    <div class="transaction">
      <p>01/15/2024 - Online transfer to Jack - $500</p>
    </div>

    <div class="transaction">
      <p>01/10/2024 - ATM withdrawal - $200</p>
    </div>

    <div class="transaction">  
      <p>01/05/2024 - Deposit - $1,000</p>
    </div>
    
    <div class="transaction">
      <p>01/01/2024 - Opening balance - $1,500</p>
    </div>
    
  </div>

  <h3 class="mt-5">Transfer Funds</h3>
  
  <form>
    <div class="form-group">
      <label>To</label>
      <input type="text" class="form-control">
    </div>
    
    <div class="form-group">
      <label>Amount</label>
      <input type="number" class="form-control">  
    </div>
    
    <button type="submit" class="btn btn-primary">Transfer</button>
  </form>

</div>

</body>
</html>