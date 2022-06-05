<?php
try {
    $db = new PDO("sqlite:" . __DIR__ . "/gamelist.db");

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
    echo 'Fallo de conexión con la base de datos'; 

    die();
}
    
?>