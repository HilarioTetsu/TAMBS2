<?php
session_start();

include('../HTML/bd.php');

$id='';
if (isset($_SESSION['user_id'])) {
    $query = mysqli_query($conn, "SELECT * FROM `cuenta_usuario` where id='$_SESSION[user_id]'");
    $row = '';
    $id=$_SESSION['user_id'];
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compañías</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../Resources/tambs_logo_icono.png" />
</head>

<body>
    <header class="header">
        <nav class="nav-opciones">
            <div class="logo">
                <a href="../HTML/index.php"><img src="../Resources/tambs_logo.png" class="h-logo" alt=""></a>
            </div>
            <div class="enlaces">
                <a href="../HTML/empleos.php" class="enlace-empleo">
                    Empleos
                </a>
                <a href="../HTML/compañias.php" class="enlace-compañia">
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
                <?php if (!empty($row)) {?>


                <a href="../HTML/miperfil.html" class="btn-signin">Bienvenido</a>
                <a href="../HTML/logout.php" class="btn-signup">Logout</a>
                <?php }else{ ?>
                <a href="../HTML/signin.php" class="btn-signin">Sign in</a>
                <a href="../HTML/signup.html" class="btn-signup">Sign up</a>
                <?php } ?>

            </div>
        </nav>

    </header>

    <div class="imagenjob">
        <img src="../Resources/image-job.jpg" alt="" class="imagen-job">
    </div>

    <div class="contenedor-buscador-comp">
        <input type="text" name="" placeholder="Nombre de la empresa" class="input-nombre">
        <input type="text" name="" placeholder="Ciudad" class="input-ciudad-comp">
        <a href="compañias.html" class="btn-buscar-comp">Buscar </a>
    </div>
    <p class="num-company">(X) Compañias</p>

    </p>
    <div class="contenedor-company">
        <a href="compañias.html">
            <div class="company">
                <img src="../Resources/nodisponible.jpg" alt="">
                <p>(X) Empleos Disponibles</p>
            </div>
        </a>

        <a href="compañias.html">
            <div class="company">
                <img src="../Resources/nodisponible.jpg" alt="">
                <p>(X) Empleos Disponibles</p>
            </div>
        </a>
        <a href="compañias.html">
            <div class="company">
                <img src="../Resources/nodisponible.jpg" alt="">
                <p>(X) Empleos Disponibles</p>
            </div>
        </a>
        <a href="compañias.html">
            <div class="company">
                <img src="../Resources/nodisponible.jpg" alt="">
                <p>(X) Empleos Disponibles</p>
            </div>
        </a>
        <a href="compañias.html">
            <div class="company">
                <img src="../Resources/nodisponible.jpg" alt="">
                <p>(X) Empleos Disponibles</p>
            </div>
        </a>
        <a href="compañias.html">
            <div class="company">
                <img src="../Resources/nodisponible.jpg" alt="">
                <p>(X) Empleos Disponibles</p>
            </div>
        </a>
        <a href="compañias.html">
            <div class="company">
                <img src="../Resources/nodisponible.jpg" alt="">
                <p>(X) Empleos Disponibles</p>
            </div>
        </a>
        <a href="compañias.html">
            <div class="company">
                <img src="../Resources/nodisponible.jpg" alt="">
                <p>(X) Empleos Disponibles</p>
            </div>
        </a>
        <a href="compañias.html">
            <div class="company">
                <img src="../Resources/nodisponible.jpg" alt="">
                <p>(X) Empleos Disponibles</p>
            </div>
        </a>

    </div>

    <footer>
        <div class="footer-empleo">
            <p class="texto1">Compañía
                <br><br>
                About Us
                <br><br>
                Aviso de privacidad
                <br><br>
                Términos de Servicio
            </p>

            <p class="texto2">Candidatos
                <br><br>
                Crear cuenta gratis
                <br><br>
                Iniciar sesión
                <br><br>
                Perfiles Laborales

            </p>
            <p class="texto3">

                Perfiles de Empresa
                <br><br>
                Preguntas frecuentes candidatos
                <br><br>
                <?php 
                if (!empty($id)) {
                    echo $id;
                }
                ?>

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