<?php
	$article = getArticleById(
		array_key_exists('id', $_GET) ? $_GET['id'] : null
	);

    // Dans le cadre ou $article est nul ou vide ( vérification avec !count ), alors, redirection instantané vers index.php avec un exit.
	if(is_null($article) OR !count($article)){
		header('Location:index.php');
        exit();
	}
?>

<!-- Cette section affiche les informations de l'article de manière dynamique avec les valeurs présentes dans $article -->
<section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
	<div class="content">
		<h1><?php echo $article['titre'];?></h1>
		<p class="major"><?php echo $article['texte'];?></p>
		<ul class="actions stacked">
			<li><a href="index.php" class="button big wide smooth-scroll-middle">Revenir à l'accueil</a></li>
		</ul>
	</div>
	<div class="image">
		<img src="<?php echo $article['image'];?>" alt="Image de l'article" />
	</div>
</section>