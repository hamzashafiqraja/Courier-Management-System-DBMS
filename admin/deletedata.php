<!-- when admin click delete data link, page with filter options-->
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
<title>Search Data</title>
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
    width:90%;
    background:#fff;
    border:1px solid #ccc;
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
}

th, td{
    padding:12px;
    border:1px solid #ccc;
    text-align:center;
    font-size:14px;
}

th{
    background:#34495e;
    color:#fff;
}

tr:nth-child(even){
    background:#f2f2f2;
}

img{
    max-width:90px;
    border:1px solid #ccc;
    padding:3px;
}

/* Delete link */
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
    <h1>Search Data Information</h1>
</div>

<div class="table-box">
<table>
    <tr>
        <th>No.</th>
        <th>Item Image</th>
        <th>Sender Name</th>
        <th>Receiver Name</th>
        <th>Sender Email</th>
        <th>Action</th>
    </tr>

<?php
$qry = "SELECT * FROM courier";
$run = mysqli_query($dbcon, $qry);

if(mysqli_num_rows($run) < 1){
    echo "<tr><td colspan='6'>No record found</td></tr>";
}else{
    $count = 0;
    while($data = mysqli_fetch_assoc($run)){
        $count++;
        ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td>
                <img src="../dbimages/<?php echo $data['image']; ?>" alt="image">
            </td>
            <td><?php echo $data['sname']; ?></td>
            <td><?php echo $data['rname']; ?></td>
            <td><?php echo $data['semail']; ?></td>
            <td>
                <a class="delete-link"
                   href="datadeleted.php?bb=<?php echo $data['billno']; ?>"
                   onclick="return confirm('Are you sure you want to delete this record?');">
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
