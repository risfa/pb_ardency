<title>Tambah User</title>

<fieldset>
<legend>Tambah User</legend>

    <?php
    $id = @$_GET['id'];
    $sql = mysql_query("select * from tb_user where kode_user = '$id'") or die (mysql_error());
    $data = mysql_fetch_array($sql);
    ?>
    <form class="form-horizontal">
    <div class="form-group">
    	<label for="nm" class="col-md-2">Nama Lengkap </label>
        <div class="col-md-4">
        <input type="text" id="nm" class="form-control" value="<?php echo $data['nama_lengkap']; ?>">
        </div>
    </div>
	<div class="form-group">
    	<label for="user" class="col-md-2">Username </label>
        <div class="col-md-4">
        <input type="text" id="user" class="form-control" value="<?php echo $data['username']; ?>">
        </div>
    </div>
    <div class="form-group">
    	<label for="pass" class="col-md-2">Password </label>
        <div class="col-md-4">
        <input type="password" id="pass" class="form-control" value="<?php echo $data['pass']; ?>">
        </div>
    </div>
    <div class="form-group">
    	<label for="jk" class="col-md-2">Jenis Kelamin</label>
        <div class="col-md-2">
        	<select id="jk" class="form-control">	
				<option value="Laki-laki" >Laki-laki</option>
                <option value="Perempuan">Perempuan</option> 
        	</select>
        </div>
    </div>
    <input type="hidden" id="level" value="admin">
    
    <div class="form-group">
    	<label for="alamat" class="col-md-2">Alamat</label>
        <div class="col-md-4">
        <textarea id="alamat" class="form-control" rows="3"><?php echo $data['alamat']; ?></textarea>
        </div>
    </div>
    <div class="form-group">
    	<label for="tlp" class="col-md-2">No. Telepon</label>
        <div class="col-md-4">
        <input type="text" id="tlp" class="form-control" value="<?php echo $data['no_telepon']; ?>">
        </div>
    </div>
    <div class="form-group">
    	<label for="ket" class="col-md-2">Keterangan</label>
        <div class="col-md-4">
        <textarea id="ket" class="form-control" rows="3"><?php echo $data['keterangan']; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-4">
        <button id="edit" class="btn btn-success">Tambah</button>
        </div>
    </div>
    </form>

<script>

	$("#edit").click(function() {
		var nm = $("#nm").val();
		var user = $("#user").val();
		var pass = $("#pass").val();
		var jk = $("#jk").val();
		var alamat = $("#alamat").val();
		var tlp = $("#tlp").val();
		var ket = $("#ket").val();
		var level = $("#level").val();
		if(nm == '') {
			alert("Nama Lengkap tidak boleh kosong");
			$("#nm").focus();
		} else if(user == '') {
			alert("Username tidak boleh kosong");
			$("#user").focus();
		} else if(pass == '') {
			alert("Password tidak boleh kosong");
			$("#pass").focus();
		} else if(jk == '') {
			alert("Jenis kelamin harus dipilih");
			$("#jk").focus();
		} else if(alamat == '') {
			alert("Alamat tidak boleh kosong");
			$("#alamat").focus();
		} else if(tlp == '') {
			alert("Nomor telepon belum diisi");
			$("#tlp").focus();
		} else {
			$.ajax({
				type : 'post',
				url : 'inc/proses_tambah_petugas.php',
				data : 'nm='+nm+'&user='+user+'&pass='+pass+'&jk='+jk+'&alamat='+alamat+'&tlp='+tlp+'&ket='+ket+'&level='+level,
				success : function(msg){
					if(msg == 'admin') {
                        alert("Data akun berhasil di tambah");
                        window.location.href='?page=user&action=view';
                    } else {
                        alert("Data akun berhasil di tambah");
                    }
				}
			});
		}
	});
	</script>

    <div id="hasil_edit"></div>
</fieldset>