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
            if ($_SESSION['admin'] == 'Nacho' || $_SESSION['admin'] == 'nacho') {
            // A EDITAR
              echo '<td><a href="./editar.php?id='.$fila["id_productos"] .'"><i class="fas fa-edit"></i></a></td>';
            // A BORRAR  
              echo '<td><a href="./borrar.php?id='.$fila["id_productos"] .'"><i class="fas fa-trash-alt"></i></a></td>';
            }
        }
        // ESTO NO FUNCIONA 
        echo '<td>    
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" name="customSwitch-'.$fila['id_productos'].'" id="customSwitch-'.$fila['id_productos'].'">
                     
                    <label class="custom-control-label" for="customSwitch-'.$fila['id_productos'].'">
                        <i class="fas fa-shopping-cart"></i>
                        '.$fila['id_productos'].'
                    </label>
                </div>
             </td>
             
             ';
        echo '</tr>';
        $i++;
        
        }
        
    }
}
// guardar numero en el input y mandarlo en el post