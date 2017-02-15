<?php
session_start();
//Set edit mode to ON and get image ID
if(isset($_POST['ver'])) {
    $_SESSION['edit'] = $_POST['ver'];
}

//redirect to index
header('Location: index.php');
?>
