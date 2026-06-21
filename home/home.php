<?php
session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Typhoon Courier</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #3498db;
            --primary-dark: #2980b9;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(rgba(93, 113, 190, 0.9), rgba(0, 0, 0, 0.7)),
                        url('../images/1920_1080.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            color: white;
        }

        .dashboard-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            text-align: center;
        }

        .hero-section {
            max-width: 800px;
            padding: 60px 40px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .welcome-text {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .tagline {
            font-size: 1.4rem;
            margin-bottom: 30px;
            color: #e0e0e0;
        }

        .highlight {
            color: var(--primary-color);
            font-weight: 600;
        }

        .feature-highlight {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            margin: 25px 0;
        }

        .feature-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 10px 20px;
            border-radius: 20px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .feature-item i {
            color: var(--primary-color);
        }

        .project-info {
            background: rgba(101, 127, 230, 0.69);
            padding: 30px;
            border-radius: 15px;
            border: 1px solid rgba(52, 152, 219, 0.3);
            margin-top: 30px;
        }

        .project-title {
            font-size: 1.8rem;
            font-weight: 600;
        }

        .footer-text {
            text-align: center;
            padding: 25px;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-text a {
            color: var(--primary-color);
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 40px 20px;
            }

            .welcome-text {
                font-size: 2.2rem;
            }

            .tagline {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>

<div class="dashboard-container">

    <?php include('header.php'); ?>

    <div class="main-content">
        <div class="hero-section">

            <h1 class="welcome-text">Welcome to MountainWay Courier Service</h1>
            <p class="tagline">
                The <span class="highlight">Fastest Courier Service</span> in Kashmir
            </p>

            <div class="feature-highlight">
                <div class="feature-item">
                    <i class="fas fa-bolt"></i> Lightning Fast Delivery
                </div>
                <div class="feature-item">
                    <i class="fas fa-shield-alt"></i> Secure & Reliable
                </div>
                <div class="feature-item">
                    <i class="fas fa-map-marker-alt"></i> Kashmir-Wide Coverage
                </div>
            </div>

            <div class="project-info">
                <h3 class="project-title">
                    <i class="fas fa-graduation-cap"></i> DBMS Lab Mini Project
                </h3>
            </div>

        </div>
    </div>

    <div class="footer-text">
        <p>© <?php echo date('Y'); ?> MountainWay Courier Service. All rights reserved.</p>
        <p>Developed by <a href="#">Raja Hamza Shafiq</a></p>
    </div>

</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const textElement = document.querySelector(".welcome-text");
    const text = "Welcome to MountainWay Courier Service";
    let index = 0;

    textElement.textContent = "";

    function typeEffect() {
        if (index < text.length) {
            textElement.textContent += text.charAt(index);
            index++;
            setTimeout(typeEffect, 70);
        }
    }

    typeEffect();
});
</script>

</body>
</html>
