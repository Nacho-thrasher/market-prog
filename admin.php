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
    
    public function Prod($tipoP,$nameM, $nameP, $precioP, $exisP){
        $this->tipoProd = $tipoP;
        $this->nameMarca = $nameM;

        $this->nameProducto = $nameP;
        $this->precioProducto = $precioP;
        $this->existProducto = $exisP;

        $db1 = new Conexion();
        $sql1 = "INSERT INTO `productos`(`id_tipoP`,`id_marca`, `nombre_prod`,`precio`,`existencia`) VALUES ('$this->tipoProd','$this->nameMarca','$this->nameProducto','$this->precioProducto','$this->existProducto')";
        $db1->query($sql1);
        
        // header('location: index.php');
      
      
    }


}
