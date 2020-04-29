<?php
include_once './conexion.php';
	class borrar{

    function __construct()
    {
    }   
    public function borrando(){
        $id = $_GET['id'];
        echo $id;
        $db = new Conexion();
        $sql = "delete from productos where id_productos = $id";
        $db->query($sql);
        
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
    <!-- css principal -->
    <link rel="stylesheet" href="./css/principal.css">
    <!-- iconos -->
    <script src="https://kit.fontawesome.com/85cbbbc4f0.js" crossorigin="anonymous"></script>
    <!-- jqueri -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <!-- <link rel="stylesheet" href="./css/"> -->
    <title>Borrar Producto!</title>
  </head>
  <body class='bg-red'>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5 p-5 bg-light">
            <h1 class="text-center">Eliminar!</h1>

            <p class="">Esto solo eliminara el producto, desea continuar?</p>
            
            <form action="#" method="post">
                <button type="button" class="btn  btn-success"><a class='text-white' href="index.php">Regresar</a></button>
                <button type="submit" name="submit" class="btn btn-danger">Aceptar</button>

            <?php
                    if (isset($_POST['submit'])) {
                        
                        $reg = new borrar();
                        $reg ->borrando();
                        header('location: index.php');
                    }
            ?>
            </form>
        </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>