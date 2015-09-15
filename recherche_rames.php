<html>
 <head>
  <script>
 function maximize() {
   window.moveTo(0, 0);
   window.resizeTo(screen.width, screen.height);
 }
 maximize();
 </script>
 </head>
 <FORM>
<INPUT TYPE="button" value="Imprimer la resultat" onClick="window.print()">
</FORM> 
 </html>
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
if (isset($_POST['Submit'])){
$rech=$_POST['IDRECH'];
$select=$_POST['range'];
}
if ($select=='MODELE')
{
$mysql=$db->query("SELECT ID_RAME,MODELE,DATE_CIRCUL,KM_TOTAL,ETAT FROM RAMES WHERE MODELE = '$rech'");
$mysql->execute();
$csql = $db->query("SELECT count(*) FROM RAMES WHERE MODELE = '$rech'");
$csql->execute();
$count = $csql->fetchColumn();		
}

if ($select=='KM TOTAL')
{
$mysql=$db->query("SELECT ID_RAME,MODELE,DATE_CIRCUL,LIGNE,KM_TOTAL,DUREE_TOTAL,ETAT FROM RAMES WHERE KM_TOTAL = '$rech'");
$mysql->execute();
$csql = $db->query("SELECT count(*) FROM RAMES WHERE KM_TOTAL = '$rech'");
$csql->execute();
$count = $csql->fetchColumn();	
}


if ($select=='ETAT')
{
$mysql=$db->query("SELECT ID_RAME,MODELE,DATE_CIRCUL,KM_TOTAL,ETAT FROM RAMES WHERE ETAT = '$rech'");
$mysql->execute();
$csql = $db->query("SELECT count(*) FROM RAMES WHERE ETAT = '$rech'");
$csql->execute();
$count = $csql->fetchColumn();	
}
if ($select=='ID RAMES')
{
$mysql=$db->query("SELECT ID_RAME,MODELE,DATE_CIRCUL,KM_TOTAL,ETAT FROM RAMES WHERE ID_RAME = '$rech'");
$mysql->execute();
$csql = $db->query("SELECT count(*) FROM RAMES WHERE ID_RAME = '$rech'");
$csql->execute();
$count = $csql->fetchColumn();	
}

	
	echo "<font color='Blue'>Administrateur : </font> $nameofsession"; 
		echo "<br />\n";
		echo "<font color='Blue'>Operation faite le : </font> "; echo  date('l jS \of F Y h:i:s A');
		echo "<br />\n";
		
		echo "<font color='Blue'>Nombre de donnees en sortie : </font> ";
		if (!empty($count)){
		echo $count;}
		//echo str_repeat('-', 150); 
		echo "<br />\n";
		echo "<br />\n";
		echo "<br />\n";
		echo "<br />\n";
		
		echo "<font color='red'>ID_RAME</font>"; 
		echo str_repeat('&nbsp;', 40); 	
		echo "<font color='red'>MODELE</font>";
		echo str_repeat('&nbsp;', 40); 	
		echo "<font color='red'>DATE_CIRCUL</font>";
		echo str_repeat('&nbsp;', 40); 	
		echo "<font color='red'>KM_TOTAL</font>";
		echo str_repeat('&nbsp;', 40); 	
		echo "<font color='red'>ETAT</font>";
		echo str_repeat('&nbsp;', 10); 
		echo "<br />\n";
		echo str_repeat('-', 250); 
		echo "<br />\n";
		echo str_repeat('-', 250); 
		echo "<br />\n";
		if (!empty($mysql)){
		while ($row = $mysql->fetch(PDO::FETCH_ASSOC))
				{
					echo "|";
					echo str_repeat('&nbsp;', 7); 	
					echo $row['ID_RAME']; 
					IF (strlen($row['ID_RAME']) >1) {
					$nbr=strlen($row['ID_RAME']);//echo $nbr;
					$final=50-$nbr;
					echo str_repeat('&nbsp;', $final); 
					}
					else
					{
					echo str_repeat('&nbsp;', 50); 
					}	
					echo $row['MODELE'];
					echo str_repeat('&nbsp;', 50); 	
					echo $row['DATE_CIRCUL'];
					echo str_repeat('&nbsp;', 50); 	
					echo $row['KM_TOTAL']; 
					if (strlen($row['KM_TOTAL']) > 1) {
					$nbr=strlen($row['KM_TOTAL']);
					$final= 60-($nbr);
					echo str_repeat('&nbsp;',$final);
					}
					else
					{
					echo str_repeat('&nbsp;',60); 
					}
					
					
										
					echo $row['ETAT'];
						echo "<br />\n";
					
	}
	echo str_repeat('-', 250); echo "<br />\n"; echo "Reseau TAM - Page de l'administrateur"; 
	}

$db=null;


 ?>
 
 
