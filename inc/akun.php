<title>Edit Akun Admin</title>

<fieldset>
<legend>Edit Akun Admin</legend>

    <?php
    $id = @$_GET['id'];
    $sql = mysql_query("select * from tb_user where kode_user = '$id'") or die (mysql_error());
    $data = mysql_fetch_array($sql);
    ?>
    <form class="form-horizontal">
    <div class="form-group">
    	<label for="nm" class="col-md-2">Nama Lengkap</label>
        <div class="col-md-4">
        <input type="text" id="nm" value="<?php echo $data['nama_lengkap']; ?>" class="form-control" />
        </div>
    </div>
	<div class="form-group">
    	<label for="user" class="col-md-2">Username</label>
        <div class="col-md-4">
        <input type="text" id="user" value="<?php echo $data['username']; ?>" class="form-control" />
        </div>
    </div>
    <div class="form-group">
    	<label for="pass" class="col-md-2">Password</label>
        <div class="col-md-4">
        <input type="text" id="pass" value="<?php echo $data['pass']; ?>" class="form-control" />
        </div>
    </div>
    <div class="form-group">
    	<label for="jk" class="col-md-2">Jenis Kelamin</label>
        <div class="col-md-2">
        	<select id="jk" class="form-control">
        		<?php
                if($data['jenis_kelamin'] == "Laki-laki") { ?>
                    <option value="Laki-laki" selected="selected">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option> <?php
                } else if($data['jenis_kelamin'] == "Perempuan") { ?>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan" selected="selected">Perempuan</option> <?php
                }
                ?>
        	</select>
        </div>
    </div>
    <div class="form-group">
    	<label for="alamat" class="col-md-2">Alamat</label>
        <div class="col-md-4">
        <textarea id="alamat" class="form-control" rows="5"><?php echo $data['alamat']; ?></textarea>
        </div>
    </div>
    <div class="form-group">
    	<label for="tlp" class="col-md-2">No. Telepon</label>
        <div class="col-md-4">
        <input type="text" id="tlp" value="<?php echo $data['no_telepon']; ?>" class="form-control" />
        </div>
    </div>
    <div class="form-group">
    	<label for="ket" class="col-md-2">Keterangan</label>
        <div class="col-md-4">
        <textarea id="ket" class="form-control" rows="5"><?php echo $data['keterangan']; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-4">
        <button id="edit" class="btn btn-success">Edit</button>
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
				url : 'inc/proses_edit_petugas.php',
				data : 'nm='+nm+'&user='+user+'&pass='+pass+'&jk='+jk+'&alamat='+alamat+'&tlp='+tlp+'&ket='+ket+'&id=<?php echo $id; ?>',
				success : function(msg){
					if(msg == 'admin') {
                        alert("Data akun berhasil di edit");
                        window.location.href='?page=petugas&action=view';
                    } else {
                        alert("Data akun berhasil di edit");
                    }
				}
			});
		}
	});
	</script>

    <div id="hasil_edit"></div>
</fieldset>