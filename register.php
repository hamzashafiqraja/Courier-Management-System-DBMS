<?php
require_once "dbconnection.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $fullname = $_POST['name'];
    $phn = $_POST['ph'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password == $confirm_password) {
        $qry = "INSERT INTO `users` (`email`, `name`, `pnumber`) VALUES ('$email', '$fullname', '$phn')";
        $run = mysqli_query($dbcon, $qry);

        if ($run == true) {
            $psqry = "INSERT INTO `login` (`email`, `password`, `u_id`) VALUES ('$email', '$password', LAST_INSERT_ID())";
            $psrun = mysqli_query($dbcon, $psqry);
            ?>
            <script>
                alert('Registration Successful :)'); 
                window.open('index.php','_self');
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert('Password mismatched!!'); 
        </script>
        <?php
    }

}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/brr.png');
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            padding: 30px;
            max-width: 500px;
            width: 100%;
        }
        .card h2 {
            color: #198754; /* Bootstrap green */
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #dc3545;
            color: white;
            width: 100%;
            font-weight: bold;
        }
        .btn-custom:hover {
            background-color: #b02a37;
        }
        a {
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .notice {
            font-size: 0.9rem;
            color: #555;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Register</h2>
        <p class="text-center">Please fill this form to create an account.</p>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="number" name="ph" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="submit" name="submit" class="btn btn-custom" value="Register">
            </div>
            <p class="text-center">Already have an account? <a href="index.php" class="text-danger">Login here</a>.</p>
        </form>
        <div class="notice">
            <p>Notice: If the email ID is already registered, it will not respond.</p>
            <p>Reset your password or register with a different email ID.</p>
        </div>
    </div>
</body>
</html>
