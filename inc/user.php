<?php
if(@$_SESSION['admin']) { ?>
	<a href="?page=user&action=input" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> INPUT USER</a> 
<?php } ?>
<a href="?page=user&action=view" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span> LIHAT DATA USER</a>
<div style="margin-top:10px;">
<?php
if(@$_GET['action'] == 'input')
{
	include "tambah_user.php";
}
else if(@$_GET['action'] == 'view')
{
	?>
	<title>Master user</title>
    <fieldset class="utama">
    <legend>Data user</legend>
	<?php 

?>
    <!-- <div class="table-responsive"> -->		
        <table class="table table-hover table-bordered table-responsive" style="">
        <thead>
        <tr class="info">
        	<th>Kode user</th>
            <th>Username</th>
            <th>Nama Lengkap </th>
            <th>Jenis Kelamin</th>
            <th>No.Telp</th>
            <th>Alamat</th>
            <th>Level</th>
            
	        <th>Opsi</th>
	      
        </tr>
        </thead>
        <tbody id="user">
        <?php
		$sql = mysql_query("select * from tb_user") or die (mysql_error());
		$cek = mysql_num_rows($sql);
		if($cek < 1)
		{
			?>
            <tr>
            	<td colspan="7" style="padding:10px;">Data tidak ditemukan</td>
            </tr>
            <?php
		}
		else
		{
			while($data = mysql_fetch_array($sql))
			{
			?>
			<tr>
				<td><?php echo $data['kode_user']; ?></td>
				<td><?php echo $data['username']; ?></td>
				<td><?php echo $data['nama_lengkap']; ?></td>
				
				<td><?php echo $data['jenis_kelamin']; ?></td>
				<td><?php echo $data['no_telepon']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['level']; ?></td>
				
					<td><a href="?page=user&action=edit&id=<?php echo $data['kode_user']; ?>" class="btn btn-warning">Edit</a> <a onclick="return confirm('Yakin ingin menghapus data ?');" href="?page=user&action=hapus&id=<?php echo $data['kode_user']; ?>" class="btn btn-danger">Hapus</a></td>
				
			</tr>
			<?php
			}
		}
		?>
        </tbody>
		</table>
	<!-- </div> -->
    </fieldset>
    <script>
	function cari() {
		var masukan = $("#pencarianuser").val();
		var tgl = $("#cari_user_dgn_tgl").val();
		$.ajax({
			data : 'masukanpencarian='+masukan+'&tglpencarian='+tgl,
			type : 'post',
			url : 'inc/proses_cari_user.php',
			success : function(msg){
				$("tbody#user").html(msg);
			} 
		});
	};
	
	$("#cariuser").click(function(){
		cari();
	});
	$("#pencarianuser").keyup(function(e){
		if(e.keyCode == 13) {
			cari();
		}
	});
	</script>
    <?php
}
else if(@$_GET['action'] == 'edit')
{
	include "edit_user.php";
}
else if(@$_GET['action'] == "hapus")
{
	include "delete_user.php";
}
?>
</div>
	