<?php
    session_start(); //Se inicia la sesión

    if (isset($_SESSION['username']) && isset($_SESSION['userid'])){ //Si existe sesión se elimina
    session_destroy(); //Se elimina la sesión
    header("Location: ./index.php"); //Se redirige al usuario a la página principal
    }
    else {
        header("Location: ./login.php"); //Se redirige al usuario a la página de inicio de sesión
    }
    
?>