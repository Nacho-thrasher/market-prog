<?php
include_once './conexion.php';
class value{
    function __construct(){
        // CONSULTA CON EL ID GET
        $id = $_GET['id'];
        $db = new Conexion();
        $sql = "Select * from productos where id_productos = $id";
        $res= $db->query($sql);
        $i=0;
        while ($filas = $res->fetch_assoc()) {
            $this->nombre_prod = $filas['nombre_prod'];
            $filas['id_tipoP'];
            $this->id_tp = $filas['id_tipoP'];
            $this->id_marca = $filas['id_marca'];
            $this->precio = $filas['precio'];
            $this->existencia = $filas['existencia'];        
            $i++;   
        }
        // CONSULTA PARA MARCA
        $sql2 = "Select * from marca where id_marca = $this->id_marca";
        $res2= $db->query($sql2);
        $i=0;
        while ($filas = $res2->fetch_assoc()) {
            $this->nombre_marca = $filas['nombre_m'];
            $this->logo_marca = $filas['logo'];
            $i++;   
        }
        // CONSULTA PARA tipo de productos
        $sql3 = "Select * from tipos_productos where id_tp = $this->id_tp";
        $res3= $db->query($sql3);
        $i=0;
        while ($filas = $res3->fetch_assoc()) {
            $this->tip = $filas['tipo'];
            $i++;   
        }
        // FIN CONSULTAS        
    }
    public function marca_seleccionada(){echo $this->nombre_marca; }
    public function tipo_seleccionado(){echo $this->tip; }

    public function nombre_prod(){ echo $this->nombre_prod; }
    public function precio_prod(){ echo $this->precio; }
    public function existencia_prod(){ echo $this->existencia; }  

    public function Prod($tipoP, $nameM,$nameP, $precioP, $exisP, $id_p){
        $this->tipoProd = $tipoP;
        $this->nameM = $nameM;

        $this->nameProducto = $nameP;
        $this->precioProducto = $precioP;
        $this->existProducto = $exisP;

        $this->id_p = $id_p;

        // UPDATE PROD
        $db = new Conexion();
        $sql = "update productos set id_tipoP = '$this->tipoProd' ,id_marca = '$this->nameM' ,nombre_prod = '$this->nameProducto', precio = '$this->precioProducto', existencia = '$this->existProducto' where id_productos = '$this->id_p'";
        $db->query($sql);  
        header('location: index.php');      
    }
}                    
?>
<!-- VISTA FORM EDITAR -->
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
    <title>Editar!</title>
</head>

<body class='bg-blue'>
    <div class="container">
        <div class="row">
            <div class="bg-light col-md-8 mt-4 mx-auto text-capitalize">
                <h2 class='p-2 text-secondary text-center'>Editar Productos</h2>
                <div class="text-muted text-center">
                - Esto solo editara los productos - 
                </div>
                <form action="#" id="form_session" method="post" class=''>
                    <!-- php validacion -->
                    <?php
                    if (isset($_POST['submit'])) {
                        $tipoP = $_POST['tipo_producto'];
                        $nameM = $_POST['nameM'];

                        $nameP = $_POST['nameP'];
                        $precioP = $_POST['precioP'];
                        $exisP = $_POST['exisP'];

                        $id_p = $_GET['id'];

                        $reg4 = new value();
                        $reg4 ->Prod($tipoP, $nameM,$nameP, $precioP, $exisP, $id_p);
                    }
            // fin validacion==================================
                ?>
                    <!-- fin php validacion -->
                    <!-- tipo prod -->
                    <div class=" pt-2">
                        <label for="inlineFormCustomSelect">tipo de producto:</label>
                    </div>
                    <select class="form-control mx-auto w-50" id="inlineFormCustomSelect" name="tipo_producto" aria-describedby="tipo">
                        <!-- cargar funcion tipo de productos -->
                        <?php
                            include_once './adm-prods/tipo_prod.php';
                                $ne = new Agregar();
                                echo '<option selected >Elegir..</option>';
                                echo $ne ->tipos_prods();
                                    ?>
                        <!--  -->
                    </select>
                    <small id="tipo" class="text-center form-text text-muted">
                        El tipo seleccionado anterior fue
                        <?php
                        $m = new value();
                        echo $m ->tipo_seleccionado();
                        ?>
                    </small>
                    <!--  -->
                    <label for="inlineFormCustomSelect">Marcas:</label>
                    <select class="form-control mx-auto w-50" id="inlineFormCustomSelect" name="nameM" aria-describedby="marca">
                    <!-- SI FUNCIONA DEBO SACAR EL UPDATE DE MARCAS -->
                    <!-- cargar funcion tipo de productos -->
                        <?php
                            include_once './adm-prods/marcas.php';
                                $ne = new Marca();
                                echo '<option selected >Elegir..</option>';
                                echo $ne ->marcas();
                                    ?>
                        <!--  -->
                    </select>
                    <small id="marca" class="text-center form-text text-muted">
                        La marca seleccionada anterior fue
                        <?php
                        $m = new value();
                        echo $m ->marca_seleccionada();
                        ?>
                    </small>
                    <!--  -->
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Descripcion: </label>
                        <input name="nameP" type="text" class="form-control mx-auto  w-50" id="formGroupExampleInput2" value="<?php
                                $ne = new value();
                                echo $ne ->nombre_prod()
                                    ?>">
                        <!-- nombre prod -->
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Precio: </label>
                        <input name="precioP" type="text" class="form-control mx-auto  w-50" id="formGroupExampleInput2" value="<?php
                                $ne = new value();
                                echo $ne ->precio_prod()
                                    ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Unidades: </label>
                        <input name="exisP" type="text" class="form-control mx-auto  w-50" id="formGroupExampleInput2" value="<?php
                                $ne = new value();
                                echo $ne ->existencia_prod()
                                    ?>">
                    </div>
                    <div class="form-group text-center">
                    <button type="button" class="btn btn-primary"><a class='text-white'
                                href="index.php">Regresar</a></button>    
                    <input type="submit" name="submit" class="btn btn-success" value="Guardar Cambios">
                        
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
<?php

?>