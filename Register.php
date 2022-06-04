<!DOCTYPE html>
<?php
    require_once __DIR__ . "/db/db_connection.php"; //Se añade la conexión a la base de datos
    session_start(); //Se inicia la sesión
    if (isset($_SESSION['username']) && isset($_SESSION['userid'])) 
        header("Location: ./Index.php");  // redirect the user to the home page
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

                if ($username != "" && $name != "" && $password != "" && $cpassword != "" && $email != "") {
                    // make sure the two passwords match
                    if ($password === $cpassword) {
                        // make sure the password meets the min strength requirements
                        if (strlen($password) >= 6) {
                            $consulta = $db->prepare("SELECT * FROM tUsers WHERE username = ? ");
                            $consulta ->execute([$username]);
                            $num_rows = $consulta ->fetchColumn();

                            if ($num_rows == 0) {
                                $password = md5($password);
                                $status = 1;
    
                                $consulta = $db->prepare("INSERT INTO tUsers (name, username, email, password, status) VALUES (?, ?, ?, ?, ?)"); 
                                $consulta->execute([$name, $username, $email, $password, $status]);
        
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
                        // check to see if the user successfully created an account
                        if (isset($success) && $success == true){
                            echo '<p style="color: green">Tu cuenta ha sido creada.</p>';
                        }
                        // check to see if the error message is set, if so display it
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