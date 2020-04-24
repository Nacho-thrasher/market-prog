<?php

class Conexion extends mysqli{

  private  $db_host = 'localhost';
  private  $db_user = 'root';
  private  $db_pass = 'secret';
  private  $db_name = 'my_market';

    function __construct()
    {   //indico q voy a la clase padre mysqli al metodo construct y me conecto
        parent:: __construct($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
    }
}