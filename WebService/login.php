<?php 
    header('Content-Type: text/html; charset=utf-8'); 
    if( $_POST["uname"] == "15520329" && $_POST["psw"] == "techmaster" ) {
        header('Location: view.php');
    } else header('Location: google.com');
?>