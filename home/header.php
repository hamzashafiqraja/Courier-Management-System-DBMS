<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Professional Navbar</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    /* Base Body */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f6fa;
        margin: 0;
        padding: 0;
    }

    /* Navbar styling */
    .navbar {
        background-color: #ffffff;
        padding: 0.7rem 2rem;
        border-bottom: 1px solid #e0e0e0;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    /* Brand logo */
    .navbar-brand img {
        height: 60px;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .navbar-brand img:hover {
        transform: scale(1.05);
        opacity: 0.9;
    }

    /* Navbar links */
    .navbar-nav .nav-link {
        color: #495057;
        font-weight: 500;
        margin: 0 0.5rem;
        transition: color 0.2s ease, transform 0.2s ease;
    }

    .navbar-nav .nav-link:hover {
        color: #007bff;
        transform: translateY(-2px);
    }

    .navbar-nav .nav-link.active {
        color: #007bff;
        font-weight: 600;
        border-bottom: 2px solid #007bff;
    }

    /* Right-aligned links */
    .navbar-nav.ml-auto .nav-link {
        font-weight: 500;
    }

    /* Toggler button */
    .navbar-toggler {
        border: none;
        outline: none;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%280,0,0,0.7%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }

    
        .navbar-nav.ml-auto {
            margin-top: 0.5rem;
        }
    }
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-md">
    <a href="home.php" class="navbar-brand">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="home.php" class="nav-item nav-link active">Home</a>
            <a href="price.php" class="nav-item nav-link">Price</a>
            <a href="courierMenu.php" class="nav-item nav-link">Courier</a>
            <a href="trackMenu.php" class="nav-item nav-link">Track</a>
            <a href="profile.php" class="nav-item nav-link">Profile</a>
            <a href="contactUS.php" class="nav-item nav-link">Contact Us</a>
        </div>
        <div class="navbar-nav ml-auto">
            <a href="../admin/logout.php" class="nav-item nav-link">Admin Page</a>
            <a href="../logout.php" class="nav-item nav-link">Log Out</a>
        </div>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

