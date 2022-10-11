<?php

/**
 * SETUP KONFIGURASI DATABASE MYSQL
 * ================================
 */
$host     = "localhost";
$user     = "root";
$pass     = "";
$db       = "apotek_ajberkah";
$title    = "Apotek AJ Berkah";
$base_url = "localhost/apotek-ajeberkah/";

// JALANKAN KONEKSI
$conn = mysqli_connect($host, $user, $pass, $db);

// QUERY BUILDER
function query($conn, $query)
{
    mysqli_query($conn, $query) or die(mysqli_error($conn));
}
