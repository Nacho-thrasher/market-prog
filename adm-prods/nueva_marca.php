<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- css principal -->
    <link rel="stylesheet" href="../css/principal.css">
    <!-- iconos -->
    <script src="https://kit.fontawesome.com/85cbbbc4f0.js" crossorigin="anonymous"></script>
    <!-- jqueri -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <!-- <link rel="stylesheet" href="./css/"> -->
    <title>Agregar Marca!</title>
</head>

<body class="bg-yellow">
    <div class="container">
        <div class="row">
            <div class="col-md-8 bg-light mt-4 text-seccondary mx-auto">
                <h2 class="text-center p-2 ">Agregar Marca</h2>
                <form action="#" id="form_session" method="post">
                    <!-- php validacion -->
                    <?php
                    include_once './marcas.php';

                    if (isset($_POST['newMarca'])) {
                        $name_marca = $_POST['name_marca'];
                        $logo_marca = $_POST['logo_marca'];
                        
                        $m = new Marca();
                        $m ->new_marca($name_marca, $logo_marca);

                        // $reg4 = new admin();
                        // $reg4 ->Prod($tipoP,$nameM, $nameP, $precioP, $exisP);
                    }
            // fin validacion==================================
                    ?>
                    <!-- fin php validacion -->
                    <!-- agregar nueva marca con otra consulta -->
                    <!-- subir imagen servidor -->
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Nombre: </label>
                        <input name="name_marca" type="text" class="form-control" id="formGroupExampleInput2"
                            placeholder="ej:coca cola">
                        <!-- logo -->
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Logo: </label>
                        <input name="logo_marca" type="text" class="form-control" id="formGroupExampleInput2"
                            placeholder="Url de la imagen">
                    </div>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-primary"><a class='text-white'
                                href="../admin_registro.php">Regresar</a></button>

                        <input type="submit" name="newMarca" class="btn btn-success" value="Guardar">
                        
                    </div>

                </form>


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