<?php
include('dbconnection.php');
session_start();
$gd = $_SESSION['gid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Set New Password</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body{
    margin:0;
    font-family: Arial, Helvetica, sans-serif;
    background:#f4f6f8;
}

/* Center box */
.reset-box{
    max-width:420px;
    margin:100px auto;
    background:#fff;
    padding:30px;
    border:1px solid #ccc;
    border-radius:8px;
}

/* Heading */
.reset-box h2{
    text-align:center;
    font-size:20px;
    margin-bottom:20px;
}

/* Label */
label{
    font-weight:bold;
    display:block;
    margin-bottom:5px;
}

/* Input */
input[type="password"]{
    width:100%;
    padding:10px;
    border:1px solid #ccc;
    font-size:15px;
}

/* Button */
button{
    width:100%;
    margin-top:20px;
    padding:12px;
    background:#e74c3c;
    color:#fff;
    border:none;
    font-size:16px;
    cursor:pointer;
    border-radius:5px;
}

button:hover{
    background:#c0392b;
}
</style>
</head>

<body>

<div class="reset-box">
    <h2>To chalo new password daalo  😂</h2>

    <form method="POST">
        <label>New Password</label>
        <input type="password" name="pass" placeholder="Enter new password" required>

        <button type="submit" name="submit">Update Password</button>
    </form>
</div>

</body>
</html>

<?php
if (isset($_POST['submit'])) {

    $password = $_POST['pass'];

    $qryd = "UPDATE login SET password='$password' WHERE u_id='$gd'";
    $run = mysqli_query($dbcon, $qryd);

    if ($run) {
        echo "<script>
            alert('Password Updated Successfully :)');
            window.location.href='logout.php';
        </script>";
    }
}
?>
