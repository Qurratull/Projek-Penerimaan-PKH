<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$data = mysqli_query($conn, "
SELECT hasil_keputusan.*, masyarakat.nama
FROM hasil_keputusan
JOIN masyarakat
ON hasil_keputusan.id_masyarakat = masyarakat.id_masyarakat
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Keputusan</title>

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

<h2>Hasil Keputusan PKH</h2>

<a href="index.php">
<button>Kembali</button>
</a>

<br><br>

<table>

<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Hasil</th>
    <th>Rule Digunakan</th>
</tr>

<?php
$no = 1;

while($d = mysqli_fetch_array($data)){
?>

<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $d['nama']; ?></td>
    <td><?php echo $d['hasil']; ?></td>
    <td><?php echo $d['rule_digunakan']; ?></td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>
