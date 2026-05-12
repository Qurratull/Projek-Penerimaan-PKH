<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM rules");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Rules</title>

    <style>

        body{
            font-family: Arial;
            background:#f2f2f2;
            padding:20px;
        }

        .container{
            width:90%;
            margin:auto;
            background:white;
            padding:20px;
            border-radius:10px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th, td{
            border:1px solid black;
            padding:10px;
            text-align:center;
        }

        th{
            background:blue;
            color:white;
        }

        button{
            padding:10px;
            background:blue;
            color:white;
            border:none;
        }

    </style>

</head>

<body>

<div class="container">

<h2>Data Rules</h2>

<a href="index.php">
<button>Kembali</button>
</a>

<br><br>

<table>

<tr>
    <th>ID Rule</th>
    <th>Kondisi</th>
    <th>Keputusan</th>
    <th>Alasan</th>
</tr>

<?php
while($d = mysqli_fetch_array($data)){
?>

<tr>
    <td><?php echo $d['id_rule']; ?></td>
    <td><?php echo $d['kondisi']; ?></td>
    <td><?php echo $d['keputusan']; ?></td>
    <td><?php echo $d['alasan']; ?></td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>
