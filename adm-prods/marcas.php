<?php
include_once '../conexion.php';
class Marca
{
    private $id_marca;
    private $nombre_marca;
    private $logo_marca;
    
    public function __construct()
    {
    }
    public function marcas(){
        $db = new Conexion();
        $sql = "Select * from marca";
        $res= $db->query($sql);
        $i=0;
        while ($filas = $res->fetch_array()) {
            echo '<option value="'.$filas['id_marca'].'">'.$filas['nombre_m'].'</option>';
            //  <option value="soltero">soltero</option>
            $i++;
        }   
        
    }
    public function new_marca($name_marca, $logo_marca){
        $this->nombre_marca = $name_marca;
        $this->logo_marca = $logo_marca;

        $db = new Conexion();
        $sql = "INSERT INTO `marca`(`nombre_m`, `logo`) 
                VALUES (?,?)";
        $stmt = $db->prepare($sql);
        $stmt ->bind_param('ss', $this->nombre_marca, $this->logo_marca);
        $stmt ->execute();
        header('location: ../admin_registro.php');
    }
 
}
