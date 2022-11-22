<?php

$id        = rand(111111111, 999999999);
$tanggal   = date('Y-m-d');
$jth_tempo = date('Y-m-d');
$supplier  = 0;
$item      = 0;
$total     = 0;
$diskon    = 0;
$bayar     = 0;
$user      = $_SESSION['id_user'];
$waktu     = date('Y-m-d H:i:s');

// sql query
$query   = "INSERT INTO pembelian SET 
               id_bl     = '$id',
               faktur    = null,
               tgl_bl    = '$tanggal',
               jth_tempo = '$jth_tempo',
               supp_id   = '$supplier',
               item_bl   = '$item',
               total_bl  = '$total',
               disk_bl   = '$diskon',
               byr_bl    = '$bayar',
               user_id   = '$user',
               wkt_bl    = '$waktu'
            ";

// eksekusi
$sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($sql) {
    // berhasil
    echo redirect('home.php?view=pembelian-detail&status=baru&id=' . $id);
} else {
    // gagal
    echo alert('Data pembelian Anda GAGAL dibuat', 'home.php?view=pembelian');
}
