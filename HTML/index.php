<?php
session_start();

include('../HTML/bd.php');

$id = '';
if (isset($_SESSION['user_id'])) {
    $query = mysqli_query($conn, "SELECT * FROM `cuenta_usuario` where id='$_SESSION[user_id]'");
    $row = '';
    $id = $_SESSION['user_id'];
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
    <title>Tambs</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../Resources/tambs_logo_icono.png" />
</head>

<body class="body">
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
                <?php if (!empty($row)) { ?>


                    <a href="../HTML/miperfil.html" class="btn-signin">Bienvenido</a>
                    <a href="../HTML/logout.php" class="btn-signup">Logout</a>
                <?php } else { ?>
                    <a href="../HTML/signin.php" class="btn-signin">Sign in</a>
                    <a href="../HTML/signup.html" class="btn-signup">Sign up</a>
                <?php } ?>

            </div>
        </nav>

    </header>
    <div class="contenedor-tapador"></div>
    <div class="contenedor-searchjob">




        <div class="titulo">
            <p>Encuentra empleo cerca de tu región al instante</p>
        </div>
        <input type="text" name="" placeholder="Puesto,area o empresa" class="text-puesto">
        <input type="text" name="" placeholder="Localidad o Código Postal" class="text-localidad">
        <a href="../HTML/empleos.html" class="btn-buscar">Buscar</a>
    </div>
    <div class="contenedor-tapador2"></div>

    <div class="contenedor-maspopulares">
        <div class="titulo">
            <p>Compañías más populares</p>
        </div>

        <div class="contimg1">
            <?php
            $sql = "CALL `company_top_3`();";
            $query = mysqli_query($conn, $sql);

            while ($dato = mysqli_fetch_array($query)) {
            ?>
                <a href="compañias.html"> <img src="<?php echo $dato['logo'] ?>" class="imagen"></a>
                <?php } ?>
        </div>
       

    </div>

    <div class="contenedor-ejemplos">
        <a href="empleos.html">
            <div class="ejemplo1">
                <h1>UX/UI Designer</h1>
                <p>There spirit beginning bearing the open at own every give appear in third you sawe two boys</p>
            </div>
        </a>
        <a href="empleos.html">
            <div class="ejemplo2">
                <h1>Web Designer</h1>
                <p>There spirit beginning bearing the open at own every give appear in third you sawe two boys</p>
            </div>
        </a>

        <a href="empleos.html">
            <div class="ejemplo3">
                <p>There spirit beginning bearing the open at own every give appear in third you sawe two boys</p>
                <h1>Accounting And Finance</h1>
            </div>
        </a>

    </div>

    <div class="contenedor-categorias">
        <h1>Empleos por Categoría</h1>
        <a href="empleos.html">
            <div class="categoria1">
                <h1>Administrativo</h1>
                <img src="../Resources/Rectangle 10.png" class="imgcat">
                <p class="textocategoria">XX Empleo(s) Disponibles</p>
            </div>
        </a>

        <a href="empleos.html">
            <div class="categoria2">
                <h1>Ventas</h1>
                <img src="../Resources/Sales.png" class="imgcat">
                <p class="textocategoria">XX Empleo(s) Disponibles</p>
            </div>
        </a>


        <a href="empleos.html">
            <div class="categoria3">
                <h1>Finanzas</h1>
                <img src="../Resources/Finance.png" class="imgcat">
                <p class="textocategoria">XX Empleo(s) Disponibles</p>
            </div>
        </a>

        <a href="empleos.html">
            <div class="categoria4">
                <h1>Ingenieria</h1>
                <img src="../Resources/Rectangle 13.png" class="imgcat">
                <p class="textocategoria">XX Empleo(s) Disponibles</p>
            </div>
        </a>

        <a href="empleos.html">
            <div class="categoria5">
                <h1>Logistica</h1>
                <img src="../Resources/Logistics Delivery.png" class="imgcat">
                <p class="textocategoria">XX Empleo(s) Disponibles</p>
            </div>
        </a>

        <a href="empleos.html">
            <div class="categoria6">
                <h1>Manufactura</h1>
                <img src="../Resources/Industrial.png" class="imgcat">
                <p class="textocategoria">XX Empleo(s) Disponibles</p>
            </div>
        </a>

        <a href="empleos.html">
            <div class="categoria7">
                <h1>Sector Salud</h1>
                <img src="../Resources/Health.png" class="imgcat">
                <p class="textocategoria">XX Empleo(s) Disponibles</p>
            </div>
        </a>

        <a href="empleos.html">
            <div class="categoria8">
                <h1>RH</h1>
                <img src="../Resources/Human Resources.png" class="imgcat">
                <p class="textocategoria">XX Empleo(s) Disponibles</p>

            </div>
        </a>

    </div>

    <div class="contenedor-prefooter">
        <div class="imagenprefooter">
            <img src="../Resources/image-prefooter.png" alt="" class="imagen-prefooter">
        </div>
        <a href="signup.html" class="btnsignup-prefooter">
            <p class="btnsignup-prefooter-text">Sign Up</p>
        </a>
        <div>
            <h1 class="titulo-prefooter">Buscando Empleo?</h1>
            <p class="sublorem">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
        </div>
    </div>
    <footer>
        <div class="footer">
            <p class="texto1">Compañia
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
                Preguntas frecuentes candidatosS
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



<!-- SELECT compañia.id,compañia.logo FROM (SELECT * from(SELECT query1.id,query1.nombre,COUNT(*) AS cant_empleos FROM (SELECT compañia.id,compañia.nombre FROM post_empleo INNER JOIN compañia ON post_empleo.compañia_id=compañia.id) AS query1 GROUP BY query1.nombre ORDER BY cant_empleos DESC) AS query2 LIMIT 3) AS query3 INNER JOIN compañia ON query3.id=compañia.id; -->