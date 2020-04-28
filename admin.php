<?php
include_once './usuarios/conexion.php';
session_start();
class admin{
    private $tipoProd;
    private $nameMarca;
    private $logoMarca;
    private $nameProducto;
    private $precioProducto;
    private $existProducto;

    private $id_tp;
    private $id_marca;
    function __construct()
    {
        
    }
    
    public function Marca($nameM, $logoM){
        $this->nameMarca = $nameM;
        $this->logoMarca = $logoM;

        $db = new Conexion();
        $sql = "INSERT INTO `marca`(`nombre_m`,`logo`) VALUES ('$this->nameMarca','$this->logoMarca')";
        $db->query($sql);
    }
    
    public function Prod($tipoP,$nameM, $nameP, $precioP, $exisP){
        $this->tipoProd = $tipoP;

        $this->nameMarca = $nameM;

        $this->nameProducto = $nameP;
        $this->precioProducto = $precioP;
        $this->existProducto = $exisP;

        $db = new Conexion();
        $sql = "Select * from marca where nombre_m = '$this->nameMarca'";
        $res= $db->query($sql);
        $i=0;
        while ($filas = $res->fetch_array()) {
            $this->id_marca[$i] = $filas['id_marca'];
            $i++;
           echo $filas['id_marca'];
           // primera
        $db1 = new Conexion();
        $sql1 = "INSERT INTO `productos`(`id_tipoP`,`id_marca`, `nombre_prod`,`precio`,`existencia`) VALUES ('$this->tipoProd'," .$filas['id_marca']. ",'$this->nameProducto','$this->precioProducto','$this->existProducto')";
        $db1->query($sql1);
        }  
       // esto no funciona porq no encuentra los id para el iner join
    }


}
