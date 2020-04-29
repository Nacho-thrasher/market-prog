<?php
include_once '../conexion.php';
class Agregar
{
    private $id_tp;
    private $tipo_producto; 
    private $sub_tipo;
    
    public function __construct()
    {
    }
    public function tipos_prods(){
        $db = new Conexion();
        $sql = "Select * from tipos_productos";
        $res= $db->query($sql);
        $i=0;
        while ($filas = $res->fetch_array()) {
            echo '<option value="'.$filas['id_tp'].'">'.$filas['tipo'].'</option>';
            $i++;
        }   
    }
    public function new_tipo($tipo_producto, $sub_tipo){
        $this->tipo_producto = $tipo_producto;
        $this->sub_tipo = $sub_tipo;

        $db = new Conexion();
        $sql = "INSERT INTO `tipos_productos`(`tipo`) 
                VALUES (?)";
        $stmt = $db->prepare($sql);
        $stmt ->bind_param('s', $this->tipo_producto);
        $stmt ->execute();
        header('location: ../admin_registro.php');
    }
 
}
