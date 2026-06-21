<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('location: ../index.php');
    exit();
}
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pricing</title>

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #f4f6f8;
        margin: 0;
    }

    .container {
        margin-top: 40px;
        text-align: center;
    }

    h2 {
        margin-bottom: 20px;
        color: #333;
    }

    table {
        width: 45%;
        margin: auto;
        border-collapse: collapse;
        background-color: #ffffff;
    }

    th, td {
        border: 1px solid #dcdcdc;
        padding: 12px;
        font-size: 15px;
    }

    th {
        background-color: #2f80ed;
        color: #ffffff;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .note {
        margin-top: 30px;
        font-weight: bold;
        color: #444;
    }

    .payment {
        width: 45%;
        margin: 10px auto;
        text-align: left;
        font-size: 15px;
    }

    .payment ol {
        padding-left: 20px;
    }

    @media (max-width: 768px) {
        table, .payment {
            width: 90%;
        }
    }
</style>
</head>

<body>

<div class="container">

    <h2>Courier Pricing</h2>

    <table>
        <tr>
            <th>Weight (Kg)</th>
            <th>Price (Rs)</th>
        </tr>
        <tr><td>0 – 1</td><td>120</td></tr>
        <tr><td>1 – 2</td><td>200</td></tr>
        <tr><td>2 – 4</td><td>250</td></tr>
        <tr><td>4 – 5</td><td>300</td></tr>
        <tr><td>5 – 7</td><td>400</td></tr>
        <tr><td>7 & Above</td><td>500</td></tr>
    </table>

    <p class="note">Pay the amount according to your courier weight:</p>

    <div class="payment">
        <ol>
            <li>Allide Bank: IBAN 12345678901234567890</li>
            <li>Easypasa NO: 03126539801</li>
            <li>GPay: 3565656555</li>
        </ol>
    </div>

</div>

</body>
</html>
