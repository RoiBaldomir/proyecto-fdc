<!DOCTYPE html>
<html lang="es-ES">
<?php
    include_once __DIR__ . "/db/db_connection.php";
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
    </div>
    <div class="content">
    <?php
        $consulta = $db->query("SELECT * FROM tGames;");
        $videojuegos = $consulta->fetchAll(PDO::FETCH_OBJ);
    ?>
        <h1>Bienvenido a GameList</h1>
        <div class="videogames">
        <?php
            foreach ($videojuegos as $videojuego){ ?>
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
                <div class="add">
                    <button>Añadir a Mis Juegos</button>
                </div>
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