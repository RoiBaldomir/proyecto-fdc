<!DOCTYPE html>
<html lang="es-ES">
<?php
    require_once __DIR__ . "/db/db_connection.php"; //Se importa el archivo para permitir la conexión a la base de datos

    session_start(); //Se inicia la sesión
    if (isset($_SESSION['username']) && isset($_SESSION['userid'])) //Se comprueba si el usuario está registrado
        $LOGGED_IN = true;
    else
        $LOGGED_IN = false;
?>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Inicio</title>
    <link rel="stylesheet" href="css/index.css">
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
    <?php
        $consulta = $db->prepare("SELECT * FROM tGames;"); // Consulta para devolver la lista de todos los juegos
        $consulta->execute(); //Se ejecuta con una sentencia preparada
        $videojuegos = $consulta->fetchAll(PDO::FETCH_OBJ); //Devuelve todos los juegos
    ?>
        <h1>Bienvenido a GameList</h1>
        <h2>Visita nuestra biblioteca de juegos</h2>
        <div class="videogames">
        <?php
            foreach ($videojuegos as $videojuego){ //Bucle para mostrar en pantalla todos los juegos ?>
            <div class="videogame">
                <div class="img">
                    <img src="/img/games/<?php echo $videojuego->id ?>.jpg" alt="imgGame">
                </div>
                <div class="name">
                    <p><b>Nombre: </b><?php echo $videojuego->name ?></p>
                </div>
                <div class="genre">
                    <p><b>Género: </b><?php echo $videojuego->genre ?></p>
                </div>
                <div class="release">
                    <p><b>Año de lanzamiento: </b><?php echo $videojuego->release_year ?></p>
                </div>
                <div class="developer">
                    <p><b>Desarrollador: </b><?php echo $videojuego->developer ?></p>
                </div>
                <div class="platforms">
                    <p><b>Plataformas: </b><?php echo $videojuego->platforms ?></p>
                </div>
                <?php
                    if ($LOGGED_IN == true) {
                ?>
                <div class="add">
                    <!-- Formulario para elegir el estado en el que se quiere colocar el juego -->
                    <form method="post">
                        <div class="option">
                            <label for="options<?php echo $videojuego->id ?>">Elige un estado: </label>
                            <select name="options<?php echo $videojuego->id ?>" id="options">
                                <option value="C">Completado</option>
                                <option value="IP">En Progreso</option>
                                <option value="H">Pendiente</option>
                                <option value="D">Abandonado</option>
                            </select>
                        </div>
                        <div class="button">
                        <input type="submit" name="submit<?php echo $videojuego->id ?>" value="Añadir a mis juegos">
                        <?php @$option = $_POST['options'.$videojuego->id]; //Se recoge el valor del select del formulario, es decir, el estado que se le va poner al juego ?> 
                        </div>
                        <?php
                            // Se comprueba que recibe el valor del formulario
                            if (isset($_POST['submit'.$videojuego->id])) {
                                $sessionname = $_SESSION['username'];
                                $id = $videojuego->id;
                                $consulta = $db->prepare("SELECT * FROM tFavGames WHERE id = ? AND username = ? "); //Consulta para comprobar que no se repitan juegos en la lista
                                $consulta ->execute([$id, $sessionname]); //Se ejecuta con una sentencia preparada
                                $num_rows = $consulta ->fetchColumn();
                                if ($num_rows == 0) { //Si no está el juego se inserta
                                    $consulta = $db->prepare("INSERT INTO tFavGames (id, name, genre, platforms, developer, release_year, type, username) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)"); // Consulta para mandar el juego a la página Mis juegos
                                    $consulta->execute([$videojuego->id, $videojuego->name, $videojuego->genre, $videojuego->platforms, $videojuego->developer, $videojuego->release_year, $option, $sessionname]); //Se ejecuta con una sentencia preparada
                                    echo '<p style="margin-bottom: 50px; color: green !important;">Juego añadido correctamente</p>'; //Mensaje de OK
                                }
                                else {
                                    echo '<p style="margin-bottom: 50px; color: red !important;">El juego ya se encuentra en tu lista</p>'; //Mensaje de error
                                }
                            }
                        ?> 
                    </form>
                </div>
                <?php
                    }
                ?>
            </div>
        <?php } ?>
        </div>
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