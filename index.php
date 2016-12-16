<!DOCTYPE HTML>
<html>

<head>
        <title>ImgGen v1</title>
        <meta charset="utf-8">
        <meta name="description" content="Generated images with PHP">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="all"/>
		<link rel="stylesheet" type="text/css" href="styles.css" media="all"/>
		
		<meta name="viewport" content="width=device-width, user-scalable=no">
</head>

<body>
	<header id="hhh" class="hhh">
		<div class="title1"><h3>ImgGen v1</h3></div>
		<!-- firefox hack for title banner -->
		<svg class="clip-svg">
			<defs>
				<clipPath id="banner" clipPathUnits="objectBoundingBox">
					<polygon points="0 0, 1 0, 0.95 0.5, 1 1, 0 1, 0.05 0.5" />
				</clipPath>
			</defs>	
		</svg>
		<style>
			.title1 h3 {
				clip-path: url("#banner");
				-webkit-clip-path: url("#banner");
				}
			.clip-svg{
				position: absolute;
				z-index:-99999;
				}
		</style>
		<!-- end of hack -->
		<div class="title2"><h3>ImgGen v1</h3><input class="button" type="button" OnClick="javascript:window.location.reload()" value="Refresh"></div>
		<div class="about">
				<p>ImgGen is a project about generating images with PHP.</p>
				<p>Randomness is used for some parameters, so every generated image is unique (more or less).</p>
				<p>Try to <input class="button" type="button" OnClick="javascript:window.location.reload()" value="Refresh"> page to see what happens !</p>
		</div>
	</header>
        <article>
			<div class="content">
				<?php
				$dir_nom = './img'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
				$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
				$fichier= array(); // on déclare le tableau contenant le nom des fichiers
				$dossier= array(); // on déclare le tableau contenant le nom des dossiers

				while($element = readdir($dir)) {
					if($element != '.' && $element != '..') {
						if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
						else {$dossier[] = $element;}
						}
					}
				closedir($dir);

				if(!empty($fichier)){
					rsort($fichier);// pour le tri croissant, rsort() pour le tri décroissant
					foreach($fichier as $lien) {
						//on enleve l'extension
						$nameclass = basename($lien,'.php');
						//on enleve le numero de fichier
						$pos = strpos($lien, '-');
						$pos++;
						$name = substr($nameclass, $pos);
						//on remplace les underscore par des espaces
						$name = str_replace('_', ' ', $name);
						//on met les premieres lettre en majuscule
						$name = ucwords($name);
			
						echo"
						<div class=\"imggen\">
							<a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal".$nameclass."\">
								<img src=\"img/".$lien."\" alt=\"generated image called ".$name."\">
							</a>
							<!--MODAL 1 -->
							<div id=\"myModal".$nameclass."\" class=\"modal fade\" role=\"dialog\">
								<div class=\"modal-dialog\">
									<div class=\"modal-content\">
										<div class=\"modal-header\">
											<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
											<h4 class=\"modal-title\">".$name."</h4>
										</div>
										<div class=\"modal-body\">
											<img src=\"img/".$lien."\" alt=\"generated image called ".$name."\">
										</div>
										<div class=\"modal-footer\">
											
											<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
										</div>
									</div>
								</div>
							</div>
							<!-- FIN MODAL 1 -->
							<p>".$name."</p>
						</div>
						";
						}
					}
				?>
			</div>
		</article>
		<footer>
			<p>All images are under <a href="https://creativecommons.org/licenses/by-nc-sa/3.0/" target="_blank">Creative Commons Licence BY-NC-SA</a> - Credit : Benoît Ripoche - Github -> <a href="https://github.com/Poshri" target="_blank">Pochwar</a></p>
		</footer>
	<script src="scroll.js"></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>