<?php
 require('config_db.php');

try{
$dbconnexion = new PDO("mysql:host=$server; dbname=$base",$user,$password_db);
$dbconnexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
echo "Erreur de traitement des données: " .$e->getMessage();
}


?>
