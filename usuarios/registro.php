
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/85cbbbc4f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/boton.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>My Market</title>
</head>

<body>
    <!--TEXTO TITULO ACTUAL --------------------------------------------------------------------------------->
    <div id="menu">
        <ul>
            <li><a href="#" class="active">Registros Cliente</a></li>
        </ul>
    </div>
    <!-- SECCION FORM --------------------------------------------------------------------------------------->
    <div id="formularios">
        <form action="#" id="form_session" method="post">
            <!-- php validacion -->
            <?php
            $nombre = "";
            $password = "";
            $email = "";
            $telefono = "";
            $direccion = "";
            $compr = '';
            if (isset($_POST['usuario'])) {
                $nombre = $_POST['usuario'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $telefono = $_POST['telefono'];
                $direccion = $_POST['direccion'];

                $campos = array();

                if ($nombre == "") {
                    array_push($campos, "El campo Nombre no pude estar vacío");
                }
                if ($password == "" || strlen($password) <= 5) {
                    array_push($campos, "El campo Password no puede estar vacío, ni tener menos de 5 caracteres.");
                }
                if ($email == "" || strpos($email, "@") === false) {
                    array_push($campos, "Ingresa un correo electrónico válido.");
                }
                if ($telefono == "" || strlen($telefono) <= 5) {
                    array_push($campos, "El campo telefono no puede estar vacio.");
                }
                if ($direccion == "") {
                    array_push($campos, "Ingresa un direccion.");
                }

                if (count($campos) > 0) {
                    echo "<div class='error'>";
                    for ($i = 0; $i < count($campos); $i++) {
                        echo "<li>" . $campos[$i] . "</i>";
                    }
                } else {
                    include_once './agregar_us.php';

                    if (isset($_POST['submit'])) {
                        $nom = $_POST['usuario'];
                        $pass = $_POST['password'];
                        $email = $_POST['email'];
                        $tel = $_POST['telefono'];
                        $direc = $_POST['direccion'];

                        $comp = new Registro();
                        $comp ->comprovar($nom);

                        $agregar_us = new Registro();
                        $agregar_us->insert_reg($nom, $pass, $email, $tel, $direc);
                    }
                }
                echo "</div>";
            }
            // fin validacion==================================

            ?>
            <!-- fin php validacion -->
            <!-- usuario -->
            <p>Usuario:</p>
            <div class="field-container">
                <i class="far fa-user fa-lg" aria-hidden="true"></i>
                <input name="usuario" type="text" class="field" placeholder="usuario1"> <br />
            </div>
            <p>Correo electrónico:</p>
            <div class="field-container">
                <i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i>
                <input name="email" type="text" class="field" placeholder="user@example.com"> <br />
            </div>
            <!-- password -->
            <p>Contraseña:</p>
            <div class="field-container">
                <i class="fa fa-key fa-lg" aria-hidden="true"></i>
                <input name="password" type="password" class="field" placeholder="*******"> <br />
            </div>
            <!-- telefono -->
            <p>Telefono:</p>
            <div class="field-container">
                <i class="fas fa-phone fa-lg"></i>
                <input name="telefono" type="number" class="field" placeholder="3874189101"> <br />
            </div>
            <!-- telefono -->
            <p>Direccion:</p>
            <div class="field-container">
                <i class="fas fa-location-arrow fa-lg"></i>
                <input name="direccion" type="text" class="field" placeholder="san remo"> <br />
            </div>
            <!-- boton -->
            <p class="center-content">
                <input type="hidden" name="accion" value="insert">
                <input type="submit" name="submit" class="btn btn-green" value="Registrarse"> <br /><br />
                <a href="login.php">Iniciar sesión</a>
            </p>
            <p class="center-content">
                <a href="../index.php">Volver a inicio.</a>
            </p>
        </form>
    </div>
    <!-- END SECCION FORM ---------------------------------------------------------------------------------->
</body>

</html>