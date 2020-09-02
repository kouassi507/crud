
<?php
	require('./../db/connect_db.php');
	$req="SELECT Id,pseudo, email, createdAt FROM users";
	//$result1=$dbconnexion->query($req);

/*foreach($dbconnexion->query($req) as $row) {
	echo $row['Id'] ."<br>";
	echo $row['pseudo'] . "<br>";
	echo  $row['email'] . "<br>";
	echo $row['maDate'] . "<br> <hr>";
	//echo $row['password'] . "\n";
}
*/
$sth = $dbconnexion->prepare($req);
$sth->execute();

/* Récupération de toutes les lignes d'un jeu de résultats */
print("Récupération de toutes les lignes d'un jeu de résultats :\n");
$result = $sth->fetchAll();
foreach($result as $row) {
	echo $row['Id'] ."<br>";
	echo $row['pseudo'] . "<br>";
	echo  $row['email'] . "<br>";
	echo $row['createdAt'] . "<br> <hr>";
	//echo $row['password'] . "\n";
}
//print_r($result);
?>
