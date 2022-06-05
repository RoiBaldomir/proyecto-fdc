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
                    $consulta = $db->prepare("SELECT count(*) FROM tUsers WHERE username = ? ");
                    $consulta ->execute([$username]);
                    $num_rows = $consulta ->fetchColumn();

                    if ($num_rows == 1) {
                        $consulta = $db->prepare("SELECT * FROM tUsers WHERE username = ? ");
                        $consulta ->execute([$username]);
                        $record = $consulta->fetch(PDO::FETCH_ASSOC);
                        
                        $password = md5($password);
                        
                        if ($password === $record["password"]) {
                            if ($record["status"] == 1) {
                                $_SESSION["username"] = $record["username"];
                                $_SESSION["userid"] = $record["userid"];
                                
                                $success = true;
                                
                                header("Location: ./Index.php");
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
                        // check to see if the user successfully created an account
                        if (isset($success) && $success = true){
                        echo '<p style="color: green">You have logged in. Please go to the <a href="./Index.php">home page</a>.<p>';
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