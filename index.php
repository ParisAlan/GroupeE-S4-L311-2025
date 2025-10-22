<!-- On utilise php include afin d'inclure notre fichier "functions" qui contient toutes les fonctions afin de pouvoir
 les utiliser sur cette page -->
<?php include 'inc/inc.functions.php'; ?>
<!DOCTYPE HTML>
<!--
	Story by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="fr">
	<head>
        <!-- Le titre du document qui va venir s'afficher tout en haut de la page -->
		<title>Story by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <!-- De la même manière, on appelle le fichier qui va contenir l'appel css directement avec include -->
		<?php include 'inc/inc.css.php'; ?>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
            <!-- Conteneur principal de notre page puisque présent dans le body -->
			<div id="wrapper" class="divided">
				<?php 
					getPageTemplate(
						array_key_exists('page', $_GET) ? $_GET['page'] : null
					); 
				?>
				<?php include 'inc/tpl-footer.php'; ?>
			</div>
        <!-- Dans un endroit similaire ou on aurait normalement appelé la balise script, on include le fichier qui la contient -->
		<?php include 'inc/inc.js.php'; ?>

	</body>
</html>