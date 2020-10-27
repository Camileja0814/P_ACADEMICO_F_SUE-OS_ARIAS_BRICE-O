<?php
//Requerimos al modelo de este controlador
require_once "./models/UsuarioModel.php";
//Creamos el controlador
class UsuarioController{
//Creamos la variable que utilizamos en el modelo 
    private $mode;
    //Para instanciar al modelo 
    public function __CONSTRUCT(){
        $this->mode = new UsuarioModel();
    }
    //Metdo para ir a la venta principal de profesores
    public function Index(){
        include_once './views/Usuario/Usuario.php';
    }

    //Para activar usuario
    public function activar_Usuario(){
        $this->mode->activar_Usuario_m($_REQUEST['id_Usuario']);
        echo  "<script> alert ('Se ha activado el usuario');
        location.href = '?c=Usuario&a=Index';
        </script>";
        
    }
    //Para inactivar usuario
    public function inactivar_Usuario(){
        $this->mode->inactivar_Usuario_m($_REQUEST['id_Usuario']);
        echo  "<script> alert ('Se ha inactivado el usuario');
        location.href = '?c=Usuario&a=Index';
        </script>";
        
    }

}
