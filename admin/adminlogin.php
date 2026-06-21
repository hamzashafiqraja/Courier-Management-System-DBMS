<?php
session_start();
include('../dbconnection.php');

if (isset($_SESSION['uid'])) { header("location: dashboard.php"); exit(); }

$error = "";
if (isset($_POST['login'])) {
    $result = mysqli_query($dbcon, "SELECT * FROM adlogin WHERE email='$_POST[email]' AND password='$_POST[password]'");
    if (mysqli_num_rows($result) < 1) {
        $error = "Only admin can login";
    } else {
        $_SESSION['uid'] = mysqli_fetch_assoc($result)['a_id'];
        header("location: dashboard.php"); exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box}
body{margin:0;font-family:'Poppins',sans-serif;background:linear-gradient(135deg,#2A6EBB,#1A4B8C);min-height:100vh;display:flex;align-items:center;justify-content:center}
.back-home{position:absolute;top:20px;right:30px;color:#fff;text-decoration:none}
.login-box{width:100%;max-width:420px;background:#fff;padding:40px;border-radius:18px;box-shadow:0 20px 40px rgba(0,0,0,0.2)}
.login-box h2{text-align:center;color:#1c38a8;font-size:36px}
.login-box p{text-align:center;color:#1737b6}
.alert{background:#ffe6e6;color:#c0392b;padding:10px;border-radius:8px;margin-bottom:15px;text-align:center}
.form-group{margin-bottom:20px;position:relative}
.form-group i{position:absolute;top:50%;left:15px;transform:translateY(-50%);color:#777}
.form-control{width:100%;height:50px;padding-left:45px;border-radius:10px;border:1px solid #ccc}
.btn-login{width:100%;height:50px;border:none;border-radius:10px;background:linear-gradient(135deg,#2A6EBB,#1A4B8C);color:#fff;font-size:16px;cursor:pointer}
</style>
</head>
<body>

<a href="../index.php" class="back-home">← Back to Home</a>

<div class="login-box">
    <h2>Admin Login</h2>
    <p>Authorized personnel only</p>
    <?php if ($error): ?><div class="alert"><?= $error ?></div><?php endif; ?>
    <form method="POST">
        <div class="form-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" class="form-control" placeholder="Admin Email" required>
        </div>
        <div class="form-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" name="login" class="btn-login">Login</button>
    </form>
</div>

</body>
</html>