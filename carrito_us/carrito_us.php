<?php
include_once '../conexion.php';
class Carrito{
  
  function __construct()
  {
    
  }
  public function os()
  {
     $id = $_GET['id'];
    // $us = $_GET['us'];

    //SELECT u.id_us, u.username, c.id_carrito, c.fecha_pedido, d.id_detC, d.id_productos, d.det_prod, d.precio_uni FROM usuarios u INNER JOIN carritos c ON (u.id_us = c.id_us) join det_carritos d on (c.id_carrito = d.id_carrito)
    $db = new Conexion();
        $sql = "SELECT u.id_us, u.username, c.id_carrito, c.fecha_pedido, d.id_detC, d.id_productos, d.det_prod, d.precio_uni
            FROM usuarios u INNER JOIN carritos c ON (u.id_us = c.id_us) join det_carritos d on (c.id_carrito = d.id_carrito) where u.id_us = ?";
        $stmt = $db->prepare($sql);
        $stmt ->bind_param('s', $id);
        $stmt ->execute();
        $result = $stmt->get_result();
        $i=1;
        while ($fila = $result->fetch_array()) {
            echo '<tr>';   
            echo '<th scope="row">'.$i.'</th>';
            echo '<td>' .$fila['id_us']. '</td>';
            echo '<td>' .$fila['username']. '</td>';
            echo '<td>' .$fila['fecha_pedido']. '</td>';
            echo '<td>' .$fila['det_prod']. '</td>';
            echo '<td>' .$fila['precio_uni']. '</td>';
            echo '</tr>';
            $i++;
        }
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
    <link rel="stylesheet" href="../css/principal.css">
    <!-- iconos -->
    <script src="https://kit.fontawesome.com/85cbbbc4f0.js" crossorigin="anonymous"></script>
    <title>Mi carrito!</title>
</head>

<body class="bg-violet">
    <div class="container">
        <div class="row">
            <div class="col-12 bg-light mt-5 rounded">
                <table class="table table-hover text-green table-borderless ">
                    <form action="#" id="form1" method="post">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">id</th>
                                <th scope="col">username</th>
                                <th scope="col">fecha</th>
                                <th scope="col">desc</th>
                                <th scope="col">precio</th>
                                <!-- <th scope="col">anadir <i class="fas fa-cart-plus"></i></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <?php
                              $t = new Carrito();
                              echo $t->os();                          
                              ?>
                            </tr>
                        </tbody>
                    </form>
                </table>
            </div>
        </div>
        <div class="row">
          <div class="col-6 text-center mx-auto mt-3">
          <button type="button" class="btn btn-light"><a href="../index.php" class='text-success'>Volver</a></button>
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