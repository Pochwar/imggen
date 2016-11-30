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
//BACKGROUND COLOR IN RGB (MIN : 0 / MAX : 255)
$bgr=rand(200, 255); //red
$bgg=rand(200, 255); //green
$bgb=rand(200, 255); //blue
//
//BASE COLOR IN RGB (MIN : 0 / MAX : 255)
$r=rand(0, 100); //red
$g=rand(0, 100); //green
$b=rand(0, 100); //blue
//
//COLOR MODIFICATION
//AMOUNT
$rmod=rand(0, 0); //red modification amount (no negative value, 0 allowed)
$gmod=rand(0, 0); //green modification amount (no negative value, 0 allowed)
$bmod=rand(0, 5); //blue modification amount (no negative value, 0 allowed)
//LOCATION AND SIZE OF FIRST LINE
$x1 = 0; //left coord of line
$y1 = rand(200, 400); //top coord of line
//NUMBER OF LINES
$linenum = 180;
//
//LINE THICKNESS
$mode = rand(1,2); //choose mode randomly
////MODE 1
if ($mode == 1){$thick=2;} //custom value
////MODE 2
if ($mode == 2){$thick=($width/$linenum)/2;} //relative to width and number of lines
//
//LINE HEIGHT VARIATIONS (variables will be divided par 100 to get decimal)
$varneg = 90; //must be under 100 to get decrease multiplier factor
$varpos = 110; //must be over 100 to get increase multiplier factor

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
//LOOP TO CREATE LINES
while ($count <= $linenum)
	{
		//CREATING LINES
		$color = imagecolorallocate($image, $r, $g, $b); //set line color
		imagesetthickness($image, $thick); //set line thickness
		$x2=$x1;$y2=$height-$y1; //lets trace centered vertical line
		imageline ($image, $x1, $y1, $x2, $y2, $couleur); //create line
		
		
		//NEXT LINE
		$x1+=($width/$linenum);
		$y1*=rand($varneg,$varpos)/100;
		
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