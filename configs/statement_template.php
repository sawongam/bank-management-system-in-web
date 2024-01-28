<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Statement</title>
    <style>
        html {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #4e73df;
            margin: 0;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            max-width: 675px;
            width: 100%;
            background-color: #ebefff;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h2 {
            font-size: 30px;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .header p {
            margin: 0px !important;
        }

        .logo {
            max-width: 100px;
            margin-bottom: 15px;
        }

        h3 {
            color: #4e73df;
        }

        .statement {
            width: 100%;
            border-collapse: collapse;
            margin-top: 0px;
        }

        .statement th,
        .statement td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }

        .statement th {
            background-color: #4e73df;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:hover {
            background-color: #e2e6ea;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="header">
            <img src="../assets/img/logo.png" alt="Bank Logo" class="logo">
            <h2>Sawongam Bank Ltd</h2>
            <p>Putting fun
                in funds
                since 1969</p>
        </div>
        <h3>Bank Statement</h3>
        <table class="statement">
            <thead>
                <tr>
                    <th>Transaction Type</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Remarks</th>
                    <th>Transaction Date</th>
                    <th>Transaction Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($trns as $trn) {
                    $date = $trn['Date'];
                    $sender = $trn['Sender'];
                    $receiver = $trn['Receiver'];
                    $amount = $trn['Amount'];
                    $remarks = $trn['Remarks'];
                    $time = $trn['Time'];
                    if ($trn['Sender'] == $accNo) {
                        echo "<tr>
                        <td>Debit</td>
                        <td>Transfer to $receiver</td>
                        <td>Rs. $amount</td>
                        <td>$remarks</td>
                        <td>$date</td>
                        <td>$time</td>
                        </tr>";
                    } else {
                        echo "<tr>
                        <td>Credit</td>
                        <td>Transfer from $receiver</td>
                        <td>Rs. $amount</td>
                        <td>$remarks</td>
                        <td>$date</td>
                        <td>$time</td>
                        </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>