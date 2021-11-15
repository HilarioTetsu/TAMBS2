<?php 
session_start();
if (isset($_SESSION['user_id'])) {
    header('location:index.php');
}

include('../HTML/bd.php');

if (isset($_POST['boton-login'])) {
    echo $email = $_POST['input-email'];
    echo $pass = $_POST['input-pass'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../Resources/tambs_logo_icono.png" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
</head>



<body class="body">
    <header class="header">
        <nav class="nav-opciones">
            <div class="logo">
                <a href="../HTML/index.php"><img src="../Resources/tambs_logo.png" class="h-logo" alt=""></a>
            </div>
            <div class="enlaces">
                <a href="../HTML/empleos.html" class="enlace-empleo">
                    Empleos
                </a>
                <a href="../HTML/compañias.html" class="enlace-compañia">
                    Compañias
                </a>
                <a href="../HTML/miperfil.html" class="enlace-perfil">
                    Mi Perfil
                </a>
                <a href="../HTML/postular.html" class="enlace-postular">
                    Postula un empleo
                </a>
            </div>
            <div class="contenedor-sign">
                <a href="../HTML/signin.php" class="btn-signin">Sign in</a>
                <a href="../HTML/signup.html" class="btn-signup">Sign up</a>
            </div>
        </nav>

    </header>

    <div class="imagenjob2">
        <img src="../Resources/image-job.jpg" alt="" class="imagen-job2">

        <form action="signin.php" method="post" class="contenedor-registro">

            <p class="titulo">Sign In</p>
            <div class="linea"></div>
            <input type="email" name="input-email" placeholder="Correo Electrónico" class="input-username" id="input-email">
            <input type="password" name="input-pass" placeholder="Contraseña" class="input-password" id="input-pass">
            <div class="contenedor-checkbox"><label><input type="checkbox" class="cbox1" value=""> Mantener
                    sesión</label><br></div>
            <a href="">
                <p class="forgot-pass">Olvidaste tu contraseña?</p>
            </a>
            <button class="btn-login" name="boton-login" id="boton-login" type="submit"> Iniciar sesión</button>
            <a href="signup.html" class="vinculo-registrarse">Registrate</a>
        </form>


    </div>


    <footer>
        <div class="footer-signin">
            <p class="texto1">Compañía
                <br><br> About Us
                <br><br> Aviso de privacidad
                <br><br> Términos de Servicio
            </p>

            <p class="texto2">Candidatos
                <br><br> Crear cuenta gratis
                <br><br> Iniciar sesión
                <br><br> Perfiles Laborales
                <?php
                include('../HTML/bd.php');

                if (isset($_POST['boton-login'])) {
                    $email = $_POST['input-email'];
                    $pass = $_POST['input-pass'];

                    $query = mysqli_query($conn, "SELECT * FROM `cuenta_usuario` where email='$email' and password='$pass'");
                    if (mysqli_num_rows($query) > 0) {
                        $row = mysqli_fetch_array($query);
                        $_SESSION['user_id']=$row['id'];

                        header('location:index.php');
                    } else {
                        echo "<script>alert('Email o contraseña incorrecta')</script>";
                    }
                }
                ?>

            </p>
            <p class="texto3">

                Perfiles de Empresa
                <br><br> Preguntas frecuentes candidatos
                <br><br>
            </p>
            <p class="titulo-redes">Tambs</p>
            <div class="contenedor-img">
                <img src="../Resources/cib_facebook-f.png" alt="" class="img1">
                <img src="../Resources/akar-icons_twitter-fill.png" alt="" class="img2">
                <img src="../Resources/akar-icons_instagram-fill.png" alt="" class="img3">
            </div>

        </div>
    </footer>
</body>

</html>

