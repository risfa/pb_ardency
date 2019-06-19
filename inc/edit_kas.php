<title>Edit Data kas</title>

<fieldset>
<legend>Edit Data kas</legend>

    <?php
    $id = @$_GET['id'];
    $sql = mysql_query("select * from tb_kas where idkas = '$id'") or die (mysql_error());
    $data = mysql_fetch_array($sql);
    ?>
    <form action='inc/proses_edit_kas.php?id=<?php echo "$id";?>' method='post' class="form-horizontal">
    <div class="form-group">
    	<label for="kd_brg" class="col-md-2">Tanggal</label>
        <div class="col-md-4">
        	<input type="date" id="id" name="id" value="<?php echo"$data[idkas]"; ?>" hidden=hidden />
        	<input type="date" id="kd_brg" class="form-control" name="kd_brg" value="<?php echo"$data[tgl]";?>" placeholder="yyyy-mm-dd" />
        </div>
    </div>
    <div class="form-group">
    	<label for="kd_rek" class="col-md-2" >Kode Rekening</label>
        <div class="col-md-4">
        <input type="text" name="kd_rek" id="kd_rek" class="form-control" value="<?php echo"$data[kdrek]";?>" />
        </div>
    </div>
	<div class="form-group">
    	<label for="nm_brg" class="col-md-2">Keterangan</label>
        <div class="col-md-4">
        <input type="text" class="form-control" id="nm_brg" name="nm_brg" value="<?php echo"$data[ket]"; ?>" />
        </div>
    </div>
    <div class="form-group">
    	<label for="jenis" class="col-md-2">Jenis</label>
        <div class="col-md-4">
        <input type="text" class="form-control" id="jenis" name="jenis" value="<?php echo"$data[jenis]"; ?>" />
        </div>
    </div>

    <?php 
    $sql = mysql_query("SELECT * FROM tb_kas WHERE idkas='$_GET[id]'");
    $data = mysql_fetch_array($sql);
     ?>
    <div class="form-group">
    	<label for="hb" class="col-md-2">
    	<?php
			if($data[jenis]=="Pendapatan"){
			echo "Penerimaan";
			$rp=$data[debit];
			}else{
			echo "Pengeluaran";
			$rp=$data[kredit];
		}
    	?>
    	</label>
        <div class="col-md-4">
        <i>Rp. </i>
        <input type="text" class="form-control" name="data" id="data" value="<?php echo"$rp"; ?>" style="width:177px;" />
        </div>
    </div>
   
    <div class="form-group">
        <div class="col-md-offset-2 col-md-4">
        <input name="tambah" type="submit" value="Edit" class="btn btn-success"/>
        </div>
    </div>
    </form>

<script>

	$("#edit").click(function() {
		var id = $("#id").val();
		var kd_brg = $("#kd_brg").val();
		var kd_rek = $("#kd_rek").val();
		var nm_brg = $("#nm_brg").val();
		var data = $("#data").val();
		var jenis = $("#jenis").val();
		
		if(nm == '') {
			alert("Nama Lengkap tidak boleh kosong");
			$("#nm").focus();
		} else if(user == '') {
			alert("Perusahaan tidak boleh kosong");
			$("#user").focus();
		} else if(alamat == '') {
			alert("alamat tidak boleh kosong");
			$("#alamat").focus();
		} else if(nohp == '') {
			alert("Nomor telepon belum diisi");
			$("#nohp").focus();
		} else {
			$.ajax({
				type : 'post',
				url : 'inc/proses_edit_kas.php',
				data : 'id='+id+'&kd_brg='+kd_brg+'&kd_rek='+kd_rek+'&nm_brg='+id+'&data='+data+'&jenis='+jenis+'&id=<?php echo $id; ?>',
				success : function(msg){
					$("#hasil_edit").html(msg);
				}
			});
		}
	});
	</script>

    <div id="hasil_edit"></div>
</fieldset>