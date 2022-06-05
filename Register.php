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
    <title>Registro</title>
    <link href="css/registro.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <div class="result">
	</div>
<div class="contenedor">
        <div class="img">
            <a href="Index.php"><img src="img/logo.png" alt="logo"></a>
        </div>
        <?php
            if (isset($_POST['register'])) { 
                //Se recogen los valores del formulario
                $name = $_POST['name']; 
                $username = $_POST['username']; 
                $email = $_POST['email']; 
                $password = $_POST['password']; 
                $cpassword = $_POST['cpassword'];
                //Se comprueba que los valores del formulario no estén vacios
                if ($username != "" && $name != "" && $password != "" && $cpassword != "" && $email != "") {
                    //Se comprueba que las contraseñas coincidan
                    if ($password === $cpassword) {
                        //Se comprueba que la contraseña sea mayor o igual a 6 carácteres
                        if (strlen($password) >= 6) {
                            $consulta = $db->prepare("SELECT * FROM tUsers WHERE username = ? "); //Consulta para comprobar si existe el usuario
                            $consulta ->execute([$username]); //Se ejecuta con una sentencia preparada
                            $num_rows = $consulta ->fetchColumn(); //Se comprueban las columnas

                            if ($num_rows == 0) { //Si no existe se crea el usuario correctamente
                                $password = md5($password); //Se hashea la contraseña
                                $status = 1;
    
                                $consulta = $db->prepare("INSERT INTO tUsers (name, username, email, password, status) VALUES (?, ?, ?, ?, ?)"); //Se inserta el usuario en la BBDD
                                $consulta->execute([$name, $username, $email, $password, $status]); //Se ejecuta con una sentencia preparada
        
                                $success = true;
                            }
                            else {
                                $error_msg = 'El nombre de usuario <i>'.$username.'</i> ya existe, por favor, elige otro';
                            }
                        }
                        else
                            $error_msg = 'La contraseña debe tener al menos 6 carácteres';
                    }
                    else
                        $error_msg = 'Las contraseñas no coinciden.';
                }
                else
                    $error_msg = 'Por favor, rellena todos los campos requeridos';
            }
            ?>
        <div class="form">
            <form method="POST" id="form">
                <ul>
                    <div class="title">
                        <li>
                            <h1>Crea una cuenta</h1>
                        </li>
                    </div>   
                    <div class="input">
                        <li>
                            <label for="nombre"></label>
                            <input type="text" name="name" placeholder="Nombre" id="nombre">
                        </li>
                        <li>
                            <label for="usuario"></label>
                            <input type="text" name="username" placeholder="Usuario" id="usuario">
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
                    <div class="privacy">
                        <p>Con la creación de una cuenta, estás aceptando nuestra <a href="/Privacidad.php">Política de Privacidad</a>.</p>
                    </div>
                    <div class="submit">
                        <li>
                            <button class="button" type="submit" name="register">Enviar</button>
                        </li>
                        <li>
                            <p>¿Ya tienes una cuenta? <a href="/Login.php">Iniciar sesión</a></p>
                        </li>
                    </div>
                    <div class="info">
                    <?php
                        //Mensaje de OK
                        if (isset($success) && $success == true){
                            echo '<p style="color: green">Tu cuenta ha sido creada.</p>';
                        }
                        //Mensaje de errores
                        else if (isset($error_msg))
                            echo '<p style="color: red">'.$error_msg.'</p>';
                    ?>
                    </div>
                </ul>
            </form>
        </div>
    </div>
</body>
</html>