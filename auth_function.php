<?php

function conected(){
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    return !empty($_SESSION['connecte']);
}

function user_conected(): void {
    if(!conected()){
        header('Location: auth.php');
        exit();
    }
}
?>