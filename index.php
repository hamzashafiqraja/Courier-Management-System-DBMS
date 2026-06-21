<?php

require_once "dbconnection.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $qry = "SELECT * FROM `login` WHERE `email`='$email' AND `password`='$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);

    if ($row < 1) {
?>
        <script>
            alert("Opps! plz Enter Your Username and Pswd again..");
            window.open('index.php', '_self');
        </script>
<?php
    } else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['u_id'];
        $email = $data['email'];

        $_SESSION['uid'] = $id;
        $_SESSION['emm'] = $email;
?>
        <script>
            alert("Wellcome 🙏");
            window.open('home/home.php', '_self');
        </script>
<?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login | MountainWay Courier</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@800&display=swap" rel="stylesheet">

<style>

:root {
    --primary: #2A6EBB;
    --secondary: #FF6B35;
    --dark: #2C3E50;
    --gradient: linear-gradient(135deg, #2A6EBB 0%, #1A4B8C 100%);
    --shadow: 0 10px 30px rgba(0,0,0,0.1);
    --radius: 15px;
}

* {
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(rgba(42,110,187,0.9), rgba(26,75,140,0.9)),
    url('https://images.unsplash.com/photo-1562887189-e5d078343de4');
    background-size: cover;
    background-position: center;
    min-height: 100vh;
    display: flex;
    align-items: center;
}

.login-container {
    width:100%;
    max-width:450px;
    margin:auto;
}

.login-card {
    background:white;
    border-radius:var(--radius);
    box-shadow:var(--shadow);
    overflow:hidden;
}

.card-header {
    background: var(--gradient);
    color:white;
    text-align:center;
    padding:30px 20px;
}

.logo {
    font-family:'Montserrat', sans-serif;
    font-size:2.2rem;
    font-weight:800;
}

.logo span {
    color: var(--secondary);
}

.tagline {
    font-size:0.9rem;
    opacity:0.9;
}

.card-body {
    padding:40px 35px;
}

.form-group {
    margin-bottom:25px;
    position:relative;
}

.form-control {
    border:2px solid #e1e5eb;
    border-radius:8px;
    padding:12px 15px 12px 45px;
    font-size:15px;
    height:50px;
}

.form-control:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 0.2rem rgba(42,110,187,0.25);
}

.input-icon {
    position:absolute;
    left:15px;
    top:50%;
    transform:translateY(-50%);
    color:#6c757d;
    font-size:18px;
}

.btn-login {
    background: var(--gradient);
    border:none;
    color:white;
    padding:14px;
    font-size:16px;
    font-weight:600;
    border-radius:8px;
    width:100%;
    text-transform:uppercase;
}

.btn-login:hover {
    opacity:0.9;
}

.links-section {
    margin-top:25px;
    text-align:center;
}

.links-section a {
    margin:0 10px;
    color:var(--primary);
    text-decoration:none;
    font-weight:500;
}

.links-section a:hover {
    color:var(--secondary);
}

.admin-link {
    position:absolute;
    top:20px;
    right:20px;
    color:white;
    text-decoration:none;
}

</style>
</head>

<body>

<div class="login-container">
    <div class="login-card">

        <div class="card-header">
            <a href="admin/adminlogin.php" class="admin-link">
                <i class="fas fa-user-shield"></i> Admin
            </a>

            <h1 class="logo">Mountain<span>Way</span></h1>
            <p class="tagline">Kashmir's Fastest & Most Reliable Courier Service</p>
        </div>

        <div class="card-body">

            <form action="" method="post">

                <div class="form-group">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn-login">Sign In</button>
                </div>

                <div class="links-section">
                    <a href="resetpswd.php"><i class="fas fa-key"></i> Forgot Password?</a>
                    |
                    <a href="register.php"><i class="fas fa-user-plus"></i> Create Account</a>
                </div>

            </form>

        </div>
    </div>

    <div style="text-align:center;margin-top:20px;color:white;font-size:14px;">
        &copy; <?php echo date('Y'); ?> MountainWay Courier Service
    </div>

</div>

</body>
</html>
