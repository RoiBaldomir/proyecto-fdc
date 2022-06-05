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
    <title>Mis Juegos</title>
    <link rel="stylesheet" href="css/my_games.css">
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
<?php
    if ($LOGGED_IN == TRUE){ //Si el usuario se encuentra registrado muestra su lista de juegos
?>
<div class="content">
    <h1>Mis Juegos</h1>
    <h2>Completados</h2>
    <hr>
    <?php
        $sessionname = $_SESSION['username'];
        $consulta = $db->prepare("SELECT * FROM tFavGames WHERE type = ? AND username = ? "); // Consulta para mostrar los juegos completados
        $consulta->execute(['C', $sessionname]); //Se ejecuta con una sentencia preparada
        $videojuegos = $consulta->fetchAll(PDO::FETCH_OBJ); //Devuelve todos los juegos completados
    ?>
    <div class="videogames">
        <?php
            foreach ($videojuegos as $videojuego){ ?>
            <?php
                    if (isset($_POST['eliminar'.$videojuego->id])) {
                        $consulta = $db->prepare("DELETE FROM tFavGames WHERE id = ? AND type = ? AND username = ? "); //Sentencia para eliminar el juego de la lista
                        $consulta->execute([$videojuego->id, 'C', $sessionname]); //Se ejecuta con una sentencia preparada
                        header('location: My_games.php'); //Recarga la página para guardar los cambios
                    }
            ?>
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
                <div class="button">
                    <form method="post">';
                        <input type="submit" name="eliminar<?php echo $videojuego->id ?>" class="delete" value="Eliminar de la lista"/>';
                    </form>
                </div>
            </div>
        <?php } ?>
        </div>
    <h2>En progreso</h2>
    <hr>
    <?php
        $consulta = $db->query("SELECT * FROM tFavGames WHERE type = ? AND username = ? "); // Consulta para mostrar los juegos en progreso
        $consulta->execute(['IP', $sessionname]); //Se ejecuta con una sentencia preparada
        $videojuegos = $consulta->fetchAll(PDO::FETCH_OBJ); //Devuelve todos los juegos en progreso
    ?>
    <div class="videogames">
        <?php
            foreach ($videojuegos as $videojuego){ ?>
            <?php
                    if (isset($_POST['eliminar'.$videojuego->id])) {
                        $consulta = $db->prepare("DELETE FROM tFavGames WHERE id = ? AND type = ? AND username = ? "); //Sentencia para eliminar el juego de la lista
                        $consulta->execute([$videojuego->id, 'IP', $sessionname]); //Se ejecuta con una sentencia preparada
                        header('location: My_games.php'); //Recarga la página para guardar los cambios
                    }
            ?>
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
                <div class="button">
                    <form method="post">';
                        <input type="submit" name="eliminar<?php echo $videojuego->id ?>" class="delete" value="Eliminar de la lista"/>';
                    </form>
                </div>
            </div>
        <?php } ?>
        </div>
    <h2>Pendientes de jugar</h2>
    <hr>
    <?php
        $consulta = $db->query("SELECT * FROM tFavGames WHERE type = ? AND username = ? "); // Consulta para mostrar los juegos pendientes de jugar
        $consulta->execute(['H', $sessionname]); //Se ejecuta con una sentencia preparada
        $videojuegos = $consulta->fetchAll(PDO::FETCH_OBJ); //Devuelve todos los juegos pendientes de jugar
    ?>
    <div class="videogames">
        <?php
            foreach ($videojuegos as $videojuego){ ?>
            <?php
                    if (isset($_POST['eliminar'.$videojuego->id])) {
                        $consulta = $db->prepare("DELETE FROM tFavGames WHERE id = ? AND type = ? AND username = ? "); //Sentencia para eliminar el juego de la lista
                        $consulta->execute([$videojuego->id, 'H', $sessionname]); //Se ejecuta con una sentencia preparada
                        header('location: My_games.php'); //Recarga la página para guardar los cambios
                    }
            ?>
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
                <div class="button">
                    <form method="post">';
                        <input type="submit" name="eliminar<?php echo $videojuego->id ?>" class="delete" value="Eliminar de la lista"/>';
                    </form>
                </div>
            </div>
        <?php } ?>
        </div>
    <h2>Abandonados</h2>
    <hr>
    <?php
        $consulta = $db->query("SELECT * FROM tFavGames WHERE type = ? AND username = ? "); // Consulta para mostrar los juegos abandonados
        $consulta->execute(['D', $sessionname]); //Se ejecuta con una sentencia preparada
        $videojuegos = $consulta->fetchAll(PDO::FETCH_OBJ); //Devuelve todos los juegos abandonados
    ?>
    <div class="videogames">
        <?php
            foreach ($videojuegos as $videojuego){ ?>
            <?php
                    if (isset($_POST['eliminar'.$videojuego->id])) {
                        $consulta = $db->prepare("DELETE FROM tFavGames WHERE id = ? AND type = ? AND username = ? "); //Sentencia para eliminar el juego de la lista
                        $consulta->execute([$videojuego->id, 'D', $sessionname]); //Se ejecuta con una sentencia preparada
                        header('location: My_games.php'); //Recarga la página para guardar los cambios
                    }
            ?>
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
                <div class="button">
                    <form method="post">';
                        <input type="submit" name="eliminar<?php echo $videojuego->id ?>" class="delete" value="Eliminar de la lista"/>';
                    </form>
                </div>
            </div>
        <?php } ?>
        </div>
</div>
<?php
    }
    else { //Si el usuario no está registrado se muestra un mensaje de que necesita registrarse
        echo '<div class="content">';
        echo '<h1 style="margin-bottom:36%; margin-top: 50px">Regístrate para poder ver esta página</h1>';
        echo '</div>';
    }
?>
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