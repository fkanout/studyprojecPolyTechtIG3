<?php
session_start();
if (isset($_SESSION['name'])){


$nameofsession=$_SESSION['name'];

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
//if (isset($_POST['Submit'])){
echo $_POST['IDVOYAGES']; 
echo $_POST['rameid'];
echo $_POST['cond'];
echo $_POST['ligne'];
echo $_POST['KM'];
echo $_POST['DureeTotal'];
	

		

$stmt = $db->prepare("INSERT INTO VOYAGES (ID_VOYAGE,R_ID_RAME,C_ID_COND,L_ID_LIGNE,DUREE_VOL,VOYAGE_DATE) values (:id, :id_r, :id_c, :id_l, :km_d, :date_v)");
$stmt->bindParam(':id', $_POST['IDVOYAGES']);
$stmt->bindParam(':id_r', $_POST['rameid']);
$stmt->bindParam(':id_c', $_POST['cond']);
$stmt->bindParam(':id_l', $_POST['ligne']);
$stmt->bindParam(':km_d', $_POST['KM']);
$stmt->bindParam(':date_v',$_POST['DureeTotal']);
if ($stmt->execute()){
header("location:admin_ajoute_voyages.php?s=Données ajoutées");
}
else {
header("location:admin_ajoute_voyages.php?s=Aucune donnée ajoutée.");
}

		$db=null;
		
		
?>

<html>

</html>