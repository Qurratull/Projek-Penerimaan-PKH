<?php

include "koneksi.php";

if(isset($_POST['proses'])){

    $nama = $_POST['nama'];
    $penghasilan = $_POST['penghasilan'];
    $tanggungan = $_POST['tanggungan'];
    $pekerjaan = $_POST['pekerjaan'];
    $kondisi_rumah = $_POST['kondisi_rumah'];
    $kendaraan = $_POST['kendaraan'];
    $bantuan_lain = $_POST['bantuan_lain'];

    mysqli_query($conn, "INSERT INTO masyarakat
    (nama,penghasilan,tanggungan,pekerjaan,kondisi_rumah,kendaraan,bantuan_lain)
    VALUES
    ('$nama','$penghasilan','$tanggungan','$pekerjaan','$kondisi_rumah','$kendaraan','$bantuan_lain')");

    $id_masyarakat = mysqli_insert_id($conn);

    $hasil = "Tidak Layak";
    $rule = "Tidak ada rule yang cocok";

    if($penghasilan < 1000000 && $tanggungan >= 3){
        $hasil = "Layak";
        $rule = "Rule 1";
    }

    elseif($penghasilan < 1500000 && $kondisi_rumah == "tidak layak"){
        $hasil = "Layak";
        $rule = "Rule 2";
    }

    elseif($pekerjaan == "buruh harian" && $tanggungan >= 2){
        $hasil = "Layak";
        $rule = "Rule 3";
    }

    elseif($penghasilan < 1200000 && $kendaraan == "tidak ada"){
        $hasil = "Layak";
        $rule = "Rule 4";
    }

    elseif($kondisi_rumah == "semi permanen" && $tanggungan >= 4){
        $hasil = "Layak";
        $rule = "Rule 5";
    }

    elseif($penghasilan > 3000000){
        $hasil = "Tidak Layak";
        $rule = "Rule 6";
    }

    elseif($kendaraan == "mobil"){
        $hasil = "Tidak Layak";
        $rule = "Rule 7";
    }

    elseif($pekerjaan == "PNS"){
        $hasil = "Tidak Layak";
        $rule = "Rule 8";
    }

    elseif($kondisi_rumah == "permanen" && $penghasilan > 2500000){
        $hasil = "Tidak Layak";
        $rule = "Rule 9";
    }

    elseif($bantuan_lain == "ya" && $penghasilan > 2000000){
        $hasil = "Tidak Layak";
        $rule = "Rule 10";
    }

    elseif($penghasilan < 1000000 && $kondisi_rumah == "tidak layak" && $tanggungan >= 4){
        $hasil = "Layak";
        $rule = "Rule 11";
    }

    elseif($penghasilan < 1500000 && $pekerjaan == "pengangguran"){
        $hasil = "Layak";
        $rule = "Rule 12";
    }

    mysqli_query($conn, "INSERT INTO hasil_keputusan
    (id_masyarakat, hasil, rule_digunakan)
    VALUES
    ('$id_masyarakat','$hasil','$rule')");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Keputusan</title>

    <style>

        body{
            font-family: Arial;
            background: #f2f2f2;
            padding: 20px;
        }

        .box{
            width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

    </style>

</head>

<body>

<div class="box">

<h2>HASIL KEPUTUSAN PKH</h2>

<p><b>Nama :</b> <?php echo $nama; ?></p>

<p><b>Status :</b> <?php echo $hasil; ?></p>

<p><b>Rule Digunakan :</b> <?php echo $rule; ?></p>

<br>

<a href="index.php">Kembali</a>

</div>

</body>
</html>

<?php
}
?>
