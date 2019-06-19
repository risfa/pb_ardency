<link rel="shortcut icon" href="img/favicon.png" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-social.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<?php
include "koneksi.php";
?>
<body onload="print()">
<h2 align="center">Buku Kas Umum Pengeluaran</h2>

<?php
$bln = $_GET['bln'];
if ($bln==1) {
	$bln="Januari";
} else if($bln==2){
	$bln="Februari";
}else if($bln==3){
	$bln="Maret";
}else if($bln==4){
	$bln="April";
}else if($bln==5){
	$bln="Mei";
}else if($bln==6){
	$bln="Juni";
}else if($bln==7){
	$bln="Juli";
}else if($bln==8){
	$bln="Agustus";
}else if($bln==9){
	$bln="September";
}else if($bln==10){
	$bln="Oktober";
}else if($bln==11){
	$bln="November";
}else if($bln==12){
	$bln="Desember";
}
?>

<table>
	<tr>
		<td>SKPD</td>
		<td>:</td>
		<td>Dinas Pangan</td>
	</tr>
	<tr>
		<td>BENDAHARA PENGELUARAN</td>
		<td>:</td>
		<td>Rita Aulia, SP</td>
	</tr>
	<tr>
		<td>Bulan</td>
		<td>:</td>
		<td><?php echo $bln." ".$tahun ?></td>
		<td><?php echo $sebelum ?></td>
	</tr>
</table>
<table align="center" border="1" cellspacing=0 class="data" style="margin-top:10px;">
	
        <thead>
        <tr>
        	<th>No</th>
        	<th>Tanggal</th>
        	<th>Kode Rekening</th>
            <th>Uraian</th>
            <th colspan=2>Penerimaan </th>
            <th colspan=2>Pengeluaran </th>
            <th colspan=2>Saldo </th>
            
        </tr>

        </thead>
        <tr>

        <?php
$sql2 = mysql_query("SELECT SUM(debit) AS masuk,SUM(kredit) AS keluar FROM tb_kas 
	WHERE month(tgl)='$_GET[bln]'-1") or die (mysql_error());
$data2 = mysql_fetch_array($sql2);
          ?>
        		<td></td>
				<td></td>
				<td></td>
				<td><b>Saldo Dari Bulan Lalu</b></td>
				<td style="border-right:0"><b>Rp.</b></td>
				<td style="border-left:0"><b><?php echo number_format($data2[masuk], 2, ".", ","); ?></b></td>
				<td style="border-right:0"><b>Rp.</b></td>
				<td style="border-left:0"><b><?php echo number_format($data2[keluar], 2, ".", ","); ?></b></td>
				<td style="border-right:0"><b>Rp.</b></td>
				<?php
				$sql = mysql_query("select * from tb_kas $qthn order by tgl asc") or die (mysql_error());
				while($data = mysql_fetch_array($sql)){
				$total=$data2[masuk]-$data2[keluar];
			?>
			<?php } ?>
				<td style="border-left:0"><b><?php echo number_format($total, 2, ".", ",") ?></b></td>

        </tr>
        <tbody id="barang">
        <?php
		if($_GET[tahun]!=""){
			if($_GET[bln]!=""){
				$bln="and month(tgl)=$_GET[bln]";
				if($_GET[tgl]!=""){
					$tgl="and day(tgl)=$_GET[tgl]";
				}
			}
			$qthn="where year(tgl)='$_GET[tahun]' $bln $tgl";
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
				
				<td style="border-right:0"><?php if($data[debit]!="" and $data[debit]!=0){echo"Rp.";} ?></td><td align="right" style="border-left:0;"><?php if($data[debit]!="" and $data[debit]!=0){echo number_format($data['debit'], 2, ".", ",");} ?></td>
				<td style="border-right:0"><?php if($data[kredit]!="" and $data[kredit]!=0){echo"Rp.";} ?></td><td align="right" style="border-left:0;"><?php if($data[kredit]!="" and $data[kredit]!=0){echo number_format($data['kredit'], 2, ".", ",");} ?></td>
				
				<td style="border-right:0">Rp. </td><td align="right" style="border-left:0;"><?php echo number_format($sub_tot1, 2, ".", ","); ?></td>
				
					
			</tr>
			<?php
			$no++;
			}
			?>
			<tr><td colspan=4><b>TOTAL</b></td><td style="border-right:0">Rp. </td><td align="right" style="border-left:0;"><?php echo number_format($tdebit, 2, ".", ","); ?></td><td style="border-right:0">Rp. </td><td align="right" style="border-left:0;"><?php echo number_format($tkredit, 2, ".", ","); ?></td><td style="border-right:0">Rp. </td><td align="right" style="border-left:0;"><?php echo number_format($sub_tot1, 2, ".", ","); ?></td></tr>
			<?php
		}
		?>
        </tbody>
		</table>
		<br>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
<tr>
<td width="40%" bgcolor="#FFFFFF">						  
	<div align="center"> Pengguna Anggaran<br/>
	<br/>
  	<br/><br/>
	<br/>
	<u><b>Rita Aulia,SP</b></u><br/>
	Pembina (IV/a)<br/>
	NIP : 19790417 200803 2 001<br/>
	</div>
    </td>
    <td width="37%" bgcolor="#FFFFFF">
    <div align="center"> <?php $tgl = date('d M Y');
echo "Kota Jantho, $tgl";?><br/>
	Bendahara Pengeluaran<br/>
  	<br/><br/>
	<br/><br/>
	<u><b>Rita Aulia,SP</b></u><br/>
	NIP : 19790417 200803 2 001<br/>
	</div></td>
</tr>
</table>
<body>