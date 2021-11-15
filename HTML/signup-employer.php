<?php
include('../HTML/bd.php');
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");
$fecha = date('Y/m/d');

if (isset($_POST['registrar'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $fecha_nac = $_POST['fecha_nac'];
    $phone = $_POST['phone'];
    $genero = $_POST['genero'];
    $desc = $_POST['desc'];
    $comp_web = $_POST['comp_web'];
    $cat = $_POST['cat'];
    $image=$_FILES['image']['name'];
    $path='images/'.$image;

    $logo=$_FILES['logo']['name'];
    $path2='images/'.$logo;


    if ($image== NULL) {
        $path=NULL;
    }else{
        move_uploaded_file($_FILES['image']['tmp_name'],$path);
    }

    if ($logo== NULL) {
        $path2=NULL;
    }else{
        move_uploaded_file($_FILES['logo']['tmp_name'],$path2);
    }




    if ($nombre == NULL or $email == NULL or $pass == NULL or $phone == NULL or $genero == NULL or $desc == NULL or $comp_web == NULL) {
        echo "<script>alert('Error,se detectan campos vacíos')</script>";
        
    } else {
        $datos = array("tipo_user" => 2, "email" => $email, "pass" => $pass, "fecha_nac" => $fecha_nac, "genero" => $genero, "telefono" => $phone, "img" => $path, "fecha_signup" => $fecha, "nombre" => $nombre, "desc" => $desc, "cat" => $cat, "comp_web" => $comp_web,"logo" => $path2);

        $query = mysqli_query($conn, "CALL insertar_usuario_employer('$datos[tipo_user]','$datos[email]','$datos[pass]','$datos[fecha_nac]','$datos[genero]','$datos[telefono]','$datos[img]','$datos[fecha_signup]','$datos[nombre]','$datos[desc]','$datos[cat]','$datos[comp_web]','$datos[logo]');");
       
       
        if (!$query) {
            echo "<script>alert('Error en el registro')</script>";
        } else {
            header('location:signin.php');
            exit();
                    
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar empleador </title>
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
                <a href="/HTML/postular.html" class="enlace-postular">
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

        <form method="post" class="form_signup_seeker" action="signup-employer.php" enctype="multipart/form-data">
            <div>
                <input type="text" name="nombre" id="nombre" placeholder="Ingresa nombre de la compañia">
                <input type="email" name="email" id="email" placeholder="Ingresa email">
                <input type="password" name="pass" id="pass" placeholder="Ingresa password">
                <input type="date" name="fecha_nac" id="fecha_nac" placeholder="">
                <input type="tel" name="phone" id="phone" placeholder="Ingresa telefono">

                <select name="genero" id="genero" class="">
                    <option value="-" selected>-</option>
                    <option value="H">Hombre</option>
                    <option value="M">Mujer</option>
                </select>
                <input type="file" name="image" id="file" accept="image/*">
            </div>

            <div>
                <textarea name="desc" rows="10" cols="50" placeholder="Descripcion de la compañia"></textarea>
                <input type="text" name="comp_web" id="comp_web" placeholder="Ingresa el sitio web de tu compañia">
                
                <input type="file" name="logo" id="logo" accept="image/*">

                <select name="cat" id="cat" class="">
                    <?php
                    include('../HTML/bd.php');
                    

                    $query = mysqli_query($conn,"SELECT * FROM `compañia_categoria`;");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?php echo $row['id'] ?>" > <?php echo $row['categoria'] ?></option>
                    <?php } ?>
                    <option value="-" selected>-</option>
                </select>
                <button class="btn-registrarse" name="registrar" id="registrar" type="submit"> Registrarse</button>
            </div>


        </form>


    </div>

    <footer>

    </footer>
</body>

</html>

