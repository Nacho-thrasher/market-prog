<?php
include_once './usuarios/conexion.php';
class Tabla_ini{
    private $tipo = array(); 
    private $desc = array();
    private $precio = array();
    private $exis = array();
    public function __construct()
    {        
    }
    public function tabla(){
        $db = new Conexion();
        $sql = "SELECT tipo, nombre_m ,nombre_prod, precio, existencia FROM tipos_productos t INNER JOIN productos p ON (t.id_tp = p.id_tipoP) join marca m on (p.id_marca = m.id_marca)";
        $res= $db->query($sql);
        $i=1;
        while ($fila = $res->fetch_array()) {
        echo '<tr>';   
        echo '<th scope="row">'.$i.'</th>';
        echo '<td>' .$fila['tipo']. '</td>';
        echo '<td>' .$fila['nombre_m']. '</td>';
        echo '<td>' .$fila['nombre_prod']. '</td>';
        echo '<td>' .$fila['precio']. '</td>';
        echo '<td>' .$fila['existencia']. '</td>';
        echo '</tr>';
        $i++;        
        }
        
    }
    public function tablaCard(){
        $db = new Conexion();
        $sql = "SELECT tipo, nombre_m,ruta_imagen ,nombre_prod, precio, existencia FROM tipos_productos t INNER JOIN productos p ON (t.id_tp = p.id_tipoP) join marca m on (p.id_marca = m.id_marca)";
        $res= $db->query($sql);
        $i=1;
        while ($fila = $res->fetch_array()) {

        echo        '<div class="col mb-4 ">';
        echo            '<div class="card border-0 h-100">';
        echo                '<img src="' .$fila['ruta_imagen']. '" class="card-img-top" alt="...">';
        echo                '<div class="card-body">';
        echo                    '<h5 class="card-title text-capitalize">'.$fila['nombre_m'].' / '.$fila['nombre_prod'].'</h5>';
        echo                    '<p class="card-text">
                                    Precio: ' .$fila['precio']. '$ 
                                </p>';
        echo                    '<p class="card-text">
                                    Unidades disponibles: ' .$fila['existencia']. '
                                </p>';
        echo                '</div>';
        echo            '</div>';
        echo        '</div>';
        $i++;        
        }
        
    }
}