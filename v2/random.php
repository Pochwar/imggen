<?php
session_start();

//destroy default_alert session
unset($_SESSION[default_alert]);

//Set rand mode to ON
if(isset($_POST[rand])) {
    $_SESSION[rand] = $_POST[rand];
}

//random mode
//if ($_SESSION[rand] == 1){
    //set array for fillmode values
    $fill = array(1, 1.2, 2, 2.2);
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
        "rlimits" => rand(0,255).",".rand(0,255),
        "glimits" => rand(0,255).",".rand(0,255),
        "blimits" => rand(0,255).",".rand(0,255),
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