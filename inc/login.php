<title>Halaman Login</title>

<style>
h4 {
	background-color: #E67E22;
	color: #fff;
	padding: 10px;
	border-radius: 7px 7px 0 0 ;
}

.btn-success{
	background-color: #E67E22;
	border-color: #E67E22;
}

.alert-danger{
	display: none;
}

</style>

<div class="col-md-offset-4 col-md-4">
	<div class="container-fluid" style="border: 1px solid #ccc; border-radius: 5px">
	<h4><center>Halaman Login</center></h4>
    <form action="inc/proses_login.php" method="post">
    	<div class="form-group">
    		<input type="text" name="user" placeholder="Masukkan username" class="form-control" />
    	</div>
    	<div class="form-group">
    		<input type="password" name="pass" placeholder="Masukkan password"  class="form-control" />
    	</div>
    	<div class="form-group">
    		<center><button id="masuk" class="btn btn-success btn-block">Masuk</button></center>
    	</div> 
      </form>
       
    </div>
</div>
