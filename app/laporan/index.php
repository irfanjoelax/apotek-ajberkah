<div class="container">
    <div class="row mb-3">
        <div class="col-md-12">
            <h3 class="fw-bold">Data Laporan Per Bulan</h3>
        </div>
    </div>
    <form class="row row-cols-lg-auto g-3 align-items-center mb-3 mt-2" method="POST" action="">
        <div class="col-12">
            <div class="input-group">
                <div class="input-group-text">Mulai</div>
                <input type="date" class="form-control" name="awal" value="<?= $_POST['awal'] ?: ''  ?>" required>
            </div>
        </div>
        <div class=" col-12">
            <div class="input-group">
                <div class="input-group-text">Sampai</div>
                <input type="date" class="form-control" name="akhir" value="<?= $_POST['akhir'] ?: ''  ?>" required>
            </div>
        </div>

        <div class=" col-12">
            <button type="submit" name="filter" class="btn btn-primary">Filter</button>
            <a href="?view=laporan" class="btn btn-warning">Reset</a>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-sm table-striped table-bordered" width="100%" cellspacing="0">
            <thead class="bg-white text-dark">
                <tr class="text-center py-3">
                    <th class="py-3">Tanggal</th>
                    <th class="py-3"><span class="text-primary">Penjualan</span></th>
                    <th class="py-3"><span class="text-warning">Pembelian</span></th>
                    <th class="py-3"><span class="text-danger">Pengeluaran</span></th>
                    <th class="py-3"><span class="text-success">Pendapatan</span></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $awal              = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
                $akhir             = date('Y-m-d');

                if (isset($_POST['filter'])) {
                    $awal  = $_POST['awal'];
                    $akhir = $_POST['akhir'];
                }

                $data              = array();
                $pendapatan        = 0;
                $total_pendapatan  = 0;
                $grand_penjualan   = 0;
                $grand_pembelian   = 0;
                $grand_pengeluaran = 0;

                while (strtotime($awal) <= strtotime($akhir)) :
                    // ambil data tanggal
                    $tanggal = $awal;
                    $awal = date('Y-m-d', strtotime("+1 day", strtotime($awal)));

                    // jumlah total penjualan
                    $query_jl = "SELECT SUM(byr_jl) AS total_penjualan FROM penjualan WHERE tgl_jl LIKE '$tanggal'";
                    $sql_jl = mysqli_query($conn, $query_jl) or die(mysqli_error($conn));
                    $data_jl = mysqli_fetch_assoc($sql_jl);
                    $total_penjualan = $data_jl['total_penjualan'];
                    $grand_penjualan += $total_penjualan;

                    // jumlah total pembelian
                    $query_bl = "SELECT SUM(byr_bl) AS total_pembelian FROM pembelian WHERE tgl_bl LIKE '$tanggal'";
                    $sql_bl = mysqli_query($conn, $query_bl) or die(mysqli_error($conn));
                    $data_bl = mysqli_fetch_assoc($sql_bl);
                    $total_pembelian = $data_bl['total_pembelian'];
                    $grand_pembelian += $total_pembelian;

                    // jumlah total pengeluaran
                    $query_lr = "SELECT SUM(nmnl_lr) AS total_pengeluaran FROM pengeluaran WHERE tgl_lr LIKE '$tanggal'";
                    $sql_lr = mysqli_query($conn, $query_lr) or die(mysqli_error($conn));
                    $data_lr = mysqli_fetch_assoc($sql_lr);
                    $total_pengeluaran = $data_lr['total_pengeluaran'];
                    $grand_pengeluaran += $total_pengeluaran;

                    // jumlah total pendapatan
                    $pendapatan = $total_penjualan - $total_pembelian - $total_pengeluaran;
                    $total_pendapatan += $pendapatan;
                ?>
                    <tr>
                        <td class="text-center"><?= tanggal($tanggal) ?></td>
                        <td class="text-primary">
                            Rp. <span class="float-end"><?= rupiah($total_penjualan) ?></span>
                        </td>
                        <td class="text-warning">
                            Rp. <span class="float-end"><?= rupiah($total_pembelian) ?></span>
                        </td>
                        <td class="text-danger">
                            Rp. <span class="float-end"><?= rupiah($total_pengeluaran) ?></span>
                        </td>
                        <td class="text-success">
                            Rp. <span class="float-end"><?= rupiah($pendapatan) ?></span>
                        </td>
                    </tr>
                <?php endwhile; ?>
                <tr class="bg-white text-dark">
                    <td class="text-center py-3"><strong>Grand Total</strong></td>
                    <td class="text-primary py-3">
                        <strong>
                            Rp. <span class="float-end"><?= rupiah($grand_penjualan) ?></span>
                        </strong>
                    </td>
                    <td class="text-warning py-3">
                        <strong>
                            Rp. <span class="float-end"><?= rupiah($grand_pembelian) ?></span>
                        </strong>
                    </td>
                    <td class="text-danger py-3">
                        <strong>
                            Rp. <span class="float-end"><?= rupiah($grand_pengeluaran) ?></span>
                        </strong>
                    </td>
                    <td class="text-success py-3">
                        <strong>
                            Rp. <span class="float-end"><?= rupiah($total_pendapatan) ?></span>
                        </strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>