<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem PKH</title>

    <style>

        body{
            font-family: Arial;
            background: #f2f2f2;
            padding: 20px;
        }

        .container{
            width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        input, select{
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }

        button{
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background: blue;
            color: white;
            border: none;
            cursor: pointer;
        }

        h2{
            text-align:center;
        }

    </style>

</head>

<body>

<div class="container">

<h2>Sistem Penerimaan Bantuan PKH</h2>

<a href="logout.php">
<button type="button">LOGOUT</button>
</a>

<form method="POST" action="proses.php">

    <label>Nama</label>
    <input type="text" name="nama" required>

    <label>Penghasilan</label>
    <input type="number" name="penghasilan" required>

    <label>Jumlah Tanggungan</label>
    <input type="number" name="tanggungan" required>

    <label>Pekerjaan</label>
    <select name="pekerjaan">

        <option value="buruh harian">
            Buruh Harian
        </option>

        <option value="pengangguran">
            Pengangguran
        </option>

        <option value="PNS">
            PNS
        </option>

        <option value="wiraswasta">
            Wiraswasta
        </option>

    </select>

    <label>Kondisi Rumah</label>
    <select name="kondisi_rumah">

        <option value="tidak layak">
            Tidak Layak
        </option>

        <option value="semi permanen">
            Semi Permanen
        </option>

        <option value="permanen">
            Permanen
        </option>

    </select>

    <label>Kendaraan</label>
    <select name="kendaraan">

        <option value="tidak ada">
            Tidak Ada
        </option>

        <option value="motor">
            Motor
        </option>

        <option value="mobil">
            Mobil
        </option>

    </select>

    <label>Bantuan Lain</label>
    <select name="bantuan_lain">

        <option value="tidak">
            Tidak
        </option>

        <option value="ya">
            Ya
        </option>

    </select>

    <button type="submit" name="proses">
        PROSES
    </button>

</form>

<br>

<a href="data_masyarakat.php">
<button type="button">
    Data Masyarakat
</button>
</a>

<a href="data_rules.php">
<button type="button">
    Data Rules
</button>
</a>

<a href="hasil_keputusan.php">
<button type="button">
    Hasil Keputusan
</button>
</a>

</div>

</body>
</html>
