<?php
include_once './conexion.php';
class myMarket{

    function __construct()
    {
        
    }
    function us(){
        $us = $_SESSION['admin'];
        $db = new Conexion();
        $sql2 = "Select * from usuarios where username = ?";
        $stmt = $db->prepare($sql2);
        $stmt ->bind_param('s', $us);
        $stmt ->execute();
        $result = $stmt->get_result();
        $i=0;
        while ($row = $result->fetch_assoc()) {
            $this->us = $row['id_us'];

                echo '<a class="text-capitalize" href="./carrito_us/carrito_us.php?id='.$this->us.'">'.$_SESSION['admin'].'</a>';    
            $i++;
        }
        
    }
    function carrito($id_p, $id_us){
        // parametros
        $this->id_p = $id_p;
        $this->id_us = $id_us;
        // select prods
        $db = new Conexion();
        $sql = "select * from productos where id_productos = ?";
        $stmt = $db->prepare($sql);
        $stmt ->bind_param('s', $this->id_p);
        $stmt ->execute();
        $result = $stmt->get_result();
        $i=1;
        while ($fila = $result->fetch_assoc()) {
            $this->nom_prod = $fila['nombre_prod'];
            $this->destinatario = $fila['direccion'];
            $this->precio_u = $fila['precio'];
            $i++;
        }
        // insert carrito
        $db = new Conexion();
        $sql1 = "INSERT INTO `carritos`(`id_us`, `fecha_pedido`, `destinatario`) 
                VALUES (?,now(),?)";
        $stmt = $db->prepare($sql1);
        $stmt ->bind_param('ss', $this->id_us, $this->destinatario);
        $stmt ->execute();
        // consulta id carrito
        $db = new Conexion();
        $sql2 = "SELECT * FROM carritos where id_us = ? ORDER by fecha_pedido DESC LIMIT 1";
        $stmt = $db->prepare($sql2);
        $stmt ->bind_param('s', $this->id_us);
        $stmt ->execute();
        $result = $stmt->get_result();
        $i=1;
        while ($fila = $result->fetch_assoc()) {
            $this->id_carrito = $fila['id_carrito'];

            $i++;
        }
        // insert det carrito
        $db = new Conexion();
        $sql3 = "INSERT INTO `det_carritos`(`id_carrito`, `id_productos`, `det_prod`, `precio_uni`) 
                VALUES (?,?,?,?)";
        $stmt = $db->prepare($sql3);
        $stmt ->bind_param('ssss', $this->id_carrito, $this->id_p, $this->nom_prod, $this->precio_u);
        $stmt ->execute();
        

    }
}
?>
