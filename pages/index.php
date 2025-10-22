<!-- On crée une section de texte qui va contenir du texte, une image et un bouton qui utilise une ancre pour pouvoir
 descendre vers le premier article -->
<section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
	<div class="content">
		<h1>Mon [ blog ].</h1>
		<p class="major">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur porta tellus, quis auctor ante pulvinar non. Quisque aliquet lacus posuere purus vestibulum, eget rutrum turpis scelerisque.</p>
		<ul class="actions stacked">
			<li><a href="#first" class="button big wide smooth-scroll-middle">Consulter mes articles</a></li>
		</ul>
	</div>
	<div class="image">
<!--  On remplit le alt pour l'accessibilité -->
		<img src="images/banner.jpg" alt="Image de bannière" />
	</div>
</section>

<?php 
	$_articles = getArticlesFromJson();
    // Ce code PHP utilise une variable compteur pour déterminer si un article s'affiche à gauche ou à droite
    // selon que sa position dans la liste est paire ou impaire avec le rajout d'une classe css correspondante
    // Les différentes valeurs sont insérées dynamiquement dans les balises HTML correspondantes avec echo $article

	if($_articles && count($_articles)){
		$compteur = 1;
		foreach($_articles as $article){
			$classCss = ($compteur % 2 == 0 ? 'left' : 'right');
			$compteur++;
			?>
				<section class="spotlight style1 orient-<?php echo $classCss;?>  content-align-left image-position-center onscroll-image-fade-in" id="first">
					<div class="content">
						<h2><?php echo $article['titre'];?></h2>
						<p><?php echo $article['titre'];?></p>
						<ul class="actions stacked">
							<li><a href="?page=article&id=<?php echo $article['id'];?>" class="button">Lire la suite</a></li>
						</ul>
					</div>
					<div class="image">
						<img src="<?php echo $article['image'];?>" alt="" />
					</div>
				</section>

			<?php
		}
	}
?>