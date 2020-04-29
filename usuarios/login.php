<?php
include_once '../conexion.php';
class Login
{
    private $nombre_log;
    private $password_log;
    private $us;
    private $pass;

    public function __construct()
    {
    }
    public function comprobar_us($nombre, $password){
        $this->nombre_log = $nombre;
        $this->password_log = $password;

        $db = new Conexion();
        $sql = "Select count(*) from usuarios where username = ?";
        $stmt = $db->prepare($sql);
        $stmt ->bind_param('s', $this->nombre_log);
        $stmt ->execute();
        $result = $stmt->get_result();
        $i=0;
        while ($row = $result->fetch_assoc()) {
            $this->cont_us[$i] = $row['count(*)'];
            if ($this->cont_us[$i] > 0) {
                
            }
            else {
                echo "<div class='error bg-orange text-light p-3'>";
                echo "<li> Usuario no encontrado, Registrate perro. </li>";
            }
            $i++;
        }   
        /* cerrar la sentencia */
        $stmt->close();
    }

    public function comprobar_log($nombre, $password){
        $this->nombre_log = $nombre;
        $this->password_log = $password;

        $db = new Conexion();
        $sql = "Select * from usuarios where username = ?";
        $stmt = $db->prepare($sql);
        $stmt ->bind_param('s',$this->nombre_log);
        $stmt ->execute();
        $result = $stmt->get_result();

        $i=0;
        while ($row = $result->fetch_assoc()) {
                $this->us[$i] = $row['username'];
                $this->pass[$i] = $row['password'];

            if ($this->nombre_log == $this->us[$i]) {
                //true
                if (password_verify($this->password_log, $this->pass[$i])) {
                    session_start();
                    $_SESSION['admin'] = $this->us[$i];
                    // Correct password
                    echo "<div class='error bg-success text-light p-3 mb-2'>";
                    echo "<li> Bienvenido " .$this->us[$i] . "</li>";
                    echo "</div>";
                    echo "<a class='' href='./cerrar_us.php'>Cerrar sesion.</a></br>";
                    echo "<a href='../index.php'>Ir a Inicio.</a>";
                    die();
                 }
                 else {
                    echo "<div class='error bg-orange text-light p-3'>";
                    echo "<li> Usuario o Pass incorrecta. </li>";
                 }
                 
            }
            else {
                // echo ' -q paso'.$this->us[$i];
                // echo $this->nombre_log;
                ECHO 'NADA';
            }
            $i++;
        }
    
        /* cerrar la sentencia */
        $stmt->close();
    }    
}
