<!DOCTYPE html>
<?php
    include_once __DIR__ . "/db/db_connection.php";
?>

<html lang="es-ES">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Contacto</title>
    <link rel="stylesheet" href="css/contacto.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <script src="js/contacto.js"></script> -->
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="img/logo.png" alt="logo">
        </div>
        <div class="menu">
            <ul>
                <div>
                    <li><a href="Index.php">Principal</a></li>
                </div>
                <div>
                    <li><a href="My_games.php">Mis Juegos</a></li>
                </div>
                <div>
                    <li><a href="Contacto.php">Contacto</a></li>
                </div>
                <div>
                    <li><a href="Acerca-de.php">Acerca de</a><li>
                </div>
            </ul>
        </div>
        <div class="login">
            <ul>
                <div>
                    <li><button><a href="Login.php">Inicia Sesión</a></button></li>
                </div>
                <div>
                    <li><button><a href="Registro.php">Regístrate</a></button></li>
                </div> 
            </ul>
        </div>
    </div>
    <div class="content">
        <h1>Contacto</h1>
        <p class="mensaje">Para cualquier duda o sugerencia sobre el sitio, puedes rellenar el siguiente formulario y recibirás una respuesta lo antes posible.</p>
        <form action="contacto.php" method="post" id="form">
            <div class="label1">
                <label for="nombre">Nombre*</label>
            </div>
            <div class="input1">
                <input type="text" name="nombre" id="nombre" size="40">
            </div>
            <div class="label2">
                <label for="email">Email*</label>
            </div>
            <div class="input2">
                <input type="email" name="correo" id="email" size="40">
            </div>
            <div class="label3">
                <label for="asunto">Asunto</label>
            </div>
            <div class="input3">
                <input type="text" name="asunto" id="asunto" size="40">
            </div>
            <div class="textarealabel">
                <label for="mensaje">Mensaje*</label>
            </div>
            <div class="textarea">
                <textarea rows="6" cols="55" name="mensaje" id="mensaje" placeholder="Escribe un mensaje*"></textarea>
            </div>
            <div class="button">
                <button type="submit" name="contacto">Enviar</button>
            </div>
            <div>
            <?php
                if (isset($_POST['contacto'])) {
                    $name = $_POST['nombre'];
                    $email = $_POST['correo'];
                    $subject = $_POST['asunto'];
                    $message = $_POST['mensaje'];
                    $consulta = $db->query("INSERT INTO tContact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')");
                    echo '<p style="color: lightgray; text-align: center">!Mensaje enviado!, recibiras la respuesta en tu correo lo antes posible.</p>';
                }
            ?>
            </div>       
        </form>
    </div>
    <div class="footer">
        <div class="copy"> 
            <p>&copy; 2022 Roi Baldomir Ares</p>
        </div>
        <div class="links">
            <ul>
                <li><a href="Privacidad.php">Política de Privacidad</a></li>
                <li><a href="Cookies.php">Política de Cookies</a></li>
                <li><a href="Aviso-legal.php">Aviso Legal</a></li>
            </ul>
        </div>
        <div class="rrss">
            <div class="footertitle">
                <h4>Encuéntranos también en:</h4>
            </div>
            <div class="rrsslinks">
                <a href="https://twitter.com/"><img src="img/twitter.png" alt="twitter"></a>
                <a href="https://www.instagram.com/"><img src="img/instagram.png" alt="instagram"></a>
                <a href="https://www.tiktok.com/es/"><img src="img/tik-tok.png" alt="tiktok"></a>
            </div>
        </div>
    </div>
</body>
</html>