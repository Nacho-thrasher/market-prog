<!doctype html>
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

    <title>Login!</title>
</head>

<body class='bg-green'>
    <div class="container">
        <div class="row">
            <div class="col-6 bg-clear mt-3 p-3 pb-1 mx-auto text-center">
                <!--TEXTO TITULO ACTUAL --------------------------------------------------------------------------------->
                <a href="#" class="align-middle text-dark active">Inicios de sesion</a>    
            </div>
        </div>
        <div class="row">
            <div class="col-6 mx-auto bg-clear mt-3 p-3 text-center">
                <!-- SECCION FORM --------------------------------------------------------------------------------------->
                <div id="formularios" class=''>
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
                            array_push($campos, "El campo Nombre no pude estar vacío.");
                        }
                        if ($password == "" ) {
                            array_push($campos, "El campo Password no puede estar vacío.");
                        }

                        if (count($campos) > 0) {
                            echo "<div class='error bg-orange text-light p-3'>";
                            for ($i = 0; $i < count($campos); $i++) {
                                echo "<li>" . $campos[$i] . "</li>";
                            }
                        } else {
                            include_once './login.php';
                            if (isset($_POST['submit'])) {
                                $res = new Login();
                                $res ->comprobar_us($nombre, $password);

                                $comp = new Login();
                                $comp->comprobar_log($nombre, $password);

                            }
                        }
                        echo "</div>";
                    }
                    // fin validacion==================================
                    ?>
                        <!-- usuario -->
                        <p class='mt-3'>Usuario:</p>
                        <div class="form-group row justify-content-center">
                            <label for="usuario" class='text-secondary col-form-label'><i class="far fa-user fa-lg" aria-hidden="true"></i></label>       
                            <div class="ml-2">
                                <input name="usuario" id="usuario" type="text" class="form-control" placeholder="usuario">
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
                        <!-- boton -->
                        <p class="center-content">
                            <input type="hidden" name="accion" value="insert">
                            <input type="submit" name="submit" class="btn btn-green" value="Iniciar sesion">
                            <br /><br />
                            <a href="./form_reg.php">Registrarse</a>
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