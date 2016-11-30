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
$bgr=rand(0, 255); //red
$bgg=rand(0, 255); //green
$bgb=rand(0, 255); //blue
//
//BASE COLOR IN RGB (MIN : 0 / MAX : 255)
$r=rand(0, 255); //red
$g=rand(0, 255); //green
$b=rand(0, 255); //blue
//
//COLOR MODIFICATION
////AMOUNT
$rmod=rand(0, 5); //red modification amount (no negative value, 0 allowed)
$gmod=rand(0, 5); //green modification amount (no negative value, 0 allowed)
$bmod=rand(0, 5); //blue modification amount (no negative value, 0 allowed)
////SENS
$incrr=1; // red modification sens (1 = increase, 0 = decrease)
$incrg=1; // green modification sens (1 = increase, 0 = decrease)
$incrb=1; // blue modification sens (1 = increase, 0 = decrease)
//
//STARTING POINT OF FIRST LINE
$x1 = 10; //X coordonate
$y1 = 60; //Y coordonate
//
//NUMBER OF LINES
$linenum = 50;
//
//LINE STYLE
$linethickness = 2; //line thickness in  px
$mx = 15; //X axis base line trace
$my = -50; //Y axis base line trace
$multx1 = rand(110,130)/100; //x1 multiplier
$multy1 = rand(110,115)/100; //y1 multiplier
$multmx = rand(110,130)/100; //mx multiplier
$multmy = 1; //my multiplier
$multthick = 1.05; //line thickness multiplier


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
$count = 0; //counter for the main loop


////////////
//THE LOOP//
////////////
//
//LOOP TO DRAW LINES
while ($count <= $linenum)
	{
		//CREATING LINES
		$color = imagecolorallocate($image, $r, $g, $b); //set line color
		imagesetthickness($image, $linethickness); //set line thickness
		$x2=$x1+$mx; $y2=$y1+$my;
		imageline ($image, $x1, $y1, $x2, $y2, $color);
		$x1*=$multx1; $y1*=$multy1; $mx*=$multmx; $my*=$multmy;
		$linethickness*=$multthick;
		

		
		//MODIFY COLOR OF THE NEXT LINE
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