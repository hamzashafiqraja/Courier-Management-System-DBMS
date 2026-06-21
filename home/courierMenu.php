<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('location: ../index.php');
    exit();
}
include('header.php');

$email = $_SESSION['emm'];
$uid = $_SESSION['uid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Place Courier Order</title>

<style>
    body {
        background-color: #566777;
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        
    }

    .form-container {
        width: 70%;
        margin: 40px auto;
        background-color: #7d8db5;
        padding: 25px;
        border: 1px solid #ddd;
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #010101;
        font-size: 40px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        text-align: left;
        padding: 10px;
        background-color: #f1f1f1;
        font-size: 16px;
    }

    td {
        padding: 10px;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"],
    input[type="file"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    input[readonly] {
        background-color: #f9f9f9;
    }

    .divider {
        height: 1px;
        background-color: #ddd;
        margin: 20px 0;
    }

    .submit-btn {
        background-color: #2f80ed;
        color: white;
        border: none;
        padding: 10px 30px;
        font-size: 15px;
        cursor: pointer;
    }

    .submit-btn:hover {
        background-color: #1c63c7;
    }

    @media (max-width: 768px) {
        .form-container {
            width: 95%;
        }
    }
    
</style>
</head>

<body>

<form action="courierMenu.php" method="POST" enctype="multipart/form-data">
    <div class="form-container">

        <h2>Courier Order Details</h2>

        <table>
            <tr>
                <th colspan="2">Sender Details</th>
                <th colspan="2">Receiver Details</th>
            </tr>

            <tr>
                <td>Name</td>
                <td><input type="text" name="sname" required></td>

                <td>Name</td>
                <td><input type="text" name="rname" required></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type="text" name="semail" value="<?php echo $email; ?>" readonly></td>

                <td>Email</td>
                <td><input type="text" name="remail" required></td>
            </tr>

            <tr>
                <td>Phone</td>
                <td><input type="number" name="sphone" required></td>

                <td>Phone</td>
                <td><input type="number" name="rphone" required></td>
            </tr>

            <tr>
                <td>Address</td>
                <td><input type="text" name="saddress" required></td>

                <td>Address</td>
                <td><input type="text" name="raddress" required></td>
            </tr>
        </table>

        <div class="divider"></div>

        <table>
            <tr>
                <td>Weight (Kg)</td>
                <td><input type="number" name="wgt" required></td>

                <td>Payment ID</td>
                <td><input type="number" name="billno" required></td>
            </tr>

            <tr>
                <td>Date</td>
                <td><input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly></td>

                <td>Item Image</td>
                <td><input type="file" name="simg"></td>
            </tr>
        </table>

        <div style="text-align:center; margin-top:25px;">
            <input type="submit" name="submit" value="Place Order" class="submit-btn">
        </div>

    </div>
</form>

</body>
</html>
<?php
if (isset($_POST['submit'])) {

    include('../dbconnection.php');

    $sname  = $_POST['sname'];
    $rname  = $_POST['rname'];
    $semail = $_POST['semail'];
    $remail = $_POST['remail'];
    $sphone = $_POST['sphone'];
    $rphone = $_POST['rphone'];
    $sadd   = $_POST['saddress'];
    $radd   = $_POST['raddress'];
    $wgt    = $_POST['wgt'];
    $billn  = $_POST['billno'];

    $originalDate = $_POST['date'];
    $newDate = date("Y-m-d", strtotime($originalDate));

    $imagenam = $_FILES['simg']['name'];
    $tempnam  = $_FILES['simg']['tmp_name'];

    if (!empty($imagenam)) {
        move_uploaded_file($tempnam, "../dbimages/$imagenam");
    }

    $qry = "INSERT INTO courier 
            (sname, rname, semail, remail, sphone, rphone, saddress, raddress, weight, billno, image, date, u_id)
            VALUES
            ('$sname','$rname','$semail','$remail','$sphone','$rphone','$sadd','$radd','$wgt','$billn','$imagenam','$newDate','$uid')";

    $run = mysqli_query($dbcon, $qry);

    if ($run) {
        echo "
        <script>
            alert('Order Placed Successfully :)');
            window.location.href='courierMenu.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Something went wrong!');
        </script>";
    }
}
?>
