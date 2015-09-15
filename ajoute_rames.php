<?php
include 'checklogin.php';
session_start();
if (isset($_SESSION['name'])){


$nameofsession=$_SESSION['name'];
echo $nameofsession;
}
else
{
header("location:index.html");
}

//connexionàoracle
try
{
$db=new PDO('oci:dbname=v240.ig.polytech.univ-montp2.fr/ora10','faisal.kanout','oracle');
}

catch(PDOException $e)
		{
		 echo $e->getMessage();

		}
		
$stmt = $db->prepare("INSERT INTO RAMES (ID_RAME,MODELE,DATE_CIRCUL,ETAT) VALUES (:idr, :modelr, :datee, :etat)");
$stmt->bindParam(':idr', $_POST['IDRAMES']);
$stmt->bindParam(':modelr', $_POST['Modele']);
$stmt->bindParam(':datee', $_POST['Datecirculation']);
$stmt->bindParam(':etat', $_POST['etat']);
if ($stmt->execute()){
header("location:admin_ajoute_rames.php?s=Données ajoutées");
}
else{

header("location:admin_ajoute_rames.php?s=Aucune donnée ajoutée.");
}


?>