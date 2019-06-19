<title>Tambah Visi dan Misi</title>

<fieldset>
<legend>Tambah Visi dan Misi</legend>
    <table>
    <tr>
    	<td>Judul</td>
        <td>:</td>
        <td><input type="text" id="judul" /></td>
    </tr>
    <tr>
    	<td>Keterangan</td>
        <td>:</td>
        <td><textarea id="alamat"></textarea></td>
    </tr>
       
        <tr>
    	<td></td>
        <td></td>
        <td><button id="tambah">Simpan</button></td>
    </tr>
    <tr>
	    <td></td>
    </tr>
    </table>

<script>

	$("#tambah").click(function() {
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
				url : 'inc/proses_tambah_pemasok.php',
				data : 'nm='+nm+'&perusahaan='+perusahaan+'&alamat='+alamat+'&nohp='+nohp,
				success : function(msg){
					$("#hasil_tambah").html(msg);
				}
			});
		}
	});
	</script>

    <div id="hasil_tambah"></div>
</fieldset>