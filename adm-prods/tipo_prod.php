<?php
include_once '../conexion.php';
class Agregar
{
    private $id_tp;
    private $tipo;
    
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
            //  <option value="soltero">soltero</option>
            $i++;
        }   
        
    }
 
}
