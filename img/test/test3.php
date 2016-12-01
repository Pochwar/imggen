<?php
header ("Content-type: image/png");

//taille de l'image
$image = imagecreate(900,900);

//couleur de fond
$r=rand(0, 255);$v=rand(0, 255);$b=rand(0, 255);	
$couleur = imagecolorallocate($image, $r, $v, $b);
ImagefilledRectangle ($image, 0, 0, 900, 900, $couleur);

//définition de la couleur du premier tracé
$r=rand(0, 255);$v=rand(0, 255);$b=rand(0, 255);	

//on définit le début du tracé
$k = 450; $l = 450; //centre


//on definit un marqueur d incrementation des codes couleurs
//1 -> on increment 0 -> on decremente
$incrr=1; // marqueur R
$incrv=1; // marqueur V
$incrb=1; // marqueur B

//on définit une variable de modification des couleurs
	$varr = rand(0, 5); // modificateur R
	$varv = rand(0, 5); // modificateur V
	$varb = rand(0, 5); // modificateur B


//parametres de tracé
$c4=1; // marqueur pour boucle
$x=rand(1,15); // modificateur de coordonnes
$y=$x; // incrémenteur
$thick=rand(1,3);
imagesetthickness($image, $thick);// Définit l'épaisseur de la ligne à 5

//boucle pour faire les lignes les unes apres les autres
$hhh = 0;
while ($hhh < 256)
	{
	$couleur = imagecolorallocate($image, $r, $v, $b);
	
	if ($c4 == 1){
		$i = $k; $j = $l; $k = $i; $l = $j-$x;
		$c4++;
		imageline ($image, $i, $j, $k, $l, $couleur);

		}
	elseif ($c4 == 2){
		$i = $k; $j = $l; $k = $i+$x; $l = $j;
		$c4++;
		imageline ($image, $i, $j, $k, $l, $couleur);
		$x=$x+$x;
		}
	elseif ($c4 == 3){
		$i = $k; $j = $l; $k = $i; $l = $j+$x;
		$c4++;
		imageline ($image, $i, $j, $k, $l, $couleur);

		}
	elseif ($c4 == 4){
		$i = $k; $j = $l; $k = $i-$x; $l = $j;
		$c4=1;
		imageline ($image, $i, $j, $k, $l, $couleur);
		$x=$x+$x;
		}

	//on définit la couleur de la ligne suivante
				//Verificateur pour que les codes couleurs ne depassent pas 255 ni 0
			
				
				//ROUGE
				if ($incrr == 1){
					$varcol = $varr;
					if ($r+$varcol <= 255){$r=$r+$varcol;}
					else {
						$incrr = 0;
						$varcol = -$varr;
						$r=$r+$varcol;
						}
					}		
				elseif ($incrr == 0){
					$varcol = -$varr;
					if ($r+$varcol >= 0){$r=$r+$varcol;}
					else {
						$incrr = 1;
						$varcol = $varr;
						$r=$r+$varcol;
						}
					}
	
				//VERT
				if ($incrv == 1){
					$varcol = $varv;
					if ($v+$varcol <= 255){$v=$v+$varcol;}
					else {
						$incrv = 0;
						$varcol = -$varv;
						$v=$v+$varcol;
						}
					}		
				elseif ($incrv == 0){
					$varcol = -$varv;
					if ($v+$varcol >= 0){$v=$v+$varcol;}
					else {
						$incrv = 1;
						$varcol = $varv;
						$v=$v+$varcol;
						}
					}

				//BLEU
				if ($incrb == 1){
					$varcol = $varb;
					if ($b+$varcol <= 255){$b=$b+$varcol;}
					else {
						$incrb = 0;
						$varcol = -$varb;
						$b=$b+$varcol;
						}
					}		
				elseif ($incrb == 0){
					$varcol = -$varb;
					if ($b+$varcol >= 0){$b=$b+$varcol;}
					else {
						$incrb = 1;
						$varcol = $varb;
						$b=$b+$varcol;
						}
					}	
	$hhh++;	
	}


imagepng($image);
?>