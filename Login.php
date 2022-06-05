<!DOCTYPE html>
<?php
    require_once __DIR__ . "/db/db_connection.php"; //Se añade la conexión a la base de datos
    session_start(); //Se inicia la sesión
    if (isset($_SESSION['username']) && isset($_SESSION['userid'])) //Se comprueba la sesión
        header("Location: ./Index.php");  //Redirige al usuario a la pagina principal
?>
<html lang="es-ES">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login</title>
    <link href="css/login.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <div class="contenedor">
        <div class="img">
            <a href="Index.php"><img src="img/logo.png" alt="logo"></a>
        </div>
        <?php
            if (isset($_POST['login'])){
                //Se recogen los valores del formulario
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                //Se asegura que los campos no vayan vacios
                if ($username != "" && $password != "") { 
                    $consulta = $db->prepare("SELECT count(*) FROM tUsers WHERE username = ? "); // Consulta para comprobar las filas
                    $consulta ->execute([$username]); //Se ejecuta con una sentencia preparada
                    $num_rows = $consulta ->fetchColumn(); //Devuelve el número de filas

                    if ($num_rows == 1) { //Si hay coincidencia se busca el usuario correspondiente
                        $consulta = $db->prepare("SELECT * FROM tUsers WHERE username = ? "); //Consulta para encontrar el usuario en la BBDD
                        $consulta ->execute([$username]); //Se ejecuta con una sentencia preparada
                        $record = $consulta->fetch(PDO::FETCH_ASSOC);
                        
                        $password = md5($password); //Se comprueba la contraseña hasheada
                        
                        if ($password === $record["password"]) { //Si las contraseñas coinciden el usuario inicia sesión
                            if ($record["status"] == 1) {
                                //Se añaden los valores a la variable de sesión
                                $_SESSION["username"] = $record["username"];
                                $_SESSION["userid"] = $record["userid"];
                                
                                $success = true;
                                
                                header("Location: ./Index.php"); //Se redirige al usuario a la página principal
                            }
                            else {
                                $error_msg = 'Activa tu cuenta, por favor';
                            }
                        }
                        else {
                            $error_msg = 'Contraseña incorrecta';
                        } 
                    }
                    else {
                        $error_msg = 'La cuenta de usuario no existe';
                    }  
                }
                else {
                    $error_msg = 'Por favor, rellena todos los campos requeridos';
                }   
            }
        ?>
        <div class="form">
            <form method="POST" id="form">
                <ul>
                    <div class="title">
                        <li>
                            <h1>Inicia Sesión</h1>
                        </li>
                    </div>
                    <div class="input">
                        <li>
                            <label for="username"></label>
                            <input type="text" name="username" placeholder="Usuario" id="username">
                        </li>
                        <li>
                            <label for="password"></label>
                            <input type="password" name="password" placeholder="Contraseña" id="password">
                        </li>
                    </div>
                    <div class="submit">
                        <li>
                            <button class="button" type="submit" name="login">Enviar</button>
                        </li>
                        <li>
                            <p>¿No te has registrado? <a href="/Register.php">Crear una cuenta</a></p>
                        </li>
                    </div>
                    <div class="info">
                    <?php
                        if (isset($success) && $success = true){
                        echo '<p style="color: green">Inicio de sesión OK<p>'; //Mensaje de OK
                        }
                        else if (isset($error_msg))
                        echo '<p style="color: red">'.$error_msg.'</p>'; //Se muestran los mensajes de error
                    ?>
                    </div>
                </ul>
            </form>
        </div>
    </div>
</body>
</html>