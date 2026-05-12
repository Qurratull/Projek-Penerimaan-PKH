<?php

$conn = mysqli_connect("localhost", "root", "", "pkh_rule_based_system");

if (!$conn) {
    die("Koneksi gagal : " . mysqli_connect_error());
}

?>
