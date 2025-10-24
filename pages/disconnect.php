<?php
// On fait bien attention de bien appeler la session_destroy avant de rediriger l'utilisateur et de exit la page.
	setDisconnectUser();

	header('Location:index.php');
    exit();
?>