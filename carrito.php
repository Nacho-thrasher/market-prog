<?php

class Carrito{
    private $cant;
    private $id_p;
    private $nom_p;
    private $precio_p;
    public function __construct()
    {
        
        // traer la id del usuario seleccionadp
    }
    public function carrito($prod,$id,$nom,$precio){
        $this->cant = $prod;
        $this->id_p = $id;
        $this->nom_p = $nom;
        $this->precio_p = $precio;
        $db = new Conexion();
        $sql = "INSERT INTO `carritos`
        ( `id_us`, `id_producto`, `producto`, `cantidad`, `precio`, `subtotal`) 
        VALUES ('1','$this->id_p','$this->nom_p','$this->cant','$this->precio_p','$this->precio_p * $this->cant'";
        $db->query($sql);
    }


}
?>