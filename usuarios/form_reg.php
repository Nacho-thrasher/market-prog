
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/85cbbbc4f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/boton.css">
    <link rel="stylesheet" href="../css/login.css">
    <!-- <link rel="stylesheet" href="../css/index.css"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="../css/index.css"> -->
    <title>Registro</title>
</head>

<body class='bg-green'>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto bg-clear mt-3 p-3 pb-1 text-center">
                <!--TEXTO TITULO ACTUAL --------------------------------------------------------------------------------->
                <a href="#" class="align-middle text-dark active">Registro</a>    
            </div>
        </div>
        <div class="row">
            <div class="col-6 mx-auto bg-clear mt-2 p-3 mb-4 text-center">
                <!-- SECCION FORM --------------------------------------------------------------------------------------->
                <div id="formularios" class=''>
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
                if ($password == "") {
                    array_push($campos, "El campo Password no puede estar vacío.");
                }
                if ($email == "" || strpos($email, "@") === false) {
                    array_push($campos, "Ingresa un correo electrónico válido.");
                }
                if ($telefono == "") {
                    array_push($campos, "El campo telefono no puede estar vacio.");
                }
                if ($direccion == "") {
                    array_push($campos, "Ingresa un direccion.");
                }

                if (count($campos) > 0) {
                    echo "<div class='error bg-orange text-light p-3'>";
                    for ($i = 0; $i < count($campos); $i++) {
                        echo "<li>" . $campos[$i] . "</i>";
                    }
                } else {
                    include_once './registro.php';
                    if (isset($_POST['submit'])) {

                        $comp = new Registro();
                        $comp ->comprobar_reg($nombre);

                        $agregar_us = new Registro();
                        $agregar_us->insert_reg($nombre, $password, $email, $telefono, $direccion);
                    }
                }
                echo "</div>";
            }
            // fin validacion==================================

            ?>
            <!-- fin php validacion -->
            <!-- usuario -->
            <p class='mt-3'>Usuario:</p>
                        <div class="form-group row justify-content-center">
                            <label for="usuario" class='text-secondary col-form-label'><i class="far fa-user fa-lg" aria-hidden="true"></i></label>       
                            <div class="ml-2">
                                <input name="usuario" id="usuario" type="text" class="form-control" placeholder="usuario">
                            </div>
                        </div>
            <!-- email -->
            <p class='mt-3'>Correo:</p>
                        <div class="form-group row justify-content-center">
                            <label for="email" class='text-secondary col-form-label'><i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i></label>       
                            <div class="ml-2">
                                <input name="email" id="email" type="text" class="form-control" placeholder="user@example.com">
                            </div>
                        </div>
                                    <!-- password -->
                                    <p>Contraseña:</p>
                        <div class="form-group row justify-content-center">
                            <label for="password" class='text-secondary col-form-label'><i class="fa fa-key fa-lg" aria-hidden="true"></i></label>       
                            <div class="ml-2">
                            <input name="password" id="password" type="password" class="form-control" placeholder="*******">
                            </div>
                        </div>
                                    <!-- telefono -->
                                    <p>Telefono:</p>
                        <div class="form-group row justify-content-center">
                            <label for="telefono" class='text-secondary col-form-label'><i class="fas fa-phone fa-lg"></i></label>       
                            <div class="ml-2">
                            <input name="telefono" id="telefono" type="number" class="form-control" placeholder="3874189101">
                            </div>
                        </div>
            <!-- direccion -->
            <p>Direccion:</p>
            <div class="form-group row justify-content-center">
                            <label for="direccion" class='text-secondary col-form-label'><i class="fas fa-location-arrow fa-lg"></i></label>       
                            <div class="ml-2">
                            <input name="direccion" id="direccion" type="text" class="form-control" placeholder="san remo">
                            </div>
                        </div>
            <!-- boton -->
            <p class="center-content">
                <input type="hidden" name="accion" value="insert">
                <input type="submit" name="submit" class="btn btn-green" value="Registrarse"> <br /><br />
                <a href="./form_log.php">Iniciar sesión</a>
            </p>
            <p class="center-content">
                <a href="../index.php">Volver a inicio.</a>
            </p>
        </form>
                    
                </div>
                <!-- END SECCION FORM ---------------------------------------------------------------------------------->

            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>