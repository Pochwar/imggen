<?php
$color = imagecolorallocate($image, $r, $g, $b); //set square color
ImagefilledRectangle ($image, $x1, $y1, $x2, $y2, $color); //create square
?>