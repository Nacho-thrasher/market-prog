<?php
include_once './conexion.php';
class value{
    function __construct()
    {
        $id = $_GET['id'];
        $db = new Conexion();
        $sql = "Select * from productos where id_productos = $id";
        $res= $db->query($sql);
        $i=0;
        while ($filas = $res->fetch_assoc()) {
    //  <option value="soltero">soltero</option>
        $this->nombre_prod = $filas['nombre_prod'];
        $filas['id_tipoP'];
        $this->id_marca = $filas['id_marca'];
        $this->precio = $filas['precio'];
        $this->existencia = $filas['existencia'];        
        $i++;   
        }

        $sql2 = "Select * from marca where id_marca = $this->id_marca";
        $res2= $db->query($sql2);
        $i=0;
        while ($filas = $res2->fetch_assoc()) {
            $this->nombre_marca = $filas['nombre_m'];
            $this->logo_marca = $filas['logo'];
            $i++;   
        }
                
    }
    public function nombre_prod(){ echo $this->nombre_prod; }
    public function precio_prod(){ echo $this->precio; }
    public function existencia_prod(){ echo $this->existencia; }  
    public function id_marca_nom(){ echo $this->nombre_marca; }
    public function id_marca_logo(){ echo $this->logo_marca; }
    public function tipo(){
        $db = new Conexion();
        $sql3 = "Select * from tipos_productos";
        $res3= $db->query($sql3);
        $i=0;
        while ($filas = $res3->fetch_array()) {
            echo '<option value="'.$filas['id_tp'].'">'.$filas['tipo'].'</option>';
            //  <option value="soltero">soltero</option>
            $i++;
        }
    }
    public function Marca($nameM, $logoM){
        $this->nameMarca = $nameM;
        $this->logoMarca = $logoM;

        $db = new Conexion();
        $sql = "update `marca` set nombre_m = '$this->nameMarca', logo = '$this->logoMarca' where id_marca = '$this->id_marca' ";
        $db->query($sql);
    }
    
    public function Prod($tipoP, $nameP, $precioP, $exisP, $id_p){
        $this->tipoProd = $tipoP;
        $this->id_p = $id_p;
        $this->nameProducto = $nameP;
        $this->precioProducto = $precioP;
        $this->existProducto = $exisP;

        $db = new Conexion();
        $sql = "update productos set id_tipoP = '$this->tipoProd' ,nombre_prod = '$this->nameProducto', precio = '$this->precioProducto', existencia = '$this->existProducto' where id_productos = '$this->id_p'";
        $db->query($sql);        
       // esto no funciona porq no encuentra los id para el iner join
    }
}                    
?>
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
                <h1>Editar Productos</h1>
            <form action="#" id="form_session" method="post">
        <!-- php validacion -->
        <?php
            

                    if (isset($_POST['submit'])) {
                        $tipoP = $_POST['tipo_producto'];
                        $nameM = $_POST['nameM'];
                        $logoM = $_POST['logoM'];
                        $nameP = $_POST['nameP'];
                        $precioP = $_POST['precioP'];
                        $exisP = $_POST['exisP'];

                        $reg2 = new value();
                        $reg2 ->Marca($nameM, $logoM);

                        $id_p = $_GET['id'];

                        $reg4 = new value();
                        $reg4 ->Prod($tipoP, $nameP, $precioP, $exisP, $id_p);
                    }
            // fin validacion==================================

            ?>
        <!-- fin php validacion -->
        <!-- tipo prod -->
                        <label for="inlineFormCustomSelect">tipo de producto</label>
                        <select class="form-control" id="inlineFormCustomSelect" name="tipo_producto">
                            <!-- cargar funcion tipo de productos -->
                            <?php
                                $ne = new value();
                                echo $ne ->tipo();
                                    ?>
                            <!--  -->
                        </select>
            <!--  -->
        <div class="form-group">
            <!-- idea agregar options con marcas adecuadas al tipo de producto -->
            <label for="formGroupExampleInput2">Nombre de Marca</label>
            <input name="nameM" type="text" class="form-control" id="formGroupExampleInput2" 
            value="<?php
                                $ne = new value();
                                echo $ne ->id_marca_nom()
                                    ?>" >
        </div>
        <div class="form-group">
            <!-- subir imagen al servidor prox -->
            <label for="formGroupExampleInput2">Logo de Marca</label>
            <input name="logoM" type="text" class="form-control" id="formGroupExampleInput2" 
            value="<?php
                                $ne = new value();
                                echo $ne ->id_marca_logo()
                                    ?>">
        </div>
            <!--  -->
        <div class="form-group">
            <label for="formGroupExampleInput2">Descripcion: </label>
            <input name="nameP" type="text" class="form-control" id="formGroupExampleInput2" 
                        value="<?php
                                $ne = new value();
                                echo $ne ->nombre_prod()
                                    ?>" >
            <!-- nombre prod -->
          </div>          
        <div class="form-group">
            <label for="formGroupExampleInput2">Precio: </label>
            <input name="precioP" type="text" class="form-control" id="formGroupExampleInput2" 
            value="<?php
                                $ne = new value();
                                echo $ne ->precio_prod()
                                    ?>" >
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Unidades: </label>
            <input name="exisP" type="text" class="form-control" id="formGroupExampleInput2"
            value="<?php
                                $ne = new value();
                                echo $ne ->existencia_prod()
                                    ?>" >
        </div>
        <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary" value="Guardar Cambios">
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
<?php

?>