<?php
header ("Content-type: image/png");

//taille de l'image
$image = imagecreate(900,900);

//couleur de fond
$r=rand(200, 255);$v=rand(0, 50);$b=rand(0, 50);	
$couleur = imagecolorallocate($image, $r, $v, $b);
ImagefilledRectangle ($image, 0, 0, 900, 900, $couleur);

//définition de la couleur du premier carré
$r=rand(0, 50);$v=rand(0, 50);$b=rand(200, 255);	

//on définit l'emplacement du premier carré
$i = rand(250,750); $j = rand(250,750); $k = $i+5; $l = $j+5;


//on definit un marqueur d incrementation des codes couleurs
//1 -> on increment 0 -> on decremente
$incrr=1; // marqueur R
$incrv=1; // marqueur V
$incrb=1; // marqueur B

//on définit une variable de modification des couleurs
$varr = rand(0, 1); // modificateur R
$varv = rand(0, 1); // modificateur V
$varb = rand(5, 200); // modificateur B

//parametres de base pour emplacement carres
$c4=1; // marqueur pour boucle
$xy1=10; // modificateur coordonees 1 du carre
$xy2=5; // modificateur coordonees 2 du carre



//boucle pour faire les lignes les unes apres les autres
$hhh = 0;
while ($hhh < 20)
	{
	$couleur = imagecolorallocate($image, $r, $v, $b);
	ImagefilledRectangle ($image, $i, $j, $k, $l, $couleur);
	
	//on définit l'emplacement du carré suivant
	
	//on randomise le coeff de multiplication de la taille et emplacement des carres
	$mult=rand(1100,1500)/1000;
	
	if ($c4 == 1){
		$i = $i+$xy1; $j = $j-$xy1; $k = $i+$xy2; $l = $j+$xy2;
		$c4++;
		$xy1 = $xy1*$mult;
		$xy2 = $xy2*$mult;
		}
	elseif ($c4 == 2){
		$i = $i+$xy1; $j = $j+$xy1; $k = $i+$xy2; $l = $j+$xy2;
		$c4++;
		$xy1 = $xy1*$mult;
		$xy2 = $xy2*$mult;
		}
	elseif ($c4 == 3){
		$i = $i-$xy1; $j = $j+$xy1; $k = $i+$xy2; $l = $j+$xy2;
		$c4++;
		$xy1 = $xy1*$mult;
		$xy2 = $xy2*$mult;
		}
	elseif ($c4 == 4){
		$i = $i-$xy1; $j = $j-$xy1; $k = $i+$xy2; $l = $j+$xy2;
		$c4=1;
		$xy1 = $xy1*$mult;
		$xy2 = $xy2*$mult;
		}
	
	
	
	
	
	
	
	//on définit la couleur du carré suivant
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