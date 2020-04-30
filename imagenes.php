<?php
include_once './usuarios/conexion.php';
class Imagenes{

    function __construct()
    {
        
    }
    public function img($nameP){
        $this->nombre_prod = $nameP;
        
        $db = new Conexion();
        $sql = "Select * from productos where nombre_prod = ?";
        $stmt = $db->prepare($sql);
        $stmt ->bind_param('s', $this->nombre_prod);
        $stmt ->execute();
        $result = $stmt->get_result();
        $i=0;
        while ($row = $result->fetch_assoc()) {
            $this->name_p = $row['nombre_prod'];
            $this->id_p = $row['id_productos'];
            
            //GUARDAR EN SERVER
            //Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
            foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
            {
            //Validamos que el archivo exista
                if($_FILES["archivo"]["name"][$key]) {
                    $filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
                    $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
                    
                    $directorio = './img/'.$this->id_p.'/'.$this->name_p.'/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
                    // $archivo = $directorio.$_FILES["archivo"]["name"][$key];

                    //Validamos si la ruta de destino existe, en caso de no existir la creamos
                    
                    if (!file_exists($directorio)) {
                        mkdir($directorio, 0777, true) or die("No se puede crear el directorio de extracci&oacute;n");
                    }
                    
                    $dir=opendir($directorio); //Abrimos el directorio de destino
                    $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
                    
                    //Movemos y validamos que el archivo se haya cargado correctamente
                    //El primer campo es el origen y el segundo el destino
                    if(move_uploaded_file($source, $target_path)) {	
                        echo "El archivo $filename se ha almacenado en forma exitosa.<br> $directorio$filename";
                        $db = new Conexion();
                        $sql = "update `productos` set ruta_imagen = ? where id_productos = ?";
                        $stmt = $db->prepare($sql);
                        $stmt ->bind_param('ss', $directorio.$filename, $this->id_p);
                        $stmt ->execute();
                        header('location: index.php');
      
                    } else {	
                    echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
                    }
                    closedir($dir); //Cerramos el directorio de destino
                }
            }


            $i++;
        }   
    }
}

?>