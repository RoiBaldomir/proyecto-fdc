<?php
    session_start();

    if (isset($_SESSION['username']) && isset($_SESSION['userid'])){
    session_destroy();
    header("Location: ./index.php");
    }
    else {
        header("Location: ./login.php"); 
    }
    
?>