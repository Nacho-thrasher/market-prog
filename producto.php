<?php
include_once './usuarios/conexion.php';
class Productos{

    function __construct()
    {
        parent::__construct;    
    }
    public function get($id){
        $db = new Conexion();
        $sql = "SELECT tipo, nombre_m ,nombre_prod, precio, existencia FROM tipos_productos t INNER JOIN productos p ON (t.id_tp = p.id_tipoP) join marca m on (p.id_marca = m.id_marca)";
        $res= $db->query($sql);
    }
    public function getProdCat($categ){

    }
}

?>