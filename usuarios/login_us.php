<?php
include_once './conexion.php';
class Login
{
    private $nombre_reg;
    private $password_reg;
    private $cont_us;
    private $tipo;

    public function __construct()
    {
    }

    public function login_us($nom, $pass)
    {
        $this->nombre_reg = $nom;
        $this->password_reg = $pass;

        $db = new Conexion();
        $sql = "SELECT count(*) FROM usuarios where username = '$this->nombre_reg' and password = '$this->password_reg'";
        $res = $db->query($sql);
        $i = 0;
        while ($r = $res->fetch_assoc()) {
            $this->cont_us[$i] = $r['count(*)'];
            if ($this->cont_us[$i] > 0) {

                echo "<div class='correcto'>
                Bienvenido ";
                // die();
            } else {
                echo "<div class='error'>
                    Debe registrarse.";
            }
            $i++;
        }
    }
    public function log_tipo($nom, $pass)
    {
        $this->nombre_reg = $nom;
        $this->password_reg = $pass;
        session_start();
        $_SESSION['admin'] = $this->nombre_reg;
        $db = new Conexion();
        $sql = "SELECT * FROM usuarios where username = '$this->nombre_reg' and password = '$this->password_reg'";
        $res = $db->query($sql);
        $i = 0;
        while ($r = $res->fetch_assoc()) {
            $this->tipo[$i] = $r['tipo_us'];
            if ($this->tipo[$i] == 'admin') {
                echo "Administrador ".$_SESSION['admin']
                ."</div>
                <br><p class='center-content'><a href='cerrar_us.php'>Cerrar Sesion</a></p>
                <p class='center-content'><a href='../index.php'>Ir a la Pagina principal</a></p>";
                die();
            } else {
                echo "Cliente ".$_SESSION['admin'].
                "</div><br><p class='center-content'><a href='cerrar_us.php'>Cerrar Sesion</p></a>
                <p class='center-content'><a href='../index.php'>Ir a la Pagina principal</a></p>";
                die();
            }
        }
    }
}
