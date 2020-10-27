<?php

class Conexion{

    public static function conectar(){
        $PDO = new PDO("mysql:host=localhost;dbname=dbfundacion;charset=utf8","root","");
        $PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $PDO;
    }
}

?>

