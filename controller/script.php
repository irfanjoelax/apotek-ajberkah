<?php

if (isset($_GET['view'])) $view = $_GET['view'];
else $view = "admin";

if ($view == "admin") include("script/beranda-admin-js.php");

// elseif ($view == "satuan") include("script/satuan_js.php");
// elseif ($view == "supplier") include("script/supplier_js.php");
// elseif ($view == "user") include("script/user_js.php");
// elseif ($view == "pengeluaran") include("script/pengeluaran_js.php");
// elseif ($view == "produk") include("script/produk_js.php");
// elseif ($view == "produk-import-excel") include("script/produk_import_excel_js.php");
// elseif ($view == "pembelian") include("script/pembelian_js.php");
// elseif ($view == "pembelian-detail") include("script/pembelian-detail-js.php");
// elseif ($view == "penjualan") include("script/penjualan_js.php");
// elseif ($view == "penjualan-detail") include("script/penjualan_detail_js.php");
