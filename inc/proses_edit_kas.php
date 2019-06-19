<?php
include "koneksi.php";

$id = @mysql_real_escape_string($_GET['id']);
$nm_brg = @mysql_real_escape_string($_POST['nm_brg']);
$kd_brg = @mysql_real_escape_string($_POST['kd_brg']);
$kd_rek = @mysql_real_escape_string($_POST['kd_rek']);
$data = @mysql_real_escape_string($_POST['data']);
$saldo = @mysql_real_escape_string($_POST['saldo']);
$jenis = @mysql_real_escape_string($_POST['jenis']);
if($jenis=='Pengeluaran') {
mysql_query("update tb_kas set kdrek= '$kd_rek', ket= '$nm_brg',jenis = '$jenis',  tgl = '$kd_brg', kredit='$data'  where idkas = '$id'") or die (mysql_error());
}else{
mysql_query("update tb_kas set kdrek= '$kd_rek', ket= '$nm_brg',jenis = '$jenis',  tgl = '$kd_brg', debit='$data'  where idkas = '$id'") or die (mysql_error());
}
?>
<script>
	alert("kas berhasil diedit");
	window.location.href='../?page=laporan_keuangan&action=view';
</script>