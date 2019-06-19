<?php
@session_start();
include "koneksi.php";
$user = @mysql_real_escape_string($_POST['user']);
$pass = @mysql_real_escape_string($_POST['pass']);
$pass = md5($pass); 
$sql = mysql_query("select * from tb_user where username = '$user' and password = '$pass'") or die (mysql_error());
$cek = mysql_num_rows($sql);
if($cek >= 1)
{
	$data = mysql_fetch_array($sql);
	$id_user = $data['kode_user'];
	if($data['level'] == "admin")
	{
		@$_SESSION['admin'] = $id_user;
		?>  <?php
		 echo"<script>alert('Sukses Login');window.location.href='../index.php'</script>";
	}
}
else
{
 echo"<script>alert('Gagal Login');window.location.href='../'</script>";
	?>  <?php
}
?>