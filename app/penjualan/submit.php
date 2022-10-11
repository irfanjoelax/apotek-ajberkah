<?php

$id_jl  = $_POST['id_jl'];
$nama   = strtoupper($_POST['nama']);
$item   = $_POST['item'];
$total  = $_POST['total'];
$diskon = $_POST['diskon'];
$bayar  = $_POST['grandtotal'];

// sql query
$query   = "UPDATE penjualan SET 
                  nama_customer = '$nama',
                  item_jl       = '$item',
                  total_jl      = '$total',
                  disk_jl       = '$diskon',
                  byr_jl        = '$bayar'
            WHERE id_jl         = '$id_jl'
            ";

// eksekusi
mysqli_query($conn, $query) or die(mysqli_error($conn));

echo redirect('home.php?view=penjualan');
