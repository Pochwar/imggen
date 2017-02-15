<?php
session_start();

//get parameters
foreach($_SESSION['param_array'] as $key => $value){
        $$key = $_SESSION[$key];
}

if(isset($_POST['sign']) && !empty($_POST['sign'])){$sign = $_POST['sign'];}
else {$sign = "Anonymous";}

//array of unwanted caracters prevent inserting character by copy/paste
$unwcar = array ('%','&','~','#','[',']','`','^','=','$','*','{','}','|','<','>','_','/','\\','\'','"');
$sign = str_replace($unwcar, '', $sign);


//put presets in a single variable
$name = $width."_".$height."_".$columns."_".$rows."_".$r."_".$g."_".$b."_".$rmod."_".$gmod."_".$bmod."_".$incrr."_".$incrg."_".$incrb."_".$r_glitch."_".$g_glitch."_".$b_glitch."_".$rlimits_min."_".$rlimits_max."_".$glimits_min."_".$glimits_max."_".$blimits_min."_".$blimits_max."_".$fillmode."_".$sign."\n";

//prevent saving default file
if(strstr($name, "600_600_5_5_50_100_150_5_5_5_1_1_1_0_0_0_0_255_0_255_0_255_1")){
    $_SESSION['default_alert'] = 1;
    header('Location: index.php');
}

else{
    //open presets.txt
    $fp = "presets.txt";

    //function to write new preset in top of presets.txt
    function prepend($string, $orig_filename) {
      $context = stream_context_create();
      $orig_file = fopen($orig_filename, 'r', 1, $context);

      $temp_filename = tempnam(sys_get_temp_dir(), 'php_prepend_');
      file_put_contents($temp_filename, $string);
      file_put_contents($temp_filename, $orig_file, FILE_APPEND);

      fclose($orig_file);
      unlink($orig_filename);
      rename($temp_filename, $orig_filename);
    }

    //write new preset in presets.txt
    prepend($name, $fp);

    //close presets.txt
    fclose ($fp);

    //redirect to gallery
    header('Location: gallery.php');
}
?>
