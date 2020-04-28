<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4 mx-auto">
                <h1>Agregar productos</h1>
            <form action="#" id="form_session" method="post">
        <!-- php validacion -->
        <?php
            include_once './admin.php';

                    if (isset($_POST['submit'])) {
                        $tipoP = $_POST['tipo_producto'];
                        $nameM = $_POST['nameM'];
                        $logoM = $_POST['logoM'];
                        $nameP = $_POST['nameP'];
                        $precioP = $_POST['precioP'];
                        $exisP = $_POST['exisP'];

                        $reg2 = new admin();
                        $reg2 ->Marca($nameM, $logoM);

                        $reg4 = new admin();
                        $reg4 ->Prod($tipoP,$nameM, $nameP, $precioP, $exisP);
                    }
            // fin validacion==================================

            ?>
        <!-- fin php validacion -->
        <!-- tipo prod -->
                        <label for="inlineFormCustomSelect">tipo de producto</label>
                        <select class="form-control" id="inlineFormCustomSelect" name="tipo_producto">
                            <option selected>Elije</option>
                            <!-- cargar funcion tipo de productos -->
                            <?php
                            include_once './adm-prods/tipo_prod.php';
                            $tp = new Agregar();
                            $tp ->tipos_prods();
                            ?>
                        </select>
            <!--  -->
        <div class="form-group">
            <!-- idea agregar options con marcas adecuadas al tipo de producto -->
            <label for="formGroupExampleInput2">Nombre de Marca</label>
            <input name="nameM" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
        </div>
        <div class="form-group">
            <!-- subir imagen al servidor prox -->
            <label for="formGroupExampleInput2">Logo de Marca</label>
            <input name="logoM" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
        </div>
            <!--  -->
        <div class="form-group">
            <label for="formGroupExampleInput2">Descripcion: </label>
            <input name="nameP" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
            <!-- nombre prod -->
          </div>          
        <div class="form-group">
            <label for="formGroupExampleInput2">Precio: </label>
            <input name="precioP" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Unidades: </label>
            <input name="exisP" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
        </div>
        <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary" value="Guardar Producto">
        <button type="button" class="btn btn-primary"><a class='text-white' href="index.php">Regresar</a></button>
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