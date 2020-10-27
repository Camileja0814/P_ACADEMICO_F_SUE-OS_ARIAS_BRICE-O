<?php
//Requerimos al modelo de este controlador
require_once "./models/TipoUsuarioModel.php";
//Creamos el controlador
class TipoUsuarioController{
//Creamos la variable que utilizamos en el modelo 
    private $mode;
    //Para instanciar al modelo 
    public function __CONSTRUCT(){
        $this->mode = new TipoUsuarioModel();
    }
    //Metdo para ir a la venta principal de profesores
    public function Index(){
        include_once './views/TipoUsuario/TipoUsuarioCon.php';
    }
    public function nuevo(){
        $alm = new TipoUsuarioModel();
        
        if(isset($_REQUEST['id_tipoUsuario'])){
            $alm = $this->mode->Obtener($_REQUEST['id_tipoUsuario']);
        }
        include_once './views/TipoUsuario/TipoUsuario.php';
    }
    
    public function guardar_TipoUsuario(){
        
        $alm = new TipoUsuarioModel();
        $alm->id_tipoUsuario =$_REQUEST['id_tipoUsuario'];
        $alm->nombre_Tipo_Usuario =$_REQUEST['nombre_Tipo_Usuario'];


        
        $alm->id_tipoUsuario > 0 
            ?$this->mode->actualizar_TipoUsuario($alm) : $this->mode->nuevo_TipoUsuario($alm);
        
        
        
        echo  "<script> alert ('Se han guardado los cambios');
        location.href = '?c=TipoUsuario&a=Index';
        </script>";
        
    }

    public function g_eliminar_TipoUsuario(){
        $this->mode->eliminar_TipoUsuario($_REQUEST['id_tipoUsuario']);
        echo  "<script> alert ('Se ha eliminado el tipo de usuario');
        location.href = '?c=TipoUsuario&a=Index';
        </script>";
        
    }
}
