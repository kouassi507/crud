<?php

//include('config_db.php');


$pseudo = valid_donnees($_POST['pseudo']);
$email = valid_donnees($_POST['email']);
$password = valid_donnees(password_hash($_POST['password'],PASSWORD_DEFAULT));

function valid_donnees($mesdonnees){
	$mesdonnees = trim($mesdonnees);
	$mesdonnees = stripslashes($mesdonnees);
	$mesdonnees = htmlspecialchars($mesdonnees);
	return $mesdonnees;
}
if(!empty($pseudo) <=20 && preg_match("/^[A-Za-z'-]+$/",$pseudo)&& !empty($email)&& filter_var($email,FILTER_VALIDATE_EMAIL)){

	require('./db/connect_db.php');

	$sth=$dbconnexion->prepare("INSERT INTO users(pseudo,email,password)VALUES(:pseudo,:email,:password)");
	$sth->bindParam(':pseudo',$pseudo);
	$sth->bindParam(':email',$email);
	$sth->bindParam(':password',$password);
	$sth->execute();
/*

}try{
	$dbconnexion = new PDO("mysql:host=$server; dbname=$base",$user,$password_db);
	$dbconnexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sth=$dbconnexion->prepare("INSERT INTO users(pseudo,email,password)VALUES(:pseudo,:email,:password)");
	$sth->bindParam(':pseudo',$pseudo);
	$sth->bindParam(':email',$email);
	$sth->bindParam(':password',$password);
	$sth->execute();
}
catch(PDOException $e){
	echo "Erreur de traitement des données: " .$e->getMessage();
}
*/

}
else{
	header("Location: Inscription.html");
}

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Inscription Apprenants</title>
		<!--<link rel="stylesheet" href="Apprenant_Form.css">-->
		<meta charset="utf-8">
		<script src=""></script>
	</head>
	<body>
		<div>
			<p>
				Merci vous avez été bien enregistré !!.
			</p>
		</div>
	</body>
</html>







