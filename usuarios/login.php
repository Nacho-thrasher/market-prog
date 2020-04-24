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
            <li><a href="#" class="active">Inicio de sesion</a></li>
        </ul>
    </div>
    <!-- SECCION FORM --------------------------------------------------------------------------------------->
    <div id="formularios">
        <form action="#" id="form_session" method="post">
            <!-- php validacion -->
            <?php
            $nombre = "";
            $password = "";

            if (isset($_POST['usuario'])) {
                $nombre = $_POST['usuario'];
                $password = $_POST['password'];

                $campos = array();

                if ($nombre == "") {
                    array_push($campos, "El campo Nombre no pude estar vacío");
                }
                if ($password == "" || strlen($password) <= 5) {
                    array_push($campos, "El campo Password no puede estar vacío, ni tener menos de 5 caracteres.");
                }

                if (count($campos) > 0) {
                    echo "<div class='error'>";
                    for ($i = 0; $i < count($campos); $i++) {
                        echo "<li>" . $campos[$i] . "</i>";
                    }
                } else {
                    include_once './login_us.php';
                    if (isset($_POST['submit'])) {
                        $nom = $_POST['usuario'];
                        $pass = $_POST['password'];

                        $comp = new Login();
                        $comp->login_us($nom, $pass);

                        $type = new Login();
                        $type->log_tipo($nom, $pass);
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

            <!-- password -->
            <p>Contraseña:</p>
            <div class="field-container">
                <i class="fa fa-key fa-lg" aria-hidden="true"></i>
                <input name="password" type="password" class="field" placeholder="*******"> <br />
            </div>
            <!-- boton -->
            <p class="center-content">
                <input type="hidden" name="accion" value="insert">
                <input type="submit" name="submit" class="btn btn-green" value="Iniciar sesion"> <br /><br />
                <a href="registro.php">Registrarse</a>
            </p>
            
        </form>
    </div>
    <!-- END SECCION FORM ---------------------------------------------------------------------------------->
</body>

</html>