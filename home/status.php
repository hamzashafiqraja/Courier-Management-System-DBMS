<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location: ../login.php');
    exit();
}

include('header.php');
include('../dbconnection.php');

$idd = $_GET['sidd'];
$qryy = "SELECT * FROM `courier` WHERE `c_id`='$idd'";
$run = mysqli_query($dbcon, $qryy);
$data = mysqli_fetch_assoc($run);

$stdate = $data['date'];
$tddate = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Courier Status</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f0f2f5;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        margin: 0;
        padding: 0;
    }

    .status-box {
        text-align: center;
        padding: 40px 30px;
        border-radius: 15px;
        width: 90%;
        max-width: 600px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        color: #fff;
        font-size: 1.5rem;
        margin-top: 50px;
        animation: fadeIn 1s ease;
    }

    .status-onway {
        background-color: #ff6b6b; /* red-orange */
    }

    .status-delivered {
        background-color: #28a745; /* green */
    }

    .status-box p {
        margin-top: 10px;
        font-size: 1.2rem;
        font-weight: 500;
    }

    .btn-back {
        margin-top: 30px;
        padding: 15px 30px;
        font-size: 1rem;
        font-weight: bold;
        border: none;
        border-radius: 10px;
        background: #007bff;
        color: #fff;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        background: #0056b3;
        transform: translateY(-2px);
    }

        .btn-back {
            padding: 12px 25px;
            font-size: 0.9rem;
        }
    }
</style>
</head>
<body>

<?php if($stdate == $tddate){ ?>
    <div class="status-box status-onway">
        Status: <strong>On The Way...</strong>
        <p>Your courier is on the way. Hang tight!</p>
        <button class="btn-back" onclick="window.location.href='trackMenu.php'">Go Back</button>
    </div>
<?php } else { ?>
    <div class="status-box status-delivered">
        Status: <strong>Delivered</strong>
        <p>Items delivered successfully. Have a nice day!</p>
        <button class="btn-back" onclick="window.location.href='trackMenu.php'">Go Back</button>
    </div>
<?php } ?>

</body>
</html>
