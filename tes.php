<?php

$tanggal = date('Y-m-d');
//echo"$tanggal";
//$jto=@mysql_real_escape_string($_POST['jto']);
$jto=6;
$hr="+$jto days";
$tgljto = date('Y-m-d',strtotime($hr,strtotime($tanggal)));
echo"$tgljto";

/** $tg="2012-11-02";
$tgl=date('Y-m-d',strtotime('+6 days',strtotime("2012-11-02")));
echo"$tgl";

**/
mysql_connect("localhost","root","");  
mysql_select_db("db_beton");  
?>
  <form>
  <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="2">
            <option value=""></option>
            <option value="United States">United States</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="Afghanistan">Afghanistan</option>
            <option value="Aland Islands">Aland Islands</option>
  </select>
  </form>     
  <script src="chosen/jquery.js" type="text/javascript"></script>
  <script src="chosen/chosen.jquery.js" type="text/javascript"></script>
  <script src="chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
  <script src="chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" href="chosen/chosen.css">

  <!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Tutorial Belajar JavaScript</title>
<script>
function tampilkan(){
  var id_user=document.getElementById("form1").kategori.value;
  if (id_user=="ID-100")
    {
        document.getElementById("nama").value = 'Ali';
        document.getElementById("email").value = 'ali@gmail.com';
    }
  else if (id_user=="ID-200")
    {
       document.getElementById("nama").value = 'Joko';
      document.getElementById("email").value = 'joko@gmail.com'; 
    }
}
</script>
</head>
<body>
<h2>Suckittrees.com</h2>
<form id="form1" name="form1" onsubmit="return false">
  <label>Pilih Kategori: </label>
  <select id="kategori" name="kategori" onchange="tampilkan()">
    <option value='0' disabled="disabled" selected/>Pilih</option>
    <option value="ID-100">ID-100</option>
    <option value="ID-200">ID-200</option>
  </select>
  <br/><br/>
   <label>Nama : </label> <input type='text' id="nama" name="nama"><br/><br/>
   <label>Email : </label> <input type='text' id="email" name="email">
</form>

</body>
</html>



<tr>
				<td>ID/Nama Pelanggan</td>
				<td>
			
<?php  
$q5 = mysql_query("select * from tb_pelanggan");  
$jsArray = "var pel = new Array();\n";
  
echo '<select name="prdId" onchange="changeValue(this.value)">';  
echo '<option>-------</option>';  
while ($row = mysql_fetch_array($q5)) {  
    echo '<option value="' . $row['idpel'] . '">' . $row['nmpel'] . '</option>';  
    $jsArray .= "pel['" . $row['idpel'] . "'] = {name:'" . addslashes($row['nmpel']) . "',desc:'".addslashes($row['jns'])."'};\n";  
}  
echo '</select>';  
?>  
<script type="text/javascript">  
<?php echo $jsArray; ?>
function changeValue(id){
document.getElementById('jns').value = pel[id].desc;
};
</script>
</td>
</tr>
<tr>
	<td>Status</td>
	<td><input type="text" id="jns" disabled=disabled /></td>
</tr>
			