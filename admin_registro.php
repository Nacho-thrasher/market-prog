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
    <link rel="stylesheet" href="./css/principal.css">
    <!-- iconos -->
    <script src="https://kit.fontawesome.com/85cbbbc4f0.js" crossorigin="anonymous"></script>
    <!-- jqueri -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <!-- <link rel="stylesheet" href="./css/"> -->
    <title>Agregar Producto!</title>
</head>

<body class="bg-yellow">
    <div class="container">
        <div class="row">
            <div class="col-md-8 bg-light mt-4 text-seccondary mx-auto">
                <h2 class="text-center p-2 ">Agregar productos</h2>
                <form action="#" id="form_session" method="post">
                    <!-- php validacion -->
                    <?php
            include_once './admin.php';

                    if (isset($_POST['submit'])) {
                        $tipoP = $_POST['tipo_producto'];
                        $nameM = $_POST['nameM'];

                        $nameP = $_POST['nameP'];
                        $precioP = $_POST['precioP'];
                        $exisP = $_POST['exisP'];

                        $reg4 = new admin();
                        $reg4 ->Prod($tipoP,$nameM, $nameP, $precioP, $exisP);
                    }
            // fin validacion==================================

            ?>
                    <!-- fin php validacion -->
                    <!-- tipo prod -->
                    <div class="row">
                        <div class="col-6">
                            <label for="inlineFormCustomSelect">tipo de producto</label>
                            <select class="form-control mb-1" id="inlineFormCustomSelect" name="tipo_producto">
                                <option selected>Elije</option>
                                <!-- cargar funcion tipo de productos -->
                                <?php
                            include_once './adm-prods/tipo_prod.php';
                            $tp = new Agregar();
                            $tp ->tipos_prods();
                            ?>
                            </select>
                        </div>
                        <div class="col-6 text-center mt-2 pt-4">
                                    <button type="button" class="btn btn-white"><a class='text-dark'
                                    href="./adm-prods/nuevo_tipo.php">Agregar un nuevo tipo <i class="fas fa-plus-circle"></i></a></button>
                        </div>
                    </div>
                    <!-- marcas -->
                    <div class="row">
                        <div class="col-6">
                            <label for="marca">Marca:</label>
                            <select class="form-control mb-1" id="marca" name="nameM">
                                <option selected>Elije</option>
                                <!-- cargar funcion tipo de productos -->
                                <?php
                            include_once './adm-prods/marcas.php';
                            $m = new Marca();
                            $m ->marcas();
                            ?>
                            </select>
                        </div>
                        <div class="col-6 text-center mt-2 pt-4">
                            <button type="button" class="btn btn-white"><a class='text-dark'
                                    href="./adm-prods/nueva_marca.php">Agregar nueva marca <i class="fas fa-plus-circle"></i></a></button>
                        </div>
                    </div>
                    <!-- agregar nueva marca con otra consulta -->
                    <!-- subir imagen servidor -->
                    <!-- descripcion -->
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Descripcion: </label>
                        <input name="nameP" type="text" class="form-control" id="formGroupExampleInput2"
                            placeholder="Descripcion del producto">
                        <!-- nombre prod -->
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Precio: </label>
                        <input name="precioP" type="text" class="form-control" id="formGroupExampleInput2"
                            placeholder="ej: 500">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Unidades: </label>
                        <input name="exisP" type="text" class="form-control" id="formGroupExampleInput2"
                            placeholder="ej: 2">
                    </div>
                    <div class="form-group text-center">
                    <button type="button" class="btn btn-primary mr-3"><a class='text-white'
                                href="index.php">Regresar</a></button>    
                    <input type="submit" name="submit" class="btn btn-success" value="Guardar Producto">
                        
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