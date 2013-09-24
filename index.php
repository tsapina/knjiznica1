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
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
	
</head>
<body>
<div class="container">
<?php
if(isset($_POST['submit']))
{
	$ime = $_POST['ime'];
	$zaporka = sha1($_POST['zaporka']);
	$sql = "SELECT * FROM admin WHERE korisnicko_ime='{$ime}' AND zaporka='{$zaporka}'";
	$rez = upit($sql);
	if (isset($rez[0]) == true) {
		$_SESSION['korisnik_ID'] = $rez[0]['admin_ID'];
		$_SESSION['ime'] = $rez[0]['korisnicko_ime'];
		$_SESSION['logiran'] = 1;
	} 
	else 
	{
		echo "greška prilikom prijave";
	}
	
	if (isLogiran() == true) 
	{
		header('Location: autori.php');
	}
}

?>
<form class="form-signin" action="index.php" method="post">
	<h2 class="form-signin-heading">Admin Login</h2>
	<input type="text" class="input-block-level" placeholder="Korisničko ime" name="ime">
	<input type="password" class="input-block-level" placeholder="Zaporka" name="zaporka">
	<button class="btn btn-large btn-primary" type="submit" name="submit">Logiraj me</button>
</form>
</div> <!-- /container -->
</body>
</html>