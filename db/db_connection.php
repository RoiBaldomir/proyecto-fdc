<?php
    $db = new PDO("sqlite:" . __DIR__ . "/gamelist.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>