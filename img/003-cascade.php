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
//BACKGROUND COLOR IN RDB (MIN : 0 / MAX : 255)
$bgr=rand(0, 255); //red
$bgg=rand(0, 255); //green
$bgb=rand(0, 255); //blue
//
//BASE COLOR IN RGB (MIN : 0 / MAX : 255)
$r=$bgr; //red
$g=$bgg; //green
$b=$bgb; //blue
//
//COLOR MODIFICATION
//AMOUNT
$rmod=rand(0, 10); //red modification amount (no negative value, 0 allowed)
$gmod=rand(0, 2); //green modification amount (no negative value, 0 allowed)
$bmod=rand(0, 8); //blue modification amount (no negative value, 0 allowed)
//SENS
$incrr=1; // red modification sens (1 = increase, 0 = decrease)
$incrg=1; // green modification sens (1 = increase, 0 = decrease)
$incrb=1; // blue modification sens (1 = increase, 0 = decrease)
//
//LOCATION AND SIZE OF FIRST RECTANGLE
$x1 = rand(0, 100); //left coord of rectangle
$y1 = rand(0, 100); //top coord of rectangle
$x2 = $x1+10; //right coord of rectangle
$y2 = $y2+10; //bottom coord of rectangle
//
//NUMBER OF RECTANGLES
$rectnum = 90;


////////////////
//IMAGE CREATE//
////////////////
//
$image = imagecreatetruecolor($width,$height);

/////////////////////
//BACKGROUND CREATE//
/////////////////////
//
$bgcolor = imagecolorallocate($image, $bgr, $bgg, $bgb); //set background color
ImagefilledRectangle ($image, 0, 0, $width, $height, $bgcolor); //create background

////////////
//MARQUERS//
////////////
//
$count = 0;

////////////
//THE LOOP//
////////////
//
//LOOP TO CREATE RECTANGLES
while ($count <= $rectnum)
	{
		//CREATING RECTANGLES
		$color = imagecolorallocate($image, $r, $g, $b); //set rectangle color
		ImagefilledRectangle ($image, $x1, $y1, $x2, $y2, $color); //create rectangle
		
		
		//RECTANGLE LOCATION MODIFICATION
		$x1mod = rand(10, 20); //left coord modification
		$y1mod = rand(15, 25); //top coord modification
		$x2mod = rand(0, 100); //right coord modification
		$y2mod = rand(0, 100); //bottom coord modification
		
		
		//SET LOCATION OF NEXT RECTANGLE
		$x1+=$x1mod; //set left location modification
		$y1+=$y1mod; //set top location modification
		$x2 = $x1+$x2mod; //set right location modification
		$y2 = $y1+$y2mod; //set bottom location modification
		
		//MODIFY COLOR OF THE NEXT RECTANGLE
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
		$count++;
		}


////////////////
//RENDER IMAGE//
////////////////
//
imagepng($image);
imagedestroy($image)
?>