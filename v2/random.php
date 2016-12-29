<?php
session_start();

//destroy default_alert session
unset($_SESSION[default_alert]);

//destroy edit session to allow randomisation
unset($_SESSION[edit]);

//Set rand mode to ON
if(isset($_POST[rand])) {
    $_SESSION[rand] = $_POST[rand];
}

//random mode
//if ($_SESSION[rand] == 1){
    //set array for fillmode values
    $fill = array(1, 1.2, 2, 2.2, 3);
    //set random values for color limits
    $r1 = rand(0,255);
    $r2 = rand(0,255);
    if ($r1 <= $r2){$rmin = $r1; $rmax = $r2;} else {$rmin = $r2; $rmax = $r1;}
    $g1 = rand(0,255);
    $g2 = rand(0,255);
    if ($g1 <= $g2){$gmin = $g1; $gmax = $g2;} else {$gmin = $g2; $gmax = $g1;}
    $b1 = rand(0,255);
    $b2 = rand(0,255);
    if ($b1 <= $b2){$bmin = $b1; $bmax = $b2;} else {$bmin = $b2; $bmax = $b1;}
    //set random values
    $_SESSION[param_array] = $param_array_random = array(
        "width" => rand(50,1000),
        "height" => rand(50,1000),
        "columns" => rand(1,250),
        "rows" => rand(1,250),
        "r" => rand(0,255),
        "g" => rand(0,255),
        "b" => rand(0,255),
        "rmod" => rand(0,255),
        "gmod" => rand(0,255),
        "bmod" => rand(0,255),
        "incrr" => rand(0,1),
        "incrg" => rand(0,1),
        "incrb" => rand(0,1),
        "r_glitch" => rand(0,1),
        "g_glitch" => rand(0,1),
        "b_glitch" => rand(0,1),
        "rlimits_min" => $rmin,
        "rlimits_max" => $rmax,
        "glimits_min" => $gmin,
        "glimits_max" => $gmax,
        "blimits_min" => $bmin,
        "blimits_max" => $bmax,
        "fillmode" => $fill[array_rand($fill)]
    );
    //get radom values
    foreach($_SESSION[param_array] as $key => $value){
        $_SESSION[$key] = $value;
    }
//};

//redirect to index
header('Location: index.php');
?>