<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<?php 
include 'php/init.php'; 


?>
<head>
    <meta charset="utf-8">
    <title>Bootstrap Exercise</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.css" />

    <link rel="stylesheet" href="css/bootstrap-responsive.css" />
    <link rel="stylesheet" href="css/custom.css" />

    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
	<!-- Menu -->
	<div class="navbar navbar-fixed-top">
		 <div class="navbar-inner">
		 	<div class="container">
			    <ul class="nav nav-tabs">
			      <li <?php if($currentPage == 'autori.php') echo "class=\"active offset3\"";?> class="offset3"><a href="autori.php">Autori</a></li>
			      <li <?php if($currentPage == 'knjige.php') echo "class=\"active\"";?>><a href="knjige.php">Knjige</a></li>
			      <li <?php if($currentPage == 'izdavaci.php') echo "class=\"active\"";?>><a href="izdavaci.php">Izdavaći</a></li>
			      <li <?php if($currentPage == 'korisnici.php') echo "class=\"active\"";?>><a href="korisnici.php">Korisnici</a></li>
			      <li <?php if($currentPage == 'posudbe.php') echo "class=\"active\"";?>><a href="posudbe.php">Posudbe</a></li>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
				<li id="upis" class="dropdown offset2">
					<a href="#" class="dropdown-toggle btn-info" style="border-radius: 8px; margin: 1px; color: white;" data-toggle="dropdown"><?php echo $_SESSION['ime']; ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="profil.php">Profil</a></li>
						<li><a href="odjava.php">Odjava</a></li>
					</ul>
				</li>
			 </div>
		  </div>
	</div><!-- End of menu -->
	<!-- Container-->
 	<div class="container">
	  <div class="row">
	  	<div class="span9 well offset1">