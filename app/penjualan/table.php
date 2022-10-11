<?php
include("../../library.php");

$query   = "SELECT * FROM penjualan ORDER BY wkt_jl DESC";
$sql     = mysqli_query($conn, $query) or die(mysqli_error($conn));
$data    = array();
$no      = 1;

while ($list = mysqli_fetch_array($sql)) {
   $row    = array();

   $row[]  = '<p class="text-center my-0">' . $no++ . '</p>';
   $row[]  = '<p class="text-center my-0">' . tanggal($list['tgl_jl']) . '</p>';
   $row[]  = '<p class="text-center my-0">' . $list['nama_customer'] . '</p>';
   $row[]  = '<p class="text-center my-0">' . $list['item_jl'] . '</p>';
   $row[]  = 'Rp. <span class="float-end">' . rupiah($list['total_jl']) . '</span>';
   $row[]  = '<p class="text-center my-0">' . number_format($list['disk_jl']) . ' %</>';
   $row[]  = 'Rp. <span class="float-end">' . rupiah($list['byr_jl']) . '</span>';
   $row[]  = '
         <div class="text-center">
            <div class="btn-group btn-group-sm">
               <a class="btn btn-sm btn-warning" href="?view=penjualan-detail&status=ubah&id=' . $list['id_jl'] . '">
                  <i class="fa fa-eye"></i>
               </a>
               <a onclick="return confirm(`Apakah yakin ingin menghapus data ini?`)"href="?view=penjualan-hapus&id=' . $list['id_jl'] . '" class="btn btn-sm btn-danger">
                  <i class="fa fa-trash"></i>
               </a>
            </div>
         </div>
   ';

   $data[] = $row;
}

$output = array("data" => $data);
echo json_encode($output);
