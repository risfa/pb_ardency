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
    <div class="container-fluid" id="isi">
    	<?php
		  include('inc/laporan_keuangan2.php');
        ?>
    </div>
    
    <div id="footer">
    	MasMIT 
    </div>
</body>
</html>