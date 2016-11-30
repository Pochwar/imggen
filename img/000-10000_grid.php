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
$columns = 100; //numbers of columns
$rows = 100; //numbers of rows
$colwidth = $width/$columns; //column width
$rowheight = $height/$rows; //row height
//
//BASE COLOR IN RGB (MIN : 0 / MAX : 255)
$r=rand(0, 255); //red
$g=rand(0, 255); //green
$b=rand(0, 255); //blue
//
//COLOR MODIFICATION
//AMOUNT
$rmod=5; //red modification amount (no negative value, 0 allowed)
$gmod=5; //green modification amount (no negative value, 0 allowed)
$bmod=5; //blue modification amount (no negative value, 0 allowed)
//SENS
$incrr=1; // red modification sens (1 = increase, 0 = decrease)
$incrg=1; // green modification sens (1 = increase, 0 = decrease)
$incrb=1; // blue modification sens (1 = increase, 0 = decrease)
//AMPLITUDE
////RED LIMITS (rmin must be inferior to rmax)
$rmin = 0; //red minimum amount - cant be below 0
$rmax = 255; //red maximum limit - cant be above 255
////GREEN LIMITS (gmin must be inferior to gmax)
$gmin = 0; //green minimum amount - cant be below 0
$gmax = 255; //green maximum limit - cant be above 255
////BLUE LIMITS (bmin must be inferior to bmax)
$bmin = 0; //blue minimum amount - cant be below 0
$bmax = 255; //blue maximum limit - cant be above 255

////////////////
//IMAGE CREATE//
////////////////
//
$image = imagecreatetruecolor($width,$height);


////////////
//MARQUERS//
////////////
//
//LOCATION AND SIZE OF FIRST SQUARE
$x1 = 0; //left coord of square
$y1 = 0; //top coord of square
$x2 = $colwidth; //right coord of square
$y2 = $rowheight; //bottom coord of square


////////////
//THE LOOP//
////////////
//
//LOOP TO FILL IMAGE LINE BY LINE
while ($y2 <= $height)
	{
	//LOOP TO FILL LINE SQUARE BY SQUARE
	while ($x2 <= $width)
		{
		//CREATING SQUARES
		$color = imagecolorallocate($image, $r, $g, $b); //set square color
		ImagefilledRectangle ($image, $x1, $y1, $x2, $y2, $color); //create square
		
		//MODIFY COLOR OF THE NEXT SQUARE
			//COLOR UNBREAK SCRIPT PING PONG (Check that rgb values dont go beyond 255 or below 0)
				//RED
				if ($incrr == 1){
					if ($r+$rmod <= $rmax){$r+=$rmod;}
					else {$incrr = 0;$r-=$rmod;}
					}		
				elseif ($incrr == 0){
					if ($r-$rmod >= $rmin){$r-=$rmod;}
					else {$incrr = 1;$r+=$rmod;}
					}
				//GREEN
				if ($incrg == 1){
					if ($g+$gmod <= $gmax){$g+=$gmod;}
					else {$incrg = 0;$g-=$gmod;}
					}		
				elseif ($incrg == 0){
					if ($g-$gmod >= $gmin){$g-=$gmod;}
					else {$incrg = 1;$g+=$gmod;}
					}
				//BLUE
				if ($incrb == 1){
					if ($b+$bmod <= $bmax){$b+=$bmod;}
					else {$incrb = 0;$b-=$bmod;}
					}		
				elseif ($incrb == 0){
					if ($b-$bmod >= $bmin){$b-=$bmod;}
					else {$incrb = 1;$b+=$bmod;}
					}
		//GO TO NEXT SQUARE
    	$x1+=$colwidth; //applying column width to left coord
		$x2+=$colwidth; //applying column width to right coord
		}
		
	//GO TO NEXT LINE
	$x1=0; //initialise left coord to 0
	$x2=$colwidth; //initialise right coord to column width
	$y1+=$rowheight; //add row heith to top coord
	$y2+=$rowheight; //add row heith to bottom coord
	}

////////////////
//RENDER IMAGE//
////////////////
//
imagepng($image);
imagedestroy($image)
?>