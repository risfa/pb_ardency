<?php

$edit=mysql_query("SELECT * FROM tb_visi ");
    $r=mysql_fetch_array($edit);
echo "<h4>Edit Visi Misi</h4>
	<hr><br>
          <form method=POST action=inc/proses_edit_visi.php>
          <input type=hidden name=id value='$r[id_visi]'>
          <table class='table table-bordered table-striped'>
          <tr><td>Judul </td><td>  <input type=text name='judul' value='$r[judul]' size=15 ></td></tr>
		  <tr><td>Detail </td><td>  <textarea name='detail' rows='15' class='form-control' >$r[isi]</textarea></td></tr>

		  	  		  
		  
          <tr><td colspan=2><button id='edit'>Simpan</button>
                            </td></tr>
          </table></form>";
		  ?>