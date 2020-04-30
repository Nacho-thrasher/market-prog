<?php
include_once '../conexion.php';
class Registro{
    private $id_regs;
    private $nombre_reg;
    private $password_reg;
    private $email_reg;
    private $telefono_reg;
    private $direccion_reg;
    private $cont_us;
    public function __construct(){
        
    }
    public function comprobar_reg($nombre){
        $this->nombre_reg=$nombre;

        $db = new Conexion();
        $sql = "Select count(*) from usuarios where username = ?";
        $stmt = $db->prepare($sql);
        $stmt ->bind_param('s', $this->nombre_reg);
        $stmt ->execute();
        $result = $stmt->get_result();
        $i=0;
        while ($row = $result->fetch_assoc()) {
            $this->cont_us[$i] = $row['count(*)'];
            if ($this->cont_us[$i] > 0) {
                echo "<div class='error bg-orange text-light p-3 mb-3'>";
                echo "<li> este usuario ya existe gato </li>";
                echo "</div>";
                echo "<a class=''href='./form_reg.php'>Volver a intentar.</a></br></br>";
                echo "<a href='../index.php'>Ir a Inicio.</a>";
                die();
            }
            else {
                echo "<div class='error bg-success text-light p-3 mb-2'>";
                echo "<li> Registrado Corretamente perrovich. </li>";
                echo "</div>";
                echo "<a class=''href='./form_log.php'>Iniciar sesion.</a></br></br>";
                echo "<a href='../index.php'>Ir a Inicio.</a>";
                
            }
            $i++;
        }   
        /* cerrar la sentencia */
        $stmt->close();
    }
    
    public function insert_reg($nombre, $password, $email, $telefono, $direccion){
        $this->nombre_reg=$nombre;
        $this->password_reg=$password;
        $this->email_reg=$email;
        $this->telefono_reg=$telefono;
        $this->direccion_reg=$direccion;
        // $this->id=$id_r;
        
        $hashedPassword = password_hash($this->password_reg, PASSWORD_DEFAULT);

        $db = new Conexion();
        $sql = "INSERT INTO `usuarios`(`username`, `password`, `direccion`, `telefono`, `email`) 
                VALUES (?,?,?,?,?)";
        $stmt = $db->prepare($sql);
        $stmt ->bind_param('sssss', $this->nombre_reg, $hashedPassword, $this->direccion_reg, $this->telefono_reg, $this->email_reg);
        $stmt ->execute();
        // if ($stmt) {
        //     echo 'bien';
        // }
        // else{
        //     echo 'mal';
        // }

    }
}