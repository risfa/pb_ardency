<title>Edit Data Visi</title>

<fieldset>
<legend>Edit Data Visi</legend>

    <?php
    $id = @$_GET['id'];
    $sql = mysql_query("select * from tb_visi ") or die (mysql_error());
    $data = mysql_fetch_array($sql);
    ?>
    <table>
    <tr>
    	<td>Judul</td>
        <td>:</td>
        <td><input type="text" id="judul" value="<?php echo $data['judul']; ?>" /></td>
    </tr>
	<tr>
    	<td>Isi</td>
        <td>:</td>
        <td><textarea id="alamat"><?php echo $data['isi']; ?></textarea></td>
    </tr>
    
   
    <tr>
    	<td></td>
        <td></td>
        <td><button id="edit">Simpan</button></td>
    </tr>
    <tr>
	    <td></td>
    </tr>
    </table>

<script>

	$("#edit").click(function() {
		var judul = $("#judul").val();
		
		var alamat = $("#alamat").val();
		
		
		if(judul == '') {
			alert("Nama Lengkap tidak boleh kosong");
			$("#judul").focus();
		} else if(alamat == '') {
			alert("Perusahaan tidak boleh kosong");
			$("#alamat").focus();
				} else {
			$.ajax({
				type : 'post',
				url : 'inc/proses_edit_visi.php',
				data : 'judul='+judul+'&alamat='+alamat+'&id=<?php echo $id; ?>',
				success : function(msg){
					$("#hasil_edit").html(msg);
				}
			});
		}
	});
	</script>

    <div id="hasil_edit"></div>
</fieldset>