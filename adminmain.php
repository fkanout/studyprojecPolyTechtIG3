<?php

include 'checklogin.php';
session_start();
if (isset($_SESSION['name'])){


$nameofsession=$_SESSION['name'];

}
else
{
header("location:index.html");
}


 ?>
 

 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<meta charset="utf-8">
<title>Reseau TAM - Page de l'administrateur </title>
	
	


	<!-- Start css3menu.com HEAD section -->

	<link rel="stylesheet" href="admin_files/css3menu0/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
	<link href="css/styletext.css" rel="stylesheet" type="text/css" />

	<!-- End css3menu.com HEAD section -->

</head>

<body background="img/Backround1.png">


 
<!-- Start css3menu.com BODY section -->

<ul id="css3menu0" class="topmenu">

	<li class="topmenu"><a href="#" style="width:100px;height:27px;line-height:27px;"><img src="admin_files/css3menu0/plus3.png" alt=""/>Ajouter</a>
			<ul>
			<li><a href="admin_ajoute_rames.php">RAMES</a></li>

			<li class="sublast"><a href="admin_ajoute_voyages.php">VOYAGES</a></li>
		</ul></li>

	<li class="topmenu"><a href="#" style="width:99px;height:27px;line-height:27px;"><span><img src="admin_files/css3menu0/search2.png" alt=""/>Rechercher</span></a>

	<ul>

			<li class="subfirst"><a href="admin_recherche_rames.php">RAMES</a></li>


	

		<li class="sublast"><a href="admin_recherche_cond.php">CONDUCTEURS</a></li>

	</ul></li>

	

</ul>

<!-- End css3menu.com BODY section -->





<form name="form1"  method="post" action="logout.php" >
			<p class="submit"><input name="Submit" type="submit" value="Deconnexion"></p>
</form>
<?php 

echo "Administrateur en ligne : <font color='red'>$nameofsession</font>"; ?>



<h1 style="margin-left:30px;margin-top:220px;"> Bienvenue <?php echo " <font color='red'>$nameofsession</font>"; ?> , vous pouvez choisir les operations de gestion dans la barre d'operation ci-dessus.</h1>






</body>
</html>
