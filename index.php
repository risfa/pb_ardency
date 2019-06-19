<?php @session_start(); include "inc/koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="img/favicon.png" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-social.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/jquery-ui.css" />
</head>

<style>
	html{
		height: 100%;
	}

	body{
		margin: 0;
		position: relative;
		min-height: 100%;
		padding-bottom: 60px;
	}

	#isi{
		padding-top: 70px;
	}
	#menu{
		background-color: #2980B9;
	}
	#menu1{
		background-color: #2980B9;
	}
	#menu a{
		color: #fff;
		font-weight: 500;
	}
	#menu .dropdown li a{
		color: #fff;
	}

	.dropdown-menu{
		background-color: #2980B9;
	}
	
	.dropdown-menu li a:hover{
		background-color: #2980B9;
	}

	#footer{
		background-color: #2980B9;
		position:absolute;
		bottom:0;
		width:100%;
		height:40px;
		line-height: 40px;
   		text-align:center;
   		color:#ffffff;
	} 
</style>

<body>
	<div class="navbar navbar-inverse navbar-fixed-top" id="menu">
		<div class="container">
			<a href="#" class="navbar-brand"><b>BRAND</b>
			</a>
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="collapse navbar-collapse" id="menu1">
				<ul class="nav navbar-nav">

        <?php 
        if(@$_SESSION['admin']){ ?>
        <li class="utama"><a href="./"><span class="glyphicon glyphicon-home"></span> Home</a>
        	<ul>
        		<?php
        		if(@$_SESSION['admin']) {
        			$sesi = @$_SESSION['admin'];
        		} 
        		?>

        	</ul>
        </li>

        <?php		
        if(@$_SESSION['admin']) {
        	?> 

        	<li class="dropdown">
        		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span> Data Master <span class="caret"></span></a>
        		<ul class="dropdown-menu" role="menu" >
        			<li><a href="?page=user&action=view">Data User</a></li>

        		</ul>
        	</li>

        	<li><a href="?page=laporan_keuangan&action=view"><span class="glyphicon glyphicon-file"></span> Laporan Keuangan</a></li>
        	<?php
        } 
        ?>

        <li class="dropdown">
        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Setting <span class="caret"></span></a>
        	<ul class="dropdown-menu" role="menu" >
        		<!-- <li><a href="?page=visi"><span class="glyphicon glyphicon-plus-sign"></span> Halaman Utama</a></li> -->
        		<li><a href="?page=akun&id=<?php echo $sesi; ?>">Edit Akun</a></li>
        		<li><a href="?page=logout">Keluar</a></li>
        	</ul>
        </li>

        <?php 
    		} else {
    	?> 
    		<li><a href="?page=login">Silahkan login terlebih dahulu</a></li>
    	<?php 
    	} 
    	?>
        </ul>
    </div>
    </div>
    </div>
	<script src="inc/jquery.js"></script>
    <script src="inc/jquery-ui.js"></script>
    <script src="inc/jquery-number.js"></script>
    <!-- <script type="text/javascript" src="js/jquery.js"></script> -->
	<script type="text/javascript" src="js/bootstrap.js"></script>
    <script>
    $(function(){
        $(".datepicker").datepicker({
            changeMonth:true,
            changeYear:true,
            dateFormat:'dd-mm-yy',
            yearRange:'-25:+10'
        });
    });

    </script>
    <div class="container" id="isi">
    	<?php
		if(@$_GET['page'] == '') {
			if(@$_SESSION['admin']) {
				
    echo " <div style='text-align:center; font-size:30px;'>
           <div style='font-size:50px; font-family:impact;'>Sistem Informasi Kas</div>
					
					 </div>";     
				?> <?php
			} else {
				?><script>window.location.href="?page=login";</script><?php
			}
			} else if(@$_GET['page'] == "logout") {
			include "inc/logout.php";
			}else if(@$_GET['page'] == "user") {
			include "inc/user.php";
			} else if(@$_GET['page'] == "laporan_keuangan") {
			include "inc/laporan_keuangan.php";
			} else if(@$_GET['page'] == "visi") {
			include "inc/edit_visi.php";
			} else if(@$_GET['page'] == "login") {
            include "inc/login.php";
        	} else if(@$_GET['page'] == "akun") {
            include "inc/akun.php";
        	} ?>
    </div>
    
    <div id="footer">
    	&copy; Copyright 2017 - All Right Reserved
    </div>
</body>
</html>