<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #eaf0ff, #f7f9fc);
            font-family: "Segoe UI", Tahoma, sans-serif;
        }

        .mail-form {
            background: #ffffff;
            padding: 30px;
            margin-top: 80px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .mail-form h2 {
            font-weight: 600;
            color: #2f80ed;
            margin-bottom: 5px;
        }

        .mail-form p {
            color: #777;
            margin-bottom: 25px;
        }

        .form-control {
            border-radius: 8px;
            font-size: 14px;
            padding: 10px;
        }

        textarea.form-control {
            resize: none;
            height: 120px;
        }

        .btn-primary {
            background: #2f80ed;
            border: none;
            border-radius: 8px;
            padding: 10px;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: #1c63c7;
        }
    </style>
</head>

<body>

<?php include('header.php'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 mail-form">
            <h2 class="text-center">Drop a Message</h2>
            <p class="text-center">We are waiting for your response</p>

            <form action="contactUs.php" method="POST">

                <div class="form-group">
                    <input 
                        class="form-control" 
                        name="email" 
                        type="email" 
                        placeholder="Your Email Address" 
                        required>
                </div>

                <div class="form-group">
                    <input 
                        class="form-control" 
                        name="subject" 
                        type="text" 
                        placeholder="Subject" 
                        required>
                </div>

                <div class="form-group">
                    <textarea 
                        class="form-control" 
                        name="message" 
                        placeholder="Compose your message..." 
                        required></textarea>
                </div>

                <div class="form-group">
                    <input 
                        class="form-control btn btn-primary" 
                        type="submit" 
                        name="send" 
                        value="Send Message">
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>

<!-- PHP CODE -->
<?php
if (isset($_POST['send'])) {
    include('../dbconnection.php');

    $eml = $_POST['email'];
    $sub = $_POST['subject'];
    $msg = $_POST['message'];

    $qry = "INSERT INTO `contacts` (`email`, `subject`, `msg`) 
            VALUES ('$eml', '$sub', '$msg')";

    $run = mysqli_query($dbcon, $qry);

    if ($run == true) {
        ?>
        <script>
            alert('Thanks! We will look into your concern 🙂');
            window.open('home.php', '_self');
        </script>
        <?php
    }
}
?>
