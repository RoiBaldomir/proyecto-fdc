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
    <title>Aviso legal</title>
    <link rel="stylesheet" href="css/aviso.css">
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
        <h1>AVISO LEGAL Y CONDICIONES GENERALES DE USO</h1>
        <h2>www.gamelist.com</h2>
        <h2>I. INFORMACIÓN GENERAL</h2>
        <p>En cumplimiento con el deber de información dispuesto en la Ley 34/2002 de Servicios de la Sociedad de la Información y el Comercio Electrónico (LSSI-CE) de 11 de julio, se facilitan a continuación los siguientes datos de información general de este sitio web:</p>
        <p>La titularidad de este sitio web, www.gamelist.com, (en adelante, Sitio Web) la ostenta: Roi Baldomir Ares, con NIF: 11111111-W, y cuyos datos de contacto son:</p>
        <p>Dirección: Calle Falsa, 123 2ºD</p>
        <p>Teléfono de contacto:</p>
        <p>Fax: 666777444</p>
        <p>Email de contacto: contacto@gamelist.com</p>
        <h2>II. TÉRMINOS Y CONDICIONES GENERALES DE USO</h2>
        <p>El objeto de las condiciones: El Sitio Web</p>
        <p>El objeto de las presentes Condiciones Generales de Uso (en adelante, Condiciones) es regular el acceso y la utilización del Sitio Web. A los efectos de las presentes Condiciones se entenderá como Sitio Web: la apariencia externa de los interfaces de pantalla, tanto de forma estática como de forma dinámica, es decir, el árbol de navegación; y todos los elementos integrados tanto en los interfaces de pantalla como en el árbol de navegación (en adelante, Contenidos) y todos aquellos servicios o recursos en línea que en su caso ofrezca a los Usuarios (en adelante, Servicios).</p>
        <p>GameList se reserva la facultad de modificar, en cualquier momento, y sin aviso previo, la presentación y configuración del Sitio Web y de los Contenidos y Servicios que en él pudieran estar incorporados. El Usuario reconoce y acepta que en cualquier momento GameList pueda interrumpir, desactivar y/o cancelar cualquiera de estos elementos que se integran en el Sitio Web o el acceso a los mismos.</p>
        <p>El acceso al Sitio Web por el Usuario tiene carácter libre y, por regla general, es gratuito sin que el Usuario tenga que proporcionar una contraprestación para poder disfrutar de ello, salvo en lo relativo al coste de conexión a través de la red de telecomunicaciones suministrada por el proveedor de acceso que hubiere contratado el Usuario.</p>
        <p>La utilización de alguno de los Contenidos o Servicios del Sitio Web podrá hacerse mediante la suscripción o registro previo del Usuario.</p>
        <p>El Usuario</p>
        <p>El acceso, la navegación y uso del Sitio Web, confiere la condición de Usuario, por lo que se aceptan, desde que se inicia la navegación por el Sitio Web, todas las Condiciones aquí establecidas, así como sus ulteriores modificaciones, sin perjuicio de la aplicación de la correspondiente normativa legal de obligado cumplimiento según el caso. Dada la relevancia de lo anterior, se recomienda al Usuario leerlas cada vez que visite el Sitio Web.</p>
        <p>El Sitio Web de GameList proporciona gran diversidad de información, servicios y datos. El Usuario asume su responsabilidad para realizar un uso correcto del Sitio Web. Esta responsabilidad se extenderá a:</p>
        <p>Un uso de la información, Contenidos y/o Servicios y datos ofrecidos por GameList sin que sea contrario a lo dispuesto por las presentes Condiciones, la Ley, la moral o el orden público, o que de cualquier otro modo puedan suponer lesión de los derechos de terceros o del mismo funcionamiento del Sitio Web.
        La veracidad y licitud de las informaciones aportadas por el Usuario en los formularios extendidos por GameList para el acceso a ciertos Contenidos o Servicios ofrecidos por el Sitio Web. En todo caso, el Usuario notificará de forma inmediata a GameList acerca de cualquier hecho que permita el uso indebido de la información registrada en dichos formularios, tales como, pero no solo, el robo, extravío, o el acceso no autorizado a identificadores y/o contraseñas, con el fin de proceder a su inmediata cancelación.
        El mero acceso a este Sitio Web no supone entablar ningún tipo de relación de carácter comercial entre GameList y el Usuario.</p>
        <p>Siempre en el respeto de la legislación vigente, este Sitio Web de GameList se dirige a todas las personas, sin importar su edad, que puedan acceder y/o navegar por las páginas del Sitio Web.</p>
        <h2>III. ACCESO Y NAVEGACIÓN EN EL SITIO WEB: EXCLUSIÓN DE GARANTÍAS Y RESPONSABILIDAD</h2>
        <p>GameList no garantiza la continuidad, disponibilidad y utilidad del Sitio Web, ni de los Contenidos o Servicios. GameList hará todo lo posible por el buen funcionamiento del Sitio Web, sin embargo, no se responsabiliza ni garantiza que el acceso a este Sitio Web no vaya a ser ininterrumpido o que esté libre de error.</p>
        <p>Tampoco se responsabiliza o garantiza que el contenido o software al que pueda accederse a través de este Sitio Web, esté libre de error o cause un daño al sistema informático (software y hardware) del Usuario. En ningún caso GameList será responsable por las pérdidas, daños o perjuicios de cualquier tipo que surjan por el acceso, navegación y el uso del Sitio Web, incluyéndose, pero no limitándose, a los ocasionados a los sistemas informáticos o los provocados por la introducción de virus.</p>
        <p>GameList tampoco se hace responsable de los daños que pudiesen ocasionarse a los usuarios por un uso inadecuado de este Sitio Web. En particular, no se hace responsable en modo alguno de las caídas, interrupciones, falta o defecto de las telecomunicaciones que pudieran ocurrir.</p>
        <h2>IV. POLÍTICA DE ENLACES</h2>
        <p>El Usuario o tercero que realice un hipervínculo desde una página web de otro, distinto, sitio web al Sitio Web de GameList deberá saber que:</p>
        <p>No se permite la reproducción —total o parcialmente— de ninguno de los Contenidos y/o Servicios del Sitio Web sin autorización expresa de GameList.</p>
        <p>No se permite tampoco ninguna manifestación falsa, inexacta o incorrecta sobre el Sitio Web de GameList, ni sobre los Contenidos y/o Servicios del mismo.</p>
        <p>A excepción del hipervínculo, el sitio web en el que se establezca dicho hiperenlace no contendrá ningún elemento, de este Sitio Web, protegido como propiedad intelectual por el ordenamiento jurídico español, salvo autorización expresa de GameList.</p>
        <p>El establecimiento del hipervínculo no implicará la existencia de relaciones entre GameList y el titular del sitio web desde el cual se realice, ni el conocimiento y aceptación de GameList de los contenidos, servicios y/o actividades ofrecidos en dicho sitio web, y viceversa.</p>
        <h2>V. PROPIEDAD INTELECTUAL E INDUSTRIAL</h2>
        <p>GameList por sí o como parte cesionaria, es titular de todos los derechos de propiedad intelectual e industrial del Sitio Web, así como de los elementos contenidos en el mismo (a título enunciativo y no exhaustivo, imágenes, sonido, audio, vídeo, software o textos, marcas o logotipos, combinaciones de colores, estructura y diseño, selección de materiales usados, programas de ordenador necesarios para su funcionamiento, acceso y uso, etc.). Serán, por consiguiente, obras protegidas como propiedad intelectual por el ordenamiento jurídico español, siéndoles aplicables tanto la normativa española y comunitaria en este campo, como los tratados internacionales relativos a la materia y suscritos por España.</p>
        <p>Todos los derechos reservados. En virtud de lo dispuesto en la Ley de Propiedad Intelectual, quedan expresamente prohibidas la reproducción, la distribución y la comunicación pública, incluida su modalidad de puesta a disposición, de la totalidad o parte de los contenidos de esta página web, con fines comerciales, en cualquier soporte y por cualquier medio técnico, sin la autorización de GameList.</p>
        <p>El Usuario se compromete a respetar los derechos de propiedad intelectual e industrial de GameList. Podrá visualizar los elementos del Sitio Web o incluso imprimirlos, copiarlos y almacenarlos en el disco duro de su ordenador o en cualquier otro soporte físico siempre y cuando sea, exclusivamente, para su uso personal. El Usuario, sin embargo, no podrá suprimir, alterar, o manipular cualquier dispositivo de protección o sistema de seguridad que estuviera instalado en el Sitio Web.</p>
        <p>En caso de que el Usuario o tercero considere que cualquiera de los Contenidos del Sitio Web suponga una violación de los derechos de protección de la propiedad intelectual, deberá comunicarlo inmediatamente a GameList a través de los datos de contacto del apartado de INFORMACIÓN GENERAL de este Aviso Legal y Condiciones Generales de Uso.</p>
        <h2>VI. ACCIONES LEGALES, LEGISLACIÓN APLICABLE Y JURISDICCIÓN</h2>
        <p>GameList se reserva la facultad de presentar las acciones civiles o penales que considere necesarias por la utilización indebida del Sitio Web y Contenidos, o por el incumplimiento de las presentes Condiciones.</p>
        <p>La relación entre el Usuario y GameList se regirá por la normativa vigente y de aplicación en el territorio español. De surgir cualquier controversia en relación con la interpretación y/o a la aplicación de estas Condiciones las partes someterán sus conflictos a la jurisdicción ordinaria sometiéndose a los jueces y tribunales que correspondan conforme a derecho.</p>
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