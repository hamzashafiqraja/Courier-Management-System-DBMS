<?php
require_once "dbconnection.php";

if (isset($_REQUEST['submit'])) {
    $email = $_REQUEST['email'];

    $qry = "SELECT * FROM login WHERE email='$email'";
    $run = mysqli_query($dbcon, $qry);

    if (mysqli_num_rows($run) < 1) {
        echo "<script>
            alert('Email not found. Please try again.');
            window.location.href='resetpswd.php';
        </script>";
    } else {
        $data = mysqli_fetch_assoc($run);
        session_start();
        $_SESSION['gid'] = $data['u_id'];
        header("location: reset.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Reset Password</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body{
    margin:0;
    font-family: Arial, Helvetica, sans-serif;
    background:#f4f6f8;
}

/* Header */
.header{
    background:#2c3e50;
    color:#fff;
    padding:15px 30px;
}

.header h1{
    margin:0;
    text-align:center;
    font-size:28px;
}

.header p{
    text-align:center;
    font-size:14px;
    margin-top:5px;
    color:#ddd;
}

.header a{
    float:right;
    color:#fff;
    text-decoration:none;
    font-size:14px;
}

.header a:hover{
    text-decoration:underline;
}

/* Form box */
.form-box{
    max-width:420px;
    margin:80px auto;
    background:#fff;
    padding:30px;
    border:1px solid #ccc;
}

.form-box h2{
    text-align:center;
    margin-bottom:10px;
}

.form-box p{
    text-align:center;
    font-size:14px;
    color:#555;
}

label{
    font-weight:bold;
    font-size:14px;
}

input[type="email"]{
    width:100%;
    padding:10px;
    margin-top:5px;
    border:1px solid #ccc;
}

button{
    width:100%;
    padding:10px;
    margin-top:15px;
    background:#2c3e50;
    color:#fff;
    border:none;
    cursor:pointer;
}

button:hover{
    background:#000;
}

.register{
    text-align:center;
    margin-top:15px;
    font-size:13px;
}

.register a{
    text-decoration:none;
    color:#2c3e50;
    font-weight:bold;
}
</style>
</head>

<body>

<div class="header">
    <a href="index.php">Sign In</a>
    <h1>The Broken Saint</h1>
    <p>The Fastest Courier Service Ever</p>
</div>

<div class="form-box">
    <h2>Verify Your Email</h2>
    <p>Enter your registered email to reset password</p>

    <form method="post">
        <label>Email</label>
        <input type="email" name="email" required>

        <button type="submit" name="submit">Verify</button>
    </form>

    <div class="register">
        Don’t have an account? <a href="register.php">Register here</a>
    </div>
</div>

</body>
</html>
