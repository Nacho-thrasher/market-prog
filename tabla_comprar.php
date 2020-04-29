<?php
include_once './conexion.php';
class Tabla_comp{
    
    
    public function __construct()
    {   
        
    }
    public function tabla(){
        $db = new Conexion();
        $sql = "SELECT id_productos, tipo, nombre_m ,nombre_prod, precio, existencia FROM tipos_productos t INNER JOIN productos p ON (t.id_tp = p.id_tipoP) join marca m on (p.id_marca = m.id_marca)";
        $res= $db->query($sql);
        $i=1; $a = 1;
        while ($fila = $res->fetch_array()) {
        echo '<tr>';   
        echo '<th scope="row">'.$i.'</th>';
        echo '<td>' .$fila['tipo']. '</td>';
        echo '<td>' .$fila['nombre_m']. '</td>';
        echo '<td>' .$fila['nombre_prod']. '</td>';
        echo '<td>' .$fila['precio']. '</td>';
        echo '<td>' .$fila['existencia']. '</td>';
        if (isset($_SESSION['admin'])) {
            if ($_SESSION['admin'] == 'nacho' || $_SESSION['admin'] == 'Nacho' || $_SESSION['admin'] == 'NACHO') {
            // A EDITAR
              echo '<td><a href="./editar.php?id='.$fila["id_productos"] .'"><i class="fas fa-edit"></i></a></td>';
            // A BORRAR  
              echo '<td><a href="./borrar.php?id='.$fila["id_productos"] .'"><i class="fas fa-trash-alt"></i></a></td>';
            }
        }
        // ESTO NO FUNCIONA 
        // plan agregar el registro al usuario y de ahi mermar el registro
        // checkbox q pase un id
        echo '<td>    
                <div class="form-check">
                    <input class="form-check-input" name="anadir" type="checkbox" value="'.$fila["id_productos"] .'" id="' .$fila['nombre_prod']. '">
                        <label class="form-check-label" for="'.$fila['nombre_prod'].'">
                        
                    </label>
                </div>
             </td>
             ';
        echo '</tr>';
        $i++;
        }
        
    }
    public function anadir_carrito(){
        $user = $_SESSION['admin']; 

        $db = new Conexion();
        $sql = "Select * from usuarios where username = ?";
        $stmt = $db->prepare($sql);
        $stmt ->bind_param('s', $user);
        $stmt ->execute();
        $result = $stmt->get_result();
        $i=0;
        while ($row = $result->fetch_assoc()) {
            $this->user[$i] = $row['username'];
            $this->id_us[$i] = $row['id_us'];
            echo '<button type="submit" name="ag_carrito" class="btn btn-dark btn-lg"><a class="text-light" href="./carrito_us/carrito_us.php?id='.$row["id_us"].'">Anadir productos a mi carrito</a></button>';
            // <a class="text-light" href="./carrito_us/carrito_us.php?id='.$row["id_us"].'">
            $i++;
        }   
    }
    //fin clase
    // SELECT u.id_us, u.username, c.id_carrito, c.fecha_pedido, d.id_detC, d.id_productos, d.det_prod, d.precio_uni FROM usuarios u INNER JOIN carritos c ON (u.id_us = c.id_us) join det_carritos d on (c.id_carrito = d.id_carrito)
    // esta consulta funciona 
}