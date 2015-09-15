<?php
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

 $myusername=$_POST['myusername']; 
 $mypassword=$_POST['mypassword']; 
 


  
$sth = $db->query("SELECT count(*) FROM login_table  WHERE USERNAME='$myusername' and pass='$mypassword'");
$sth->execute();
$count = $sth->fetchColumn();


if($count==1)
{
session_start();
$_SESSION['name']=$myusername;
echo $_SESSION['name'];
header("location:adminmain.php"); 
}

 
 else {
 echo "Wrong Username or Password";

}
}	
$db=null;

 ?>
