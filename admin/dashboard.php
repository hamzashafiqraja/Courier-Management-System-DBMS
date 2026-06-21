<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location: ../login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
body{
    margin:0;
    font-family: Arial, Helvetica, sans-serif;
    background:#f4f6f8;
    color:#333;
}

/* Header */
.header{
    background:#2c3e50;
    color:#fff;
    padding:15px 30px;
}

.header a{
    color:#fff;
    text-decoration:none;
    margin:0 10px;
    font-size:14px;
}

.header a:hover{
    text-decoration:underline;
}

.header h1{
    text-align:center;
    margin:10px 0 0;
    font-size:26px;
}

/* Dashboard */
.dashboard{
    max-width:900px;
    margin:60px auto;
    padding:20px;
}

/* Options */
.option{
    background:#fff;
    border:1px solid #ddd;
    padding:25px;
    margin-bottom:20px;
    text-align:center;
}

.option a{
    text-decoration:none;
    color:#2c3e50;
    font-size:20px;
    font-weight:bold;
}

.option a i{
    display:block;
    font-size:30px;
    margin-bottom:10px;
    color:#2980b9;
}

.option a:hover{
    color:#000;
}

/* Footer info */
.info{
    text-align:center;
    font-size:13px;
    color:#777;
    margin-top:40px;
}
</style>
</head>

<body>

<div class="header">
    <a href="../index.php"><i class="fas fa-user"></i> Login As User</a>
    <a href="logout.php" style="float:right;"><i class="fas fa-sign-out-alt"></i> Logout</a>
    <h1>Admin Dashboard</h1>
</div>

<div class="dashboard">

    <!-- NEW OPTION -->
    <div class="option">
        <a href="viewcourier.php">
            <i class="fas fa-box"></i>
            View All Couriers
        </a>
    </div>

    <div class="option">
        <a href="deletedata.php">
            <i class="fas fa-trash"></i>
            Delete Courier Data
        </a>
    </div>

    <div class="option">
        <a href="deleteusers.php">
            <i class="fas fa-user-times"></i>
            Delete Users
        </a>
    </div>

</div>

<div class="info">
    Admin Access Only
</div>

</body>
</html>
