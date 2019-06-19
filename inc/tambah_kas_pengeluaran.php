<title>Tambah kas</title>
<fieldset>
	<legend>Input Data Pengeluaran</legend>
    <form method="post" action="inc/proses_tambah_kas_pengeluaran.php" class="form-horizontal">
    <div class="form-group">
    	<label for="kd_brg" class="col-md-2">Tanggal</label>
        <div class="col-md-4">
        <input type="date" name="kd_brg" id="kd_brg" placeholder="yyyy-mm-dd" class="form-control" />
        </div>
    </div>
    <div class="form-group">
    	<label for="kd_rek" class="col-md-2" >Kode Rekening</label>
        <div class="col-md-4">
        <input type="text" name="kd_rek" id="kd_rek" class="form-control" />
        </div>
    </div>
	<div class="form-group">
    	<label for="nm_brg" class="col-md-2">Uraian</label>
        <div class="col-md-4">
        <input type="text" name="nm_brg" id="nm_brg" class="form-control" />
        </div>
    </div>

    <input type="hidden" name="jenis" id="jenis" value="Pengeluaran" readonly="" />

    <div class="form-group">
    	<label for="hb" class="col-md-2">Pengeluaran</label>
        <div class="col-md-4">
        <i>Rp. </i>
        <input type="text" name="hb" id="hb" class="form-control" />
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-offset-2 col-md-4">
        <input name="tambah" type="submit" value="Tambah" class="btn btn-success" />
        </div>
    </div>
    </form>
    <script>

	$("#tambah").click(function(){
		var kd_brg = $("#kd_brg").val();
		var kd_rek = $("#kd_rek").val();
		var nm_brg = $("#nm_brg").val();
		var satuan = $("#satuan").val();
		var jenis = $("#jenis").val();

		var hj = $("#hj").val();
		var hb = $("#hb").val();
		var saldo = $("#saldo").val();
		var tgl = $("#tgl").val();
		if(kd_brg == '')
		{
			alert("Kode kas tidak boleh kosong");
			$("#kd_brg").focus();
		}
		else if(nm_brg == '')
		{
			alert("Nama kas tidak boleh kosong");
			$("#nm_brg").focus();
		}
		else if(kd_rek == '')
		{
			alert("No Rekening tidak boleh kosong");
			$("#kd_rek").focus();
		}
		else if(satuan == '')
		{
			alert("Satuan tidak boleh kosong");
			$("#satuan").focus();
		}
		
		else if(hj == '')
		{
			alert("Harga jual tidak boleh kosong");
			$("#hj").focus();
		}
		else if(s_awal == '')
		{
			alert("Stok awal jual tidak boleh kosong");
			$("#s_awal").focus();
		}
		else if(tgl == '')
		{
			alert("Tanggal treakhir kas masuk tidak boleh kosong");
			$("#tgl").focus();
		}
		else
		{
			$.ajax({
				type : 'post',
				url : 'inc/proses_tambah_kas_pengeluaran.php',
				data : 'kd_brg='+kd_brg+'kd_rek='+kd_rek+'&nm_brg='+nm_brg+'&hj='+hj+'&hb='+hb+'&saldo='+saldo+'&jenis='+jenis,
				success : function(msg){
					$("#hasil_tambah").html(msg);
				}
			});
		}
	});
	</script>
    <div name="hasil_tambah"></div>
</fieldset>