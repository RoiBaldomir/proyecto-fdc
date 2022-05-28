<!DOCTYPE html>
<html lang="es-ES">
<?php
    include_once __DIR__ . "/db/db_connection.php";
?>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Registro</title>
    <link href="css/registro.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="js/registro.js"></script>
    <div class="contenedor">
        <div class="img">
            <a href="Index.php"><img src="img/logo.png" alt="logo"></a>
        </div>
        <div class="form">
            <form action="registro.php" method="post" id="form">
                <ul>
                    <div class="title">
                        <li>
                            <h1>Crea una cuenta</h1>
                        </li>
                    </div>   
                    <div class="input">
                        <li>
                            <label for="nombre"></label>
                            <input type="text" name="nombre" placeholder="Nombre" id="nombre">
                        </li>
                        <li>
                            <label for="usuario"></label>
                            <input type="text" name="usuario" placeholder="Usuario" id="usuario">
                        </li>
                        <li>
                            <label for="email"></label>
                            <input type="email" name="email" placeholder="E-Mail" id="email">
                        </li>
                        <li>
                            <label for="password"></label>
                            <input type="password" name="password" placeholder="Contraseña" id="password">
                        </li>
                        <li>
                            <label for="cpassword"></label>
                            <input type="password" name="cpassword" placeholder="Confirmar Contraseña" id="cpassword">
                        </li>
                    </div>
                    <div class="submit">
                        <li>
                            <button class="button" type="submit">Enviar</button>
                        </li>
                        <li>
                            <p>¿Ya tienes una cuenta? <a href="/Login.php">Iniciar sesión</a></p>
                        </li>
                    </div>
                </ul>
            </form>
        </div>
    </div>
</head>
<body>
    
</body>
</html>