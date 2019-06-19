<?php
$kd_brg = @$_GET['id'];
mysql_query("delete from tb_kas where idkas = '$kd_brg'") or die (mysql_error());
?>
<script>
alert("Data kas dengan kode <?php echo $kd_brg; ?> berhasil dihapus");
window.location.href='?page=laporan_keuangan&action=view';
</script>