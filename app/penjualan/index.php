<?php $ajaxDataTable = './app/penjualan/table.php'; ?>

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-12 d-flex align-items-center justify-content-between">
            <h3 class="fw-bold">Daftar Transaksi Penjualan</h3>
            <?php if ($_SESSION['level'] != 1) : ?>
                <a href="?view=penjualan-baru" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Penjualan Baru
                </a>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card p-2 table-responsive">
                <table class="table table-striped dataTable align-middle">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="text-center" width="5%">No. </th>
                            <th class="text-center" width="18%">Tanggal</th>
                            <th class="text-center" width="27%">Customer</th>
                            <th class="text-center" width="5%">Item</th>
                            <th class="text-center" width="13%">Total</th>
                            <th class="text-center" width="7%">Disk</th>
                            <th class="text-center" width="15%">Grand Total</th>
                            <?php if ($_SESSION['level'] == 1) : ?>
                                <th class="text-center" width="10%">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>