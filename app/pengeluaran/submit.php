<?php

$id_lr   = rand(111111111, 999999999);
$jenis   = strtoupper($_POST['jenis']);
$nominal = $_POST['nominal'];
$tanggal = $_POST['tanggal'];
$waktu   = date('Y-m-d H:i:s');

if (isset($_GET['id'])) {
    $id_lr  = $_GET['id'];

    $query  =   "UPDATE pengeluaran SET 
                    tgl_lr  = '$tanggal',
                    jns_lr  = '$jenis',
                    nmnl_lr = '$nominal'
                WHERE id_lr = '$id_lr'
                ";
} else {
    $query  =   "INSERT INTO pengeluaran SET 
                    id_lr   = '$id_lr',
                    tgl_lr  = '$tanggal',
                    jns_lr  = '$jenis',
                    nmnl_lr = '$nominal',
                    wkt_lr  = '$waktu'
                ";
}

$exeSQL = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($exeSQL) {
    if (isset($_GET['id'])) {
        echo alert('Data pengeluaran Anda berhasil di UBAH', 'home.php?view=pengeluaran');
    } else {
        echo alert('Data pengeluaran Anda berhasil di TAMBAHKAN', 'home.php?view=pengeluaran');
    }
}
