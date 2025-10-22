<?php
// On fait bien attention de bien appeller la session_destroy avant de rediriger l'utilisateur et de exit.
	setDisconnectUser();

	header('Location:index.php');
    exit();
?>