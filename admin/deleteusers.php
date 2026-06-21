<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location: ../login.php');
    exit();
}
include('head.php');
include('../dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Delete Users</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body{
    margin:0;
    font-family: Arial, Helvetica, sans-serif;
    background:#f4f6f8;
}

/* Header */
.admintitle{
    background:#2c3e50;
    color:#fff;
    padding:15px 30px;
}

.admintitle a{
    color:#fff;
    text-decoration:none;
    font-size:14px;
}

.admintitle a:hover{
    text-decoration:underline;
}

.admintitle h1{
    text-align:center;
    margin:10px 0 0;
    font-size:26px;
}

/* Table */
.table-box{
    margin:40px auto;
    width:80%;
    background:#fff;
    border:1px solid #ccc;
}

table{
    width:100%;
    border-collapse:collapse;
}

th, td{
    padding:12px;
    border:1px solid #ccc;
    text-align:center;
    font-size:15px;
}

th{
    background:#34495e;
    color:#fff;
}

tr:nth-child(even){
    background:#f2f2f2;
}

.delete-link{
    color:#c0392b;
    text-decoration:none;
    font-weight:bold;
}

.delete-link:hover{
    text-decoration:underline;
}
</style>
</head>

<body>

<div class="admintitle">
    <a href="dashboard.php" style="float:left;">← Back To Dashboard</a>
    <a href="logout.php" style="float:right;">Logout</a>
    <h1>Showing All Users</h1>
</div>

<div class="table-box">
<table>
    <tr>
        <th>No.</th>
        <th>User Name</th>
        <th>Email ID</th>
        <th>Action</th>
    </tr>

<?php
$qry = "SELECT * FROM users";
$run = mysqli_query($dbcon, $qry);

if(mysqli_num_rows($run) < 1){
    echo "<tr><td colspan='4'>No users found</td></tr>";
}else{
    $count = 0;
    while($data = mysqli_fetch_assoc($run)){
        $count++;
        ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td>
                <a class="delete-link"
                   href="usersdeleted.php?emm=<?php echo $data['email']; ?>"
                   onclick="return confirm('Are you sure you want to delete this user?');">
                   Delete
                </a>
            </td>
        </tr>
        <?php
    }
}
?>
</table>
</div>

</body>
</html>
