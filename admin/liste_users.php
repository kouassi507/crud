
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
foreach($result as $row) { ?>
<p><b><?php echo $row['Id']; ?></b></p>
<p><b><?php echo $row['pseudo']; ?></b></p>
<p><b><?php echo $row['email'] ; ?></b></p>
<p><b><?php echo  $row['createdAt'] ; ?></b></p>
<form action="delete.php" method="post">
	<input type="hidden" name="id" value="<?php echo $row['Id'];?>">
<button type="submit">Delete</button>
</form>
<form action="user.php?id=<?php echo $row['Id']?>" method="post">
	<input type="hidden" name="id" value="<?php echo $row['Id'];?>">
	<button type="submit">Update</button>
</form>
<hr>


<?php
}

?>

