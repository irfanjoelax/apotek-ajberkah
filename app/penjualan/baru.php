<?php

$id      = rand(111111111, 999999999);
$tanggal = date('Y-m-d');
$nama    = 'UMUM';
$item    = 0;
$total   = 0;
$diskon  = 0;
$bayar   = 0;
$user    = $_SESSION['id_user'];
$waktu   = date('Y-m-d H:i:s');

// sql query
$query   = "INSERT INTO penjualan SET 
               id_jl         = '$id',
               tgl_jl        = '$tanggal',
               nama_customer = '$nama',
               item_jl       = '$item',
               total_jl      = '$total',
               disk_jl       = '$diskon',
               byr_jl        = '$bayar',
               user_id       = '$user',
               wkt_jl        = '$waktu'
            ";

// eksekusi
$sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($sql) {
    echo redirect('home.php?view=penjualan-detail&status=baru&id=' . $id);
} else {
    echo alert('Data penjualan Anda GAGAL dibuat', 'home.php?view=penjualan');
}
