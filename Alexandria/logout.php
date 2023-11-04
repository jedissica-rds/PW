<?php 
    session_start();
    $_SESSION['logged_in'] = FALSE;
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    session_destroy();
    header('Location: login.php');
    exit();
?>