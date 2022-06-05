<!DOCTYPE html>
<?php
    session_start(); //Se inicia la sesión
    if (isset($_SESSION['username']) && isset($_SESSION['userid'])) //Se comprueba si el usuario está registrado
        $LOGGED_IN = true;
    else
        $LOGGED_IN = false;
?>
<html lang="es-ES">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Política de Cookies</title>
    <link rel="stylesheet" href="css/cookie.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
        <?php
            if ($LOGGED_IN == true) { //Si está registrado se muestra el botón de cerrar sesión, si no, el de iniciar sesión y registro
                echo '<div class="login">';
                echo "<p>Bienvenido <b>".$_SESSION['username']."</b> <button style='margin-left: 30px;'><a style='text-decoration: none; color: lightgrey' href='Logout.php'>Cerrar Sesión</a></button></p>";
                echo '</div>';
            }
            else {
        ?>
        <div class="login">
            <ul>
                <div>
                    <li><button><a href="Login.php">Inicia Sesión</a></button></li>
                </div>
                <div>
                    <li><button><a href="Register.php">Regístrate</a></button></li>
                </div> 
            </ul>
        </div>
        <?php
            }
        ?>
    </div>
    <div class="content">
        <h1>Política de Cookies</h1>
        <h2>www.gamelist.com</h2>
        <p>El acceso a este Sitio Web puede implicar la utilización de cookies. Las cookies son pequeñas cantidades de información que se almacenan en el navegador utilizado por cada Usuario —en los distintos dispositivos que pueda utilizar para navegar— para que el servidor recuerde cierta información que posteriormente y únicamente el servidor que la implementó leerá. Las cookies facilitan la navegación, la hacen más amigable, y no dañan el dispositivo de navegación.</p>
        <p>Las cookies son procedimientos automáticos de recogida de información relativa a las preferencias determinadas por el Usuario durante su visita al Sitio Web con el fin de reconocerlo como Usuario, y personalizar su experiencia y el uso del Sitio Web, y pueden también, por ejemplo, ayudar a identificar y resolver errores.</p>
        <p>La información recabada a través de las cookies puede incluir la fecha y hora de visitas al Sitio Web, las páginas visionadas, el tiempo que ha estado en el Sitio Web y los sitios visitados justo antes y después del mismo. Sin embargo, ninguna cookie permite que esta misma pueda contactarse con el número de teléfono del Usuario o con cualquier otro medio de contacto personal. Ninguna cookie puede extraer información del disco duro del Usuario o robar información personal. La única manera de que la información privada del Usuario forme parte del archivo Cookie es que el usuario dé personalmente esa información al servidor.</p>
        <p>Las cookies que permiten identificar a una persona se consideran datos personales. Por tanto, a las mismas les será de aplicación la Política de Privacidad anteriormente descrita. En este sentido, para la utilización de las mismas será necesario el consentimiento del Usuario. Este consentimiento será comunicado, en base a una elección auténtica, ofrecido mediante una decisión afirmativa y positiva, antes del tratamiento inicial, removible y documentado.</p>
        <h2>Cookies propias</h2>
        <p>Son aquellas cookies que son enviadas al ordenador o dispositivo del Usuario y gestionadas exclusivamente por GameList para el mejor funcionamiento del Sitio Web. La información que se recaba se emplea para mejorar la calidad del Sitio Web y su Contenido y su experiencia como Usuario. Estas cookies permiten reconocer al Usuario como visitante recurrente del Sitio Web y adaptar el contenido para ofrecerle contenidos que se ajusten a sus preferencias.</p>
        <h2>Deshabilitar, rechazar y eliminar cookies</h2>
        <p>El Usuario puede deshabilitar, rechazar y eliminar las cookies —total o parcialmente— instaladas en su dispositivo mediante la configuración de su navegador (entre los que se encuentran, por ejemplo, Chrome, Firefox, Safari, Explorer). En este sentido, los procedimientos para rechazar y eliminar las cookies pueden diferir de un navegador de Internet a otro. En consecuencia, el Usuario debe acudir a las instrucciones facilitadas por el propio navegador de Internet que esté utilizando. En el supuesto de que rechace el uso de cookies —total o parcialmente— podrá seguir usando el Sitio Web, si bien podrá tener limitada la utilización de algunas de las prestaciones del mismo.</p>
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