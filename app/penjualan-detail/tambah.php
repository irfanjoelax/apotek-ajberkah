<?php

$id_jual  = $_GET['id'];
$status   = $_GET['status'];
$id_prd   = $_POST['id_produk'];
$jml_jdet = $_POST['jml_jdet'];
$url      = 'home.php?view=penjualan-detail&status=' . $status . '&id=' . $id_jual;

$query = "SELECT * FROM penjualan_detail WHERE jual_id=$id_jual AND prd_id=$id_prd";
$sql   = mysqli_query($conn, $query) or die(mysqli_error($conn));
$cek   = mysqli_num_rows($sql);

if ($cek >= 1) {
    echo alert('Barang/Produk telah ditambahkan!', $url);
} else {

    $qStok = "SELECT * FROM produk WHERE id_prd=$id_prd LIMIT 1";
    $eStok = mysqli_query($conn, $qStok) or die(mysqli_errno($conn));
    $dStok = mysqli_fetch_array($eStok);

    if ($dStok['stok_prd'] <= $jml_jdet) {
        echo alert('Stok Barang/Produk tidak mencukupi jumlah pembelian', $url);
    } else {
        $qStok2 = "UPDATE produk SET stok_prd=stok_prd-$jml_jdet WHERE id_prd=$id_prd";
        query($conn, $qStok2);

        $query2   = "INSERT INTO penjualan_detail SET
                    jual_id  = $id_jual,
                    prd_id   = $id_prd,
                    jml_jdet = $jml_jdet
               ";
        query($conn, $query2);
        echo redirect($url);
    }
}
