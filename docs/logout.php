<?php
session_destroy(); //détruire la session

header("Location: connexion.php"); //redirection vers la connexion
exit;
?>