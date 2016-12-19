<?php

$fp = "presets.txt";
$data="salut\n";

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

prepend($data, $fp);





// Lit une page web dans un tableau.
$lines = file('presets.txt');


// Affiche toutes les lignes du tableau comme code HTML, avec les numéros de ligne
foreach ($lines as $line_num => $line) {
    echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
}


?>
