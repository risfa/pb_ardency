<?
if($_POST[tahun]!=""){
$thn="?tahun=$_POST[tahun]";
	if($_POST[bln]!=""){
		$bln="&bln=$_POST[bln]";
		if($_POST[tgl]!=""){
			$tgl="&tgl=$_POST[tgl]";
		}
	}
	
}

echo"<a href='?page=laporan_keuangan&action=inputpenerimaan' class='btn btn-primary'><span class='glyphicon glyphicon-plus-sign'></span> Input Penerimaan</a> ";
echo"<a href='?page=laporan_keuangan&action=inputpengeluaran' class='btn btn-primary'><span class='glyphicon glyphicon-plus-sign'></span> Input Pengeluaran</a> ";
echo"<a href='inc/cetaklap2.php$thn$bln$tgl' target='_blank' class='btn btn-primary'><span class='glyphicon glyphicon-print'></span> Cetak</a>";

?>
<div style="margin-top:10px;">
<?php
	date_default_timezone_set('Asia/Jakarta');
	$thn_skr=date('Y');


if(@$_GET['action'] == 'inputpenerimaan')
 {
	include "tambah_kas_penerimaan.php";
 }
 else if(@$_GET['action'] == 'inputpengeluaran'){
 	include "tambah_kas_pengeluaran.php";
 }
else if(@$_GET['action'] == 'view')
{
	?>
	<title>Laporan Keuangan</title>
    <fieldset class="utama">
    <legend>Laporan Keuangan</legend>
    <form action="" method="post" class="form-inline">
		<?php
		
		$nmbulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	echo "<div class='form-group'>";
	echo "<label> Tanggal : </label>";
	echo " <select name='tgl' class='form-control'>
	<option value=''>Pilih</option>";
	for($h=1;$h<=31;$h++){
	echo "<option value='$h'>$h</option>";
	}
	echo "</select>";
	echo "</div>";

	echo "<div class='form-group' style='margin-left:10px'>";
	echo " <label>Bulan : </label>";
	echo " <select name='bln' class='form-control'>
	<option value=''>Pilih</option>";
	for($b=1;$b<=12;$b++){
	echo "<option value='$b'>$nmbulan[$b]</option>";
	}
	echo "</select>";
	echo "</div>";
	?>

	<div class="form-group" style="margin-left:10px">
	<label>Tahun :</label> 
	<select name="tahun" class="form-control">
		<option value="">Pilih</option>
			<?php
			for($t=2010;$t<=$thn_skr;$t++){
				echo"<option value='$t'>$t</option>";
			}
			?>
	</select> 
	</div>

	<button type='submit' value='Cari' class="btn btn-success"><span class='glyphicon glyphicon-search'></span> Cari</button>
	</form>
        <table class="table table-hover table-bordered" style="margin-top:10px;">
        <thead>
        <tr class="info">
        	<th>No</th>
        	<th>Tanggal</th>
        	<th>Kode Rekening</th>
            <th>Uraian</th>
            <th colspan=2>Penerimaan </th>
            <th colspan=2>Pengeluaran </th>
            <th colspan=2>Saldo </th>
            
	            <th>Opsi</th>
        </tr>
        </thead>
        <tbody id="laporan_keuangan">
        <?php
		if($_POST[tahun]!=""){
			if($_POST[bln]!=""){
				$qbln="and month(tgl) = '$_POST[bln]'";
				if($_POST[tgl]!=""){
				$qtgl="and day(tgl) = '$_POST[tgl]'";
				}
			}
			$qthn="where year(tgl)='$_POST[tahun]' $qbln $qtgl";
		}

		$sql = mysql_query("select * from tb_kas $qthn order by tgl asc") or die (mysql_error());
		$cek = mysql_num_rows($sql);
		if($cek < 1)
		{
			?>
            <tr>
            	<td colspan="8" style="padding:10px;">Kas tidak ditemukan</td>

            </tr>
            <?php
		}
		else
		{
		$no=1;
			while($data = mysql_fetch_array($sql))
			{
			if($data[jenis]=="Pengeluaran"){
			$sub_tot1=$sub_tot1-$data[kredit];
			}else{
			$sub_tot1=$sub_tot1+$data[debit];
			}
			
			$tdebit=$tdebit+$data[debit];
			$tkredit=$tkredit+$data[kredit];
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data['tgl']; ?></td>
				<td><?php echo $data['kdrek']; ?></td>
				<td><?php echo $data['ket']; ?></td>
				
				<td style="border-right: 0;"><?php if($data[debit]!="" and $data[debit]!=0){echo"Rp.";} ?></td><td align="right" style="border-left:0;"><?php if($data[debit]!="" and $data[debit]!=0){echo number_format($data['debit'], 2, ".", ",");} ?></td>
				<td style="border-right: 0;"><?php if($data[kredit]!="" and $data[kredit]!=0){echo"Rp.";} ?></td><td align="right" style="border-left:0;"><?php if($data[kredit]!="" and $data[kredit]!=0){echo number_format($data['kredit'], 2, ".", ",");} ?></td>
				
				<td style="border-right: 0;">Rp. </td><td align="right" style="border-left:0;"><?php echo number_format($sub_tot1, 2, ".", ","); ?></td>
				
				<td><a href="?page=laporan_keuangan&action=edit&id=<?php echo $data['idkas']; ?>" class="btn btn-warning">Edit</a> <a onclick="return confirm('Yakin ingin menghapus data ?');" href="?page=laporan_keuangan&action=hapus&id=<?php echo $data['idkas']; ?>" class="btn btn-danger">Hapus</a></td>
					
			</tr>
			<?php
			$no++;
			}
			?>
			<tr>
				<td colspan=4><b>TOTAL</b></td>
				<td style="border-right: 0;">Rp. </td>
				<td align="right" style="border-left:0;"><?php echo number_format($tdebit, 2, ".", ","); ?></td>
				<td style="border-right: 0;">Rp. </td><td align="right" style="border-left:0;"><?php echo number_format($tkredit, 2, ".", ","); ?></td>
				<td style="border-right: 0;">Rp. </td><td align="right" style="border-left:0;"><?php echo number_format($sub_tot1, 2, ".", ","); ?></td>
				<td></td>
			</tr>
			<?php
		}
		?>
        </tbody>
		</table>
    </fieldset>
    <script>
	function cari() {
		var masukan = $("#pencarianlaporan_keuangan").val();
		var tgl = $("#cari_laporan_keuangan_dgn_tgl").val();
		$.ajax({
			data : 'masukanpencarian='+masukan+'&tglpencarian='+tgl,
			type : 'post',
			url : 'inc/proses_cari_laporan_keuangan.php',
			success : function(msg){
				$("tbody#laporan_keuangan").html(msg);
			} 
		});
	};
	
	$("#carilaporan_keuangan").click(function(){
		cari();
	});
	$("#pencarianlaporan_keuangan").keyup(function(e){
		if(e.keyCode == 13) {
			cari();
		}
	});
	</script>
    <?php
}
else if(@$_GET['action'] == 'edit')
{
	include "edit_kas.php";
}
else if(@$_GET['action'] == "hapus")
{
	include "delete_kas.php";
}
?>
</div>
	