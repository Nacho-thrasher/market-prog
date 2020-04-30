<?php
include_once './conexion.php';
class Tabla_comp{

    
    public function __construct()
    {   
        
    }
    
    public function tablaCard(){        
        // select usuarios
        $us = $_SESSION['admin'];
        $db = new Conexion();
        $sql2 = "Select * from usuarios where username = ?";
        $stmt = $db->prepare($sql2);
        $stmt ->bind_param('s', $us);
        $stmt ->execute();
        $result = $stmt->get_result();
        $i=0;
        while ($row = $result->fetch_assoc()) {
            $this->us = $row['id_us'];
            $i++;
        }
        // 2 parte
        $db = new Conexion();
        $sql = "SELECT id_productos, ruta_imagen, tipo, nombre_m ,nombre_prod, precio, existencia FROM tipos_productos t INNER JOIN productos p ON (t.id_tp = p.id_tipoP) join marca m on (p.id_marca = m.id_marca)";
        $res= $db->query($sql);
        $i=1;
        while ($fila = $res->fetch_array()) {

        echo        '<div class="col mb-4 ">';
        echo            '<div class="card border-0">';
        echo                '<img src="' .$fila['ruta_imagen']. '" class="card-img-top" alt="...">';
        echo                '<div class="card-body">';
        echo                    '<h5 class="card-title text-capitalize">'.$fila['nombre_m'].' / '.$fila['nombre_prod'].'</h5>';
        echo                    '<p class="card-text">
                                    Precio: ' .$fila['precio']. '$ 
                                </p>';
        echo                    '<p class="card-text">
                                    Unidades disponibles: ' .$fila['existencia']. '
                                </p>';
        echo                    '<div class="text-center">';
                        if (isset($_SESSION['admin'])) {
                            if ($_SESSION['admin'] == 'nacho' || $_SESSION['admin'] == 'Nacho' || $_SESSION['admin'] == 'NACHO') {    
        echo                        '<a href="./editar.php?id='.$fila["id_productos"] .'" class="card-link">Editar <i class="fas fa-edit"></i></a>';
        echo                        '<a href="./borrar.php?id='.$fila["id_productos"] .'" class="card-link"> Borrar <i class="fas fa-trash-alt"></i></a>';
                            }
                            else {
                                echo '<form action="#" id="form_session" method="post">';
                                include_once './carrito_us/miCarrito.php';
                                if (isset($_POST[''.$fila['nombre_m'].''])) {
                                    
                                    $id_us = $_POST['id_us'];
                                    $id_p = $_POST['id_p'];
                                    
                                    $comp = new myMarket();
                                    $comp ->carrito($id_p, $id_us);

                                }
                                echo '<input type="hidden" name="id_us" value="'.$this->us.'">';
                                echo '<input type="hidden" name="id_p" value="'.$fila["id_productos"].'">';
                                echo '<button type="submit" name="'.$fila['nombre_m'].'" class="btn btn-primary btn-sm">anadir</button>';
                                
                                echo '</form>';
                            }
                        }
        echo                    '</div>';
        echo                '</div>';
        echo            '</div>';
        echo        '</div>';
        $i++;        
        }
        
    }
    //fin clase
    // SELECT u.id_us, u.username, c.id_carrito, c.fecha_pedido, d.id_detC, d.id_productos, d.det_prod, d.precio_uni FROM usuarios u INNER JOIN carritos c ON (u.id_us = c.id_us) join det_carritos d on (c.id_carrito = d.id_carrito)
    // esta consulta funciona 
}