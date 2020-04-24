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
    public function tipoProd($tipoP){
        $this->tipoProd = $tipoP;

        $db = new Conexion();
        $sql = "INSERT INTO `tipos_productos`(`tipo`) VALUES ('$this->tipoProd')";
        $db->query($sql);
    }
    public function Marca($nameM, $logoM){
        $this->nameMarca = $nameM;
        $this->logoMarca = $logoM;

        $db = new Conexion();
        $sql = "INSERT INTO `marca`(`nombre_m`,`logo`) VALUES ('$this->nameMarca','$this->logoMarca')";
        $db->query($sql);
    }
    
    public function Prod($nameP, $precioP, $exisP){
        $this->nameProducto = $nameP;
        $this->precioProducto = $precioP;
        $this->existProducto = $exisP;
       
        // primera
        $db1 = new Conexion();
        $sql1 = "INSERT INTO `productos`(`nombre_prod`,`precio`,`existencia`) VALUES ('$this->nameProducto','$this->precioProducto','$this->existProducto')";
        $db1->query($sql1);
        
        // segunda
        $db2 = new Conexion();
        $sql2 = "SELECT id_productos, id_tp, m.id_marca FROM tipos_productos t INNER JOIN productos p ON (t.id_tp = p.id_tipoP) join marca m on (p.id_marca = m.id_marca) where nombre_prod = '$this->nameProducto'";
        $res= $db2->query($sql2);
        $i=0;
        while ($filas = $res->fetch_assoc()) {
            $this->id_tp[$i]=$filas['id_tp'];
            $this->id_marca[$i]=$filas['id_marca'];
            $i++;
        }   

        // tercera
        $db3 = new Conexion();
        $sql3 = "INSERT INTO `productos`(`id_tipoP`,`id_marca`) VALUES ('$this->id_tp[$i]','$this->id_marca[$i]')";
        $db3->query($sql3);
        
    }


}
