<?php
function connect_bd(){
	$dsn="mysql:dbname="."dbjmartin".";host="."servinfo-mariadb";
		try{
		$connexion=new PDO($dsn,"jmartin","jmartin");
		}
		catch(PDOException $e){
		printf("Échec de la connexion : %s\n", $e->getMessage(), "</br>");
		exit();
		}
	return $connexion;
}
?>
