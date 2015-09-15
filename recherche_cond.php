<html>
 <head>
  <script>
 function maximize() {
   window.moveTo(0, 0);
   window.resizeTo(screen.width, screen.height);
 }
 maximize();
 </script>

 <FORM>
<INPUT TYPE="button" value="Imprimer la resultat" onClick="window.print()">
</FORM> 

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

if ($select=='TOUS')
{
$mysql=$db->query("select ID_COND,NOM,PRENOM,VILLE,DATE_NAIS,RUE,CODE_POSTAL,ETAT,POINTS from CONDUCTEURS ");
$mysql->execute();
$csql = $db->query("SELECT count(*) FROM CONDUCTEURS ");
$csql->execute();
$count = $csql->fetchColumn();
}	
if ($select=='NOM')
{
$mysql=$db->query("select ID_COND,NOM,PRENOM,VILLE,DATE_NAIS,RUE,CODE_POSTAL,ETAT,POINTS from CONDUCTEURS WHERE NOM = '$rech'");
$mysql->execute();
$csql = $db->query("SELECT count(*) FROM CONDUCTEURS WHERE NOM = '$rech'");
$csql->execute();
$count = $csql->fetchColumn();		
}

if ($select=='PRENOM')
{
$mysql=$db->query("select ID_COND,NOM,PRENOM,VILLE,DATE_NAIS,RUE,CODE_POSTAL,ETAT,POINTS from CONDUCTEURS WHERE PRENOM = '$rech'");
$mysql->execute();
$csql = $db->query("SELECT count(*) FROM CONDUCTEURS WHERE PRENOM = '$rech'");
$csql->execute();
$count = $csql->fetchColumn();	
}


if ($select=='VILLE')
{
$mysql=$db->query("select ID_COND,NOM,PRENOM,VILLE,DATE_NAIS,RUE,CODE_POSTAL,ETAT,POINTS from CONDUCTEURS WHERE VILLE = '$rech'");
$mysql->execute();
$csql = $db->query("SELECT count(*) FROM CONDUCTEURS WHERE VILLE = '$rech'");
$csql->execute();
$count = $csql->fetchColumn();	
}
if ($select=='ETAT')
{
$mysql=$db->query("select ID_COND,NOM,PRENOM,VILLE,DATE_NAIS,RUE,CODE_POSTAL,ETAT,POINTS from CONDUCTEURS WHERE ETAT = '$rech'");
$mysql->execute();
$csql = $db->query("SELECT count(*) FROM CONDUCTEURS WHERE ETAT = '$rech'");
$csql->execute();
$count = $csql->fetchColumn();	
}
if ($select=='POINTS')
{
$mysql=$db->query("select ID_COND,NOM,PRENOM,VILLE,DATE_NAIS,RUE,CODE_POSTAL,ETAT,POINTS from CONDUCTEURS WHERE POINTS = '$rech'");
$mysql->execute();
$csql = $db->query("SELECT count(*) FROM CONDUCTEURS WHERE POINTS = '$rech'");
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
		echo "<br />\n";
		echo "<br />\n";
		echo "<br />\n";
		echo "<br />\n";
		echo str_repeat('&nbsp;', 20);
		echo "<font color='red'>Id cond</font>"; 
		echo str_repeat('&nbsp;', 20); 	
		echo "<font color='red'>Nom</font>";
		echo str_repeat('&nbsp;', 37); 	
		echo "<font color='red'>Prenom</font>";
		echo str_repeat('&nbsp;', 33); 	
		echo "<font color='red'>Date de naissance</font>";
		echo str_repeat('&nbsp;', 20); 	
		echo "<font color='red'>Ville</font>";
		echo str_repeat('&nbsp;', 23); 	
		echo "<font color='red'>Code postal</font>";
		echo str_repeat('&nbsp;', 25); 	
		echo "<font color='red'>Rue</font>";
		echo str_repeat('&nbsp;', 50); 	
		echo "<font color='red'>Etat</font>";
		echo str_repeat('&nbsp;',40); 
		echo "<font color='red'>Points</font>";			
		echo str_repeat('&nbsp;', 10); 
		echo "<br />\n";
		echo str_repeat('-', 260); 
		echo "<br />\n";
		echo str_repeat('-', 260); 
		echo "<br />\n";?>
		
		<style>
			table,th,td
			{
			 
			border-spacing: 100px 0;
			cellspacing



			}
			</style>
			
		<TABLE BGCOLOR="#FFFFCC" >
			
		<?php
		if (!empty($mysql)){
		while ($row = $mysql->fetch(PDO::FETCH_ASSOC))
				{ ?>


				<tr>
				<td> <?php echo $row['ID_COND']; ?></td>
				<td><?php echo $row['NOM']; ?></td>		
				<td><?php echo $row['PRENOM'];?></td>
				<td><?php echo $row['DATE_NAIS'];?></td>
				<td><?php echo $row['VILLE'];?></td>
				<td><?php echo $row['CODE_POSTAL'];?></td>
				<td><?php echo $row['RUE'];?></td>
				<td><?php echo $row['ETAT'];?></td>
				<td><?php echo $row['POINTS'];}}?></td>
				
				</tr>
		</table>
	Reseau TAM - Page de l'administrateur 
	
</head>
</html>