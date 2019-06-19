<?php
include "koneksi.php";

$id = @mysql_real_escape_string($_POST['id']);
$judul = @mysql_real_escape_string($_POST['judul']);
$detail = @mysql_real_escape_string($_POST['detail']);

mysql_query("update tb_visi set judul = '$judul', isi = '$detail' where id_visi = '$id'") or die (mysql_error());
 echo"<script>alert('Data Berhasil Disimpan');window.location.href='../'</script>";
?>

