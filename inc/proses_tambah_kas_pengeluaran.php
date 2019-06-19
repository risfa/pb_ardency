<?php
include "koneksi.php";
$kd_brg = @mysql_real_escape_string($_POST['kd_brg']);
$kd_rek = @mysql_real_escape_string($_POST['kd_rek']);
$nm_brg = @mysql_real_escape_string($_POST['nm_brg']);
$hj = @mysql_real_escape_string($_POST['hj']);
$hb = @mysql_real_escape_string($_POST['hb']);
$saldo = @mysql_real_escape_string($_POST['saldo']);
$jenis = @mysql_real_escape_string($_POST['jenis']);

mysql_query("insert into tb_kas values ('', '$kd_rek', '$nm_brg','$jenis','$kd_brg','$hj','$hb')") or die (mysql_error());

?>
<script>
alert("Penambahan data kas sukses");
window.location.href='../?page=laporan_keuangan&action=view';
</script>