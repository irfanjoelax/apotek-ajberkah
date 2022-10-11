<li class="nav-item">
    <a class="nav-link me-3 <?php if ($view == "operator") echo 'bg-primary text-white rounded'; ?>" href="?view=operator">
        <i class="fa fa-home"></i> Beranda
    </a>
</li>
<li class="nav-item">
    <a class="nav-link me-3 <?php if ($view == "produk") echo 'bg-primary text-white rounded'; ?>" href="?view=produk">
        <i class="fa fa-cubes"></i> Produk
    </a>
</li>
<li class="nav-item">
    <a class="nav-link me-3 <?php if ($view == "penjualan" or $view == "penjualan-detail" or $view == "penjualan-lihat") echo 'bg-primary text-white rounded'; ?>" href="?view=penjualan">
        <i class="fa fa-shopping-cart"></i> Transaksi Penjualan
    </a>
</li>