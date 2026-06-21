<!-- when track menu is clicked it will show all courier placed by that User-->
<?php
session_start();
if (isset($_SESSION['uid'])) {
    echo "";
} else {
    header('location: ../login.php');
}
?>

<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Track Courier</title>

    <style>
        body {
            background: #f4f6f9;
            font-family: "Segoe UI", Tahoma, sans-serif;
        }

        .table-wrapper {
            max-width: 1100px;
            margin: 40px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        .table-title {
            text-align: center;
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #2f80ed;
            color: #ffffff;
            padding: 12px;
            font-size: 14px;
            text-transform: uppercase;
        }

        td {
            padding: 12px;
            font-size: 14px;
            color: #333;
            border-bottom: 1px solid #e0e0e0;
            text-align: center;
        }

        tr:hover {
            background: #f8faff;
        }

        img {
            max-width: 70px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .action-btn {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 12px;
            margin: 2px;
            display: inline-block;
            color: #fff;
        }

        .edit {
            background: #f2994a;
        }

        .delete {
            background: #eb5757;
        }

        .status {
            background: #27ae60;
        }

        .action-btn:hover {
            opacity: 0.9;
        }

        .no-record {
            padding: 20px;
            font-size: 15px;
            color: #777;
        }

        @media (max-width: 768px) {
            table {
                font-size: 12px;
            }
            img {
                max-width: 50px;
            }
        }
    </style>
</head>

<body>

<div class="table-wrapper">
    <div class="table-title">My Courier Orders</div>

    <div style="overflow-x:auto;">
        <table>
            <tr>
                <th>No.</th>
                <th>Item Image</th>
                <th>Sender Name</th>
                <th>Receiver Name</th>
                <th>Receiver Email</th>
                <th>Action</th>
            </tr>

            <?php
            include('../dbconnection.php');

            $email = $_SESSION['emm'];
            $qryy = "SELECT * FROM `courier` WHERE `semail`='$email'";
            $run = mysqli_query($dbcon, $qryy);

            if (mysqli_num_rows($run) < 1) {
                echo "<tr><td colspan='6' class='no-record'>No courier records found</td></tr>";
            } else {
                $count = 0;
                while ($data = mysqli_fetch_assoc($run)) {
                    $count++;
            ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td>
                    <img src="../dbimages/<?php echo $data['image']; ?>" alt="Item Image">
                </td>
                <td><?php echo $data['sname']; ?></td>
                <td><?php echo $data['rname']; ?></td>
                <td><?php echo $data['remail']; ?></td>
                <td>
                    <a class="action-btn edit" href="updationtable.php?sid=<?php echo $data['c_id']; ?>">Edit</a>
                    <a class="action-btn delete" href="deletecourier.php?bb=<?php echo $data['billno']; ?>">Delete</a>
                    <a class="action-btn status" href="status.php?sidd=<?php echo $data['c_id']; ?>">Status</a>
                </td>
            </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>
