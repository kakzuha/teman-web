<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "teman";

$koneksi = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){
    echo "Gagal terkoneksi: " .die(mysqli_error($koneksi));
}