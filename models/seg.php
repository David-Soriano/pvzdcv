<?php 
session_start();
if(session_status() != 2 || $_SESSION['aut'] != 'KSNsAwñ$T23:dfEfdfdfR%I##N%'){
    session_destroy();
    header("location: index.php");
    exit();
}
?>