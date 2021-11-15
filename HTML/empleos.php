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
    <title>Empleos</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../Resources/tambs_logo_icono.png" />


</head>

<body class="body-empleo">
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

    <div class="imagenjob">
        <img src="../Resources/image-job.jpg" alt="" class="imagen-job">
    </div>

    <div class="contenedor-buscador">
        <input type="text" name="" placeholder="Puesto" class="input-puesto">
        <input type="text" name="" placeholder="Ciudad" class="input-ciudad">
        <a href="empleos.html" class="btn-buscar">Buscar </a>
    </div>

    <div class="contenedor-ordenarpor">
        <p class="texto-ordenar">Ordenar por:</p>
        <a href="">
            <p class="texto-fecha">Fecha</p>
            <img src="../Resources/ic_baseline-date-range.png" alt="" class="img-date">
        </a>
        <a href="">
            <p class="texto-salario">Salario</p>
            <img src="../Resources/ic_baseline-attach-money.png" alt="" class="img-money">
        </a>



    </div>

    <div class="contenedor-ofertas">
        <?php
        include('../HTML/bd.php');

        $sql = "CALL `obtener_empleos_ordenados`();";

        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
        ?>


            <div class="oferta1">
                <div class="logo-company">
                    <img src="<?php echo $row['logo'] ?>" alt="">
                </div>
                <div class="datos-oferta">
                    <div class="oferta-titulo">
                        <p><?php echo $row['titulo'] ?></p>
                    </div>
                    <div class="oferta-datos">
                        <div class="sueldo">
                            <p><?php echo "$" . $row['sueldo'] . " MXN" ?></p>
                        </div>


                        <div class="empresa">
                            <img src="../Resources/empresaicon.png" alt="">
                            <p><?php echo $row['nombre'] ?></p>
                        </div>
                        <div class="ciudad">
                            <img src="../Resources/locacionicon.png" alt="">
                            <p><?php echo $row['ciudad'] ?></p>

                        </div>
                    </div>

                    <div class="oferta-desc">


                        <span><?php
                                $rest = substr("$" . $row['descripcion'], 0, 350);
                                echo $rest . "..." ?></span>
                    </div>

                </div>
            </div>


        <?php } ?>

    </div>

    <div class="contenedor-filtros">
        <div class="contenedor-titulo">
            <img src="../Resources/categories.png" alt="">
            <p>Categoría</p>
        </div>
        <div class="filtros">
            <?php
            include('../HTML/bd.php');

            $sql = "CALL `categorias_empleo_cant`();";

            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <a href=""><?php echo $row['categoria'] . " (" . $row['cant_cat'] . ")" ?></a>
            <?php } ?>
        </div>
    </div>

    <div class="contenedor-tiempo">
        <div class="contenedor-titulo">
            <img src="../Resources/jornadaicon.png" alt="">
            <p>Por Contratación</p>
        </div>
        <div class="filtros">
            <?php
            include('../HTML/bd.php');

            $sql = "SELECT tipo_contratacion.contratacion,COUNT(*) AS cant_cont FROM post_empleo \n"

    . "INNER JOIN tipo_contratacion \n"

    . "ON post_empleo.tipo_contratacion_id=tipo_contratacion.id\n"

    . "GROUP BY tipo_contratacion.contratacion \n"

    . "ORDER BY cant_cont DESC;";

            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <a href=""><?php echo $row['contratacion'] . " (" . $row['cant_cont'] . ")" ?></a>
            <?php } ?>
        </div>
    </div>

    <div class="contenedor-ciudades">
        <div class="contenedor-titulo">
            <img src="../Resources/ciudadicon.png" alt="">
            <p>Por Ciudad</p>
        </div>
        <div class="filtros">
            <?php
            include('../HTML/bd.php');

            $sql = "SELECT ciudad.ciudad,COUNT(*) AS cant_ciudad FROM\n"

                . "post_empleo INNER JOIN ciudad\n"

                . "ON post_empleo.id_ciudad=ciudad.id\n"

                . "GROUP BY ciudad.ciudad\n"

                . "ORDER BY cant_ciudad DESC;";

            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <a href=""><?php echo $row['ciudad'] . " (" . $row['cant_ciudad'] . ")" ?></a>
            <?php } ?>
        </div>
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

<!-- SELECT compañia.id,compañia.logo FROM (SELECT * from(SELECT query1.id,query1.nombre,COUNT(*) AS cant_empleos
FROM (SELECT compañia.id,compañia.nombre FROM post_empleo INNER JOIN compañia ON post_empleo.compañia_id=compañia.id) AS query1
GROUP BY query1.nombre
ORDER BY cant_empleos DESC) AS query2 LIMIT 3) AS query3
INNER JOIN compañia ON query3.id=compañia.id; -->