<?php
session_start();
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
    <title>Market!</title>
</head>

<body>
    <nav class="mt-1 navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Suministro</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categorias </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Marcas</a>
                </li>
            </ul>
            <span class="navbar-text">
                <!-- iniciar sesion -->
                <?php
                if (isset($_SESSION['admin'])) {
                include_once './carrito_us/miCarrito.php';
                $q = new myMarket();
                echo $q -> us();
                }
                else {
                    echo '<a class="text-capitalize" href="./usuarios/form_log.php">Iniciar Sesion</a>';
                }
                ?>
                |
                <!-- cerrar sesion -->
                <?php
                  if (isset($_SESSION['admin'])) {
                    echo '<a href="./usuarios/cerrar_us.php">Cerrar Sesion</a>';    
                  }
                  else{
                    echo '';
                  }
                ?>
            </span>
        </div>
    </nav>

    <!-- contenido========================================================================== -->
    <div class="container">
        <div class="row">
            <div class="col-12 bg-light text-center rounded p-2 mt-4 text-capitalize">
                <h2>
                    <?php 
                      if (isset($_SESSION['admin'])) {
                          if ($_SESSION['admin'] == 'Nacho' || $_SESSION['admin'] == 'nacho' || $_SESSION['admin'] == 'NACHO') {
                            echo '<a href="./admin_registro.php">Agregar productos <i class="fas fa-plus"></i></a>';
                          }
                          else{
                            echo    '<div class="text-success">
                                        Lista de productos
                                        <div class="font-size font-italic text-muted">
                                        '.$_SESSION['admin'].' te podemos ofrecer
                                        </div>
                                    </div>';
                            }
                      }
                      else{
                          echo '<div class="text-success">
                                    Lista de productos
                                    <div class="font-size font-italic text-muted">
                                        Para comprar debes iniciar sesion o registrarte
                                    </div>
                                </div>';
                      }   
                    ?>
                </h2>
            </div>
            <div class="col-12 mt-3">
                <div class="row row-cols-1 row-cols-md-3">
                    <!--  -->
                    <?php
                    if (isset($_SESSION['admin'])) {
                        include_once './tabla_comprar.php';
                        $table = new Tabla_comp();
                        echo $table->tablaCard();    
                    }
                    else{                
                        include_once './tabla_inicial.php';
                        $table = new Tabla_ini();
                        echo $table->tablaCard();
                    }
                    ?>
                    <!--  -->
                    
                </div>
            </div>
        </div>
    </div>
    <!-- =============================== -->





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