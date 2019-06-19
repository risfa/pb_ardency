<a href="?page=pemasok&action=input"><button style="border-top-left-radius:7px; border-bottom-left-radius:7px;">Tambah Pemasok</button></a> <a href="?page=pemasok&action=view"><button style="border-top-right-radius:7px; border-bottom-right-radius:7px;">Data Pemasok</button></a>
<div style="margin-top:10px;">
<?php if(@$_GET['action'] == 'input') {
	include "edit_visi.php";
} else if(@$_GET['action'] == 'view') {
	?>
	<title>Master Visi</title>
	<fieldset class="utama">
	<legend>Data Visi dan Misi</legend>
		<table class="data">
        <thead>
        <tr>
        	<th>No.</th>
            <th>Nama Pemasok</th>
			<th>Perusahaan</th>
			<th>Alamat</th>
			<th>No Hp</th>
            
            <th>Opsi</th>
        </tr>
        </thead>
        <tbody>
        <?php
		$sql = mysql_query("select * from tb_pemasok ") or die (mysql_error());
		$cek = mysql_num_rows($sql);
		$no = 1;
		if($cek < 1) { ?>
            <tr>
            	<td colspan="9" style="padding:10px;">Data tidak ditemukan</td>
            </tr> <?php
		} else {
			while($data = mysql_fetch_array($sql)) {
			?>
			<tr>
				<td align="center"><?php echo $no++; ?></td>
				<td><?php echo $data['nama_lengkap']; ?></td>
				<td><?php echo $data['perusahaan']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['nohp']; ?></td>
				
				<td><a href="?page=pemasok&action=edit&id=<?php echo $data['kode_user']; ?>"><button>Edit</button></a> <a onclick="return confirm('Yakin ingin menghapus pemasok ?');" href="?page=pemasok&action=delete&id=<?php echo $data['kode_user']; ?>"><button>Hapus</button></a></td>
			</tr> <?php
			}
		} ?>
        </tbody>
		</table>
	</fieldset> <?php
} else if(@$_GET['action'] == 'edit') {
	include "edit_visi.php";
} else if(@$_GET['action'] == "delete") {
	include "delete_pemasok.php";
} ?>
</div>