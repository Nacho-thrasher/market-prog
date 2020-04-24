<?php
include_once './conexion.php';
class Registro{
    private $nombre_reg;
    private $password_reg;
    private $email_reg;
    private $telefono_reg;
    private $direccion_reg;
    private $id_regs;
    private $cont_us;

    public function __construct(){
    }

    public function comprovar($nom){
        $this->nombre_reg=$nom;
//COMPROBAR SI NO EXISTE UN USUARIO CON EL MISMO NOMBRE
        $db = new Conexion();
        $sql = "SELECT count(*) FROM usuarios where username = '$this->nombre_reg'";
        $res = $db->query($sql);
        $i=0;
        while ($r = $res->fetch_assoc()){
            $this->cont_us[$i]=$r['count(*)'];
            if($this->cont_us[$i] > 0 ) {
               
                echo "<div class='error'>
                Ya existe este usuario.";
               die();

            }
            else{
                echo "<div class='correcto'>
                    Registro Completo.";
            }
            $i++;
        }
    }
    
    public function insert_reg($nom, $pass, $email, $tel, $direc, $id_r=''){

        $this->nombre_reg=$nom;
        $this->password_reg=$pass;
        $this->email_reg=$email;
        $this->telefono_reg=$tel;
        $this->direccion_reg=$direc;
        $this->id=$id_r;

        $db = new Conexion();

        $sql = "INSERT INTO `usuarios`(`username`, `password`, `direccion`, `telefono`, `email`) 
                VALUES ('$this->nombre_reg','$this->password_reg','$this->direccion_reg','$this->telefono_reg','$this->email_reg')";

        $db->query($sql);

    }
}