<?php
require('./../db/connect_db.php');
$id= $_POST['id'];
$req1 ="DELETE FROM users WHERE Id=$id";
$del = $dbconnexion->prepare($req1);
$del->execute();
header("Location:liste_users.php");
?>

