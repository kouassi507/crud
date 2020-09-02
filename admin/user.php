<?php
	$id = $_GET['id'];
	echo $id;
require('./../db/connect_db.php');
$req2 ="SELECT * FROM users WHERE Id=$id";
$lecture = $dbconnexion->prepare($req2);
$lecture->execute();
$resultat=$lecture->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($resultat);
echo "</pre>";
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Inscription Apprenants</title>
		<link rel="stylesheet" href="Apprenant_Form.css">
		<meta charset="utf-8">
		<script src=""></script>
	</head>
	<body>
		<form name="form_login" method="POST" action="update_user.php">

			<input type="hidden" name="id" value="<?php echo $id;?>">

			<div>
				<label for="pseudo">Pseudo</label>
				<input type="text" name="pseudo" id="pseudo" value="<?php echo $resultat['pseudo']; ?>">
			</div>
			<br />
			<div>
				<label for="email">E-mail</label>
				<input type="email" name="email" id="email" value="<?php echo $resultat['email']; ?>">
			</div>
			<div>
				<button type="submit">Je modifie</button>
			</div>
		</form>
	</body>
</html>


