<?php
$status = $_GET['status'];
$jualID = $_GET['id'];

$query = "SELECT * FROM penjualan WHERE id_jl=$jualID LIMIT 1";
$sql   = mysqli_query($conn, $query) or die(mysqli_error($conn));
$data  = mysqli_fetch_array($sql);
?>
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-md-6 col-12 mb-2">
            <h2 class="fw-bold">Grand Total Penjualan</h2>
        </div>
        <div class="col-md-6 col-12 mb-2 text-md-end">
            <h2 class="fw-bold">Rp. <span id="textGrandTotal"></span>,-</h2>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <form class="row row-cols-lg-auto g-3 align-items-center" action="?view=penjualan-detail-tambah&status=<?= $status ?>&id=<?= $_GET['id'] ?>" method="POST">
                <div class="col-12">
                    <div class="input-group">
                        <div class="input-group-text">
                            Barang/Produk
                        </div>
                        <select class="form-select" id="id_produk" name="id_produk" required>
                            <option value="" selected>-- Silakan Pilih Barang/Produk --</option>
                            <?php
                            $query   = "SELECT * FROM produk ORDER BY wkt_prd DESC";
                            $sql     = mysqli_query($conn, $query) or die(mysqli_error($conn));
                            while ($produk  = mysqli_fetch_array($sql)) :
                            ?>
                                <option value="<?= $produk['id_prd'] ?>">
                                    <?= $produk['nama_prd'] ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <div class="input-group-text">
                            Qty
                        </div>
                        <input class="form-control" type="number" name="jml_jdet" placeholder="0" required>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-8 col-12 mb-2">
            <table class="table table-sm table-hover align-middle">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Nama Produk</th>
                        <th class="text-center" width="100">Harga</th>
                        <th class="text-center" width="80">Qty</th>
                        <th class="text-center" width="120">Total</th>
                        <th class="text-center" width="80">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $jual_id = $_GET['id'];
                    $query   = "SELECT * FROM penjualan_detail JOIN produk ON penjualan_detail.prd_id=produk.id_prd WHERE jual_id=$jual_id ORDER BY id_jdet DESC";
                    $sql     = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    $total   = 0;
                    $item    = mysqli_num_rows($sql);

                    while ($list = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <td>
                                <p class="text-start my-0"><?= $list['nama_prd'] ?></p>
                            </td>
                            <td>
                                Rp. <span class="float-end"><?= rupiah($list['jual_prd']) ?></span>
                            </td>
                            <td>
                                <p class="text-center my-0"><?= number_format($list['jml_jdet']) ?></p>
                            </td>
                            <td>
                                Rp.
                                <span class="float-end">
                                    <?= rupiah($list['jual_prd'] * $list['jml_jdet']) ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="?view=penjualan-detail-hapus&status=<?= $status ?>&id-jual=<?= $_GET['id'] ?>&id-prd=<?= $list['id_prd'] ?>&qty=<?= $list['jml_jdet'] ?>" class="btn btn-sm btn-danger rounded-circle">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                        $total += $list['jual_prd'] * $list['jml_jdet'];
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4 col-12 mb-2">
            <div class="card">
                <div class="card-body">
                    <form action="?view=penjualan-submit" method="POST" class="row g-3">
                        <input type="hidden" name="id_jl" value="<?= $_GET['id'] ?>">
                        <div class="col-12">
                            <label class="form-label">Nama Customer</label>
                            <input type="text" class="form-control" name="nama" value="<?= $data['nama_customer'] ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="item">Item</label>
                            <input type="text" class="form-control" name="item" id="item" value="<?= $item ?>" readonly>
                        </div>
                        <div class="col-md-8">
                            <label for="id">Total</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    Rp.
                                </div>
                                <input type="text" class="form-control text-end" name="total" id="total" value="<?= $total ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="id">Diskon</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="diskon" id="diskon" value="<?= ($status == 'ubah') ? $data['disk_jl'] : 0 ?>" required>
                                <div class="input-group-text">
                                    %
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label for="id">Grand Total</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    Rp.
                                </div>
                                <input type="text" class="form-control text-end" name="grandtotal" id="grandtotal" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fa fa-check-circle"></i> Simpan penjualan
                            </button>
                            <a href="?view=penjualan" class="btn btn-danger w-100 mt-2">
                                <i class="fa fa-times"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>