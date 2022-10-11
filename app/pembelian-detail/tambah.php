<?php

$id_beli  = $_GET['id'];
$status   = $_GET['status'];
$id_prd   = $_POST['id_produk'];
$jml_bdet = $_POST['jml_bdet'];
$url      = 'home.php?view=pembelian-detail&status=' . $status . '&id=' . $id_beli;

$query = "SELECT * FROM pembelian_detail WHERE beli_id=$id_beli AND prd_id=$id_prd";
$sql   = mysqli_query($conn, $query) or die(mysqli_error($conn));
$cek   = mysqli_num_rows($sql);

if ($cek < 1) {
    $qStok2 = "UPDATE produk SET stok_prd=stok_prd+$jml_bdet WHERE id_prd=$id_prd";
    query($conn, $qStok2);

    $query2   = "INSERT INTO pembelian_detail SET
                    beli_id  = $id_beli,
                    prd_id   = $id_prd,
                    jml_bdet = $jml_bdet
               ";
} else {
    echo alert('Barang/Produk telah ditambahkan!', $url);
}

query($conn, $query2);

echo redirect($url);
