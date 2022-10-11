<?php

// data untuk table pembelian
$id_bl    = $_POST['id_bl'];
$supplier = $_POST['supplier'];
$faktur   = $_POST['faktur'];
$item     = $_POST['item'];
$total    = $_POST['total'];
$diskon   = $_POST['diskon'];
$bayar    = $_POST['grandtotal'];

// sql query
$query   = "UPDATE pembelian SET 
                      supp_id  = '$supplier',
                      faktur   = '$faktur',
                      item_bl  = '$item',
                      total_bl = '$total',
                      disk_bl  = '$diskon',
                      byr_bl   = '$bayar'
                WHERE id_bl    = '$id_bl'
            ";

// eksekusi
mysqli_query($conn, $query) or die(mysqli_error($conn));

echo redirect('home.php?view=pembelian');
