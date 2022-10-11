<?php
include("../../library.php");

$query   = "SELECT * FROM pengeluaran ORDER BY wkt_lr DESC";
$sql     = mysqli_query($conn, $query) or die(mysqli_error($conn));
$data    = array();
$no      = 1;

while ($list = mysqli_fetch_array($sql)) {
   $row    = array();

   $row[]  = '<p class="text-center my-0">' . $no++ . '</p>';
   $row[]  = '<p class="text-center my-0">' . tanggal($list['tgl_lr'])  . '</p>';
   $row[]  = '<p class="text-center my-0">' . $list['jns_lr'] . '</p>';
   $row[]  = 'Rp. <span class="float-end">' . rupiah($list['nmnl_lr']) . '</span>';
   $row[]  = '
         <div class="text-center">
            <div class="btn-group btn-group-sm">
               <a href="?view=pengeluaran-form&id=' . $list['id_lr'] . '" class="btn btn-sm btn-warning text-white" onclick="ubahForm(' . $list['id_lr'] . ')">
                  <i class="fa fa-edit"></i>
               </a>
               <a href="?view=pengeluaran-delete&id=' . $list['id_lr'] . '" class="btn btn-sm btn-danger" onclick="return confirm(`Apakah yakin ingin menghapus data ini?`)">
                  <i class="fa fa-trash"></i>
               </a>
            </div>
         </div>
   ';

   $data[] = $row;
}

$output = array("data" => $data);
echo json_encode($output);
