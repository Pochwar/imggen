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
$columns = 9; //numbers of columns
$rows = 9; //numbers of rows
$colwidth = $width/$columns; //column width
$rowheight = $height/$rows; //row height
//
//BASE COLOR IN RGB (MIN : 0 / MAX : 255)
$r=rand(100, 255); //red
$g=rand(0, 155); //green
$b=rand(0, 155); //blue
//
//COLOR MODIFICATION
//AMOUNT
$rmod=1; //red modification amount (no negative value, 0 allowed)
$gmod=1; //green modification amount (no negative value, 0 allowed)
$bmod=1; //blue modification amount (no negative value, 0 allowed)
//SENS
$incrr=0; // red modification sens (1 = increase, 0 = decrease)
$incrg=1; // green modification sens (1 = increase, 0 = decrease)
$incrb=1; // blue modification sens (1 = increase, 0 = decrease)

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
					if ($r+$rmod <= 255){$r+=$rmod;}
					else {$incrr = 0;$r-=$rmod;}
					}		
				elseif ($incrr == 0){
					if ($r-$rmod >= 0){$r-=$rmod;}
					else {$incrr = 1;$r+=$rmod;}
					}
				//GREEN
				if ($incrg == 1){
					if ($g+$gmod <= 255){$g+=$gmod;}
					else {$incrg = 0;$g-=$gmod;}
					}		
				elseif ($incrg == 0){
					if ($g-$gmod >= 0){$g-=$gmod;}
					else {$incrg = 1;$g+=$gmod;}
					}
				//BLUE
				if ($incrb == 1){
					if ($b+$bmod <= 255){$b+=$bmod;}
					else {$incrb = 0;$b-=$bmod;}
					}		
				elseif ($incrb == 0){
					if ($b-$bmod >= 0){$b-=$bmod;}
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

	
////////////
//CIRCLE 1//
////////////
//
//CIRCLE 1 POSITION
$circposx = $width/2; //X axis position -> center
$circposy = $height/2; //Y axis position -> center
//
//CIRCLE 1 SIZE
//CHECK WICH OF HEIGHT OR WIDTH IS HIGHER
if ($height > $width) {$circdiam = $width/2;} //set diameter relatively to width	 
elseif ($height <= $width) {$circdiam = $height/2;} //set diameter relatively to height
$circdiamvar = $circdiam*0.5; //adjustement variable relatively to diameter
$circdiam += rand(-$circdiamvar, +$circdiamvar); //set adjustment variable more or less randomly
//
//CIRCLE 1 COLOR  (MIN : 0 / MAX : 255)
$r=rand(0, 155); //red
$g=rand(100, 255); //green
$b=rand(100, 255); //blue
$color2 = imagecolorallocate($image, $r, $g, $b); //set circle 1 color
//
//CREATE CIRCLE 1
imagefilledellipse($image, $circposx, $circposy, $circdiam, $circdiam, $color2);


////////////
//CIRCLE 2//
////////////
//
//CIRCLE 2 SIZE
$circdiam2 = $circdiam*0.9; //set size relatively to circle 1
//
//CIRCLE 2 COLOR
$r+=50; //adjust red relatively to circle 1
$g-=50; //adjust green relatively to circle 1
$b-=50; //adjust blue relatively to circle 1
$color3 = imagecolorallocate($image, $r, $g, $b); //set circle 2 color
//
//CREATE CIRCLE 2
imagefilledellipse($image, $circposx, $circposy, $circdiam2, $circdiam2, $color3);


////////////////
//RENDER IMAGE//
////////////////
//
imagepng($image);
imagedestroy($image)
?>