<?php

// Ce php va tout d'abord vérifier que la request method est bien en POST, puis par là suite, va venir vérifier que il existe bien
// une clé login et password, et qu'elles ne sont pas vides. Après, il va faire appel à la fonction ConnectUser qui va vérifier si
// l'identifiant et le mot de passe sont bien ceux qui sont attendus.

// Dernièrement, dans le cadre ou l'utilisateur est déjà connecté ou si il a mis les bons identifiant, on le redirige directement vers l'index
// sinon, on lui affiche un message ( variable $message ) qui indique le il vient de rentrer un mauvais login / mauvais mot de passe.
	$message = null;
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	    if(array_key_exists('login', $_POST) && array_key_exists('password', $_POST)){
	    	if(!empty($_POST['login']) && !empty($_POST['password'])){
	    		$_SESSION['User'] = connectUser($_POST['login'], $_POST['password']);

	    		if(!is_null($_SESSION['User'])){
	    			header("Location:index.php");
	    		}else{
	    			$message = "Mauvais login ou mot de passe";
	    		}
	    	}
	    }
	}	
?>

<section class="wrapper style1 align-center">
	<div class="inner">
		<div class="index align-left">
			<section>
				<header>
					<h3>Se connecter</h3>
					<a href="index.php" class="button big wide smooth-scroll-middle">Revenir à l'accueil</a></li>
				</header>
				<div class="content">
<!--  Affichage dynamique du message suivant la variable $message dans le cadre ou celle-ci n'est pas null -->
					<?php echo (!is_null($message) ? "<p>".$message."</p>" : '');?>
					<form method="post" action="#">
						<div class="fields">
							<div class="field half">
								<label for="login">Nom d'utilisateur</label>
								<input type="text" name="login" id="login" value="" />
							</div>
							<div class="field half">
								<label for="password">Mot de passe</label>
								<input type="password" name="password" id="password" value="" />
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" name="submit" id="submit" value="Se connecter" /></li>
						</ul>
					</form>
				</div>
			</section>
		</div>
	</div>
</section>