<?php
header ("Content-type: image/png");

/////////////
//VARIABLES//
/////////////
//
//IMAGE SIZE
$width=900; //image width in px
$height=900; //image height in px
//
//BACKGROUND GRID
$columns = 18; //numbers of columns
$rows = 18; //numbers of rows
$colwidth = $width/$columns; //column width
$rowheight = $height/$rows; //row height
//
//BACKGROUND COLOR IN RGB (MIN : 0 / MAX : 255)
$bgr=rand(200, 255); //red
$bgg=rand(200, 255); //green
$bgb=rand(200, 255); //blue
//
//BASE COLOR IN RGB (MIN : 0 / MAX : 255)
$r=rand(0, 50); //red
$g=rand(0, 50); //green
$b=rand(0, 50); //blue
//
//COLOR MODIFICATION
////AMOUNT
$rmod=0; //red modification amount (no negative value, 0 allowed)
$gmod=0; //green modification amount (no negative value, 0 allowed)
$bmod=0; //blue modification amount (no negative value, 0 allowed)
////SENS
$incrr=1; //red modification sens (1 = increase, 0 = decrease)
$incrg=1; //green modification sens (1 = increase, 0 = decrease)
$incrb=1; //blue modification sens (1 = increase, 0 = decrease)
//
//FIRST CIRCLE WIDTH
$circdiam = rand(5,60); //dbase diametre
//
//CIRCLE WIDTH LIMITATIONS
$valmin=5; //minimum circle width
$valmax=60; //maximum circle width
//
//CIRCLE WIDTH variations limits
$varmin = 0; //minimum width variation
$varmax = 5; //maximum width variation

////////////////
//IMAGE CREATE//
////////////////
//
$image = imagecreatetruecolor($width,$height); //image create
$bgcolor = imagecolorallocate($image, $bgr, $bgg, $bgb); //set background color
ImagefilledRectangle ($image, 0, 0, $width, $height, $bgcolor); //create background



////////////
//MARQUERS//
////////////
//
$counta = 0; //A counter for the main loop
$countb = 0; //B counter for the main loop
$sens=0; //marquer to make lines go up and down
$var=rand(0,1);//random marquer to make circles grow or shrink until their limits
$varmod=rand(1,2);//random marquer to make circle variation mode 1 or 2
//
//STEP BETWEEN CIRCLES CENTERS (depends on colums and rows number and image size
$stepx = $colwidth/2; //X step
$stepy = $rowheight/2; //Y step
//
//FIRST CIRCLE COORDONATES
$x1 = $stepx; //X coordonate
$y1 = $stepy; //Y coordonate

////////////
//THE LOOP//
////////////
//
//CIRCLE VARIATION MODE 1
if ($varmod == 1){$circdiamvar = rand($varmin,$varmax);} //set random circle width variation - mode 1
//
//LOOP TO DRAW CIRCLES COLUMN BY COLUMN
while ($counta <= $columns)
	{
	//CIRCLE VARIATION MODE 2
	if ($varmod == 2){$circdiamvar = rand($varmin,$varmax);} //set random circle width variation - mode 2
	//
	//LOOP TO FILL COLUMN CIRCLE BY CIRCLE
	while ($countb <= $rows)
	{
		//WIDTH UNBREAK SCRIPT PING PONG (Check that circle width values dont go beyond or below limitations)
		if($var==0){
			if($circdiam < $valmax){$circdiam += $circdiamvar;} 
			elseif ($circdiam >= $valmax){$circdiam -= $circdiamvar;$var=1;} 
			}
		elseif($var==1){
			if($circdiam > $valmin){$circdiam -= $circdiamvar;} 
			elseif ($circdiam <= $valmin){$circdiam += $circdiamvar;$var=0;} 
			}
		//CREATING CIRCLES
		imagefilledellipse($image, $x1, $y1, $circdiam, $circdiam, $color);
		//GO TO NEXT CIRCLE LOCATION DEPENDING ON SENS
		if($sens==0){$y1 += $rowheight;} //descending
		elseif($sens==1){$y1 -= $rowheight;} //ascending
		$countb++; //go make next circle
		}
	//REINITIATE VALUES FOR NEXT COLUMN
	if($sens==0){$y1 = $height-$stepy;$sens=1;}
	elseif($sens==1){$y1 = $stepy;$sens=0;}
	$x1 += $colwidth;
	$countb=0;
	$counta++;
	}


////////////////
//RENDER IMAGE//
////////////////
//
imagepng($image);
imagedestroy($image)
?>