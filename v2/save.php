<?php
session_start();

//get parameters
foreach($_SESSION[param_array] as $key => $value){
        $$key = $_SESSION[$key];
}

//set preset in txt filename
$name = $width."_".$height."_".$columns."_".$rows."_".$r."_".$g."_".$b."_".$rmod."_".$gmod."_".$bmod."_".$incrr."_".$incrg."_".$incrb."_".$r_glitch."_".$g_glitch."_".$b_glitch."_".$rlimits."_".$glimits."_".$blimits."_".$fillmode;

//save txt file in presets folder
$myfile = fopen("presets/$name.txt", "w");

//redirect to gallery
header('Location: gallery.php');
?>