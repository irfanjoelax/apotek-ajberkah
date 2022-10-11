<li class="nav-item me-3 d-lg-block w-100">
    <a class="nav-link <?= ($view == 'admin') ? 'bg-primary text-white rounded' : '' ?>" href="?view=admin">Beranda</a>
</li>
<li class="nav-item me-3 d-lg-block w-100">
    <a class="nav-link <?= ($view == 'satuan' or $view == 'satuan-form') ? 'bg-primary text-white rounded' : '' ?>" href="?view=satuan">Satuan</a>
</li>
<li class="nav-item me-3 d-lg-block w-100">
    <a class="nav-link <?= ($view == 'produk' or $view == 'produk-form') ? 'bg-primary text-white rounded' : '' ?>" href="?view=produk">Produk</a>
</li>
<li class="nav-item me-3 d-lg-block w-100">
    <a class="nav-link <?= ($view == 'supplier' or $view == 'supplier-form') ? 'bg-primary text-white rounded' : '' ?>" href="?view=supplier">Supplier</a>
</li>
<li class="nav-item me-3 d-lg-block w-100">
    <a class="nav-link <?= ($view == 'user' or $view == 'user-form') ? 'bg-primary text-white rounded' : '' ?>" href="?view=user">User</a>
</li>
<li class="nav-item me-3 d-lg-block w-100">
    <a class="nav-link  <?= ($view == 'penjualan' or $view == 'penjualan-detail') ? 'bg-primary text-white rounded' : '' ?>" href="?view=penjualan">Penjualan</a>
</li>
<li class="nav-item me-3 d-lg-block w-100">
    <a class="nav-link <?= ($view == 'pembelian' or $view == 'pembelian-detail') ? 'bg-primary text-white rounded' : '' ?>" href="?view=pembelian">Pembelian</a>
</li>
<li class="nav-item me-3 d-lg-block w-100">
    <a class="nav-link <?= ($view == 'pengeluaran' or $view == 'pengeluaran-form') ? 'bg-primary text-white rounded' : '' ?>" href="?view=pengeluaran">Pengeluaran</a>
</li>
<li class="nav-item me-3 d-lg-block w-100">
    <a class="nav-link <?= ($view == 'laporan') ? 'bg-primary text-white rounded' : '' ?>" href="?view=laporan">Laporan</a>
</li>