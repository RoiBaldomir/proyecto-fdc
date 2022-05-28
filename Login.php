<!DOCTYPE html>
<html lang="es-ES">
<?php
    include_once __DIR__ . "/db/db_connection.php";
?>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login</title>
    <link href="css/login.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="js/login.js"></script>
</head>
<body>
    <div class="contenedor">
        <div class="img">
            <a href="Index.php"><img src="img/logo.png" alt="logo"></a>
        </div>
        <div class="form">
            <form action="login.php" method="post" id="form">
                <ul>
                    <div class="title">
                        <li>
                            <h1>Inicia Sesión</h1>
                        </li>
                    </div>
                    <div class="input">
                        <li>
                            <label for="usuario"></label>
                            <input type="text" name="usuario" placeholder="Usuario" id="usuario">
                        </li>
                        <li>
                            <label for="password"></label>
                            <input type="password" name="password" placeholder="Contraseña" id="password">
                        </li>
                    </div>
                    <div class="submit">
                        <li>
                            <button class="button" type="submit">Enviar</button>
                        </li>
                        <li>
                            <p>¿No te has registrado? <a href="/Registro.php">Crear una cuenta</a></p>
                        </li>
                    </div>
                </ul>
            </form>
        </div>
    </div>
</body>
</html>