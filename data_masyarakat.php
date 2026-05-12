<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM masyarakat");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Masyarakat</title>

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

<h2>Data Masyarakat</h2>

<a href="index.php">
<button>Kembali</button>
</a>

<br><br>

<table>

<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Penghasilan</th>
    <th>Tanggungan</th>
    <th>Pekerjaan</th>
    <th>Kondisi Rumah</th>
    <th>Kendaraan</th>
    <th>Bantuan Lain</th>
</tr>

<?php
$no = 1;

while($d = mysqli_fetch_array($data)){
?>

<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $d['nama']; ?></td>
    <td><?php echo $d['penghasilan']; ?></td>
    <td><?php echo $d['tanggungan']; ?></td>
    <td><?php echo $d['pekerjaan']; ?></td>
    <td><?php echo $d['kondisi_rumah']; ?></td>
    <td><?php echo $d['kendaraan']; ?></td>
    <td><?php echo $d['bantuan_lain']; ?></td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>
