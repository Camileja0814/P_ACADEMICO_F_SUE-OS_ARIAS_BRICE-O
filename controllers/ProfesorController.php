<?php
//Requerimos al modelo de este controlador
require_once "./models/ProfesorModel.php";
//Creamos el controlador
class ProfesorController{
//Creamos la variable que utilizamos en el modelo 
    private $mode;
    //Para instanciar al modelo 
    public function __CONSTRUCT(){
        $this->mode = new ProfesorModel();
    }
    //Metdo para ir a la venta principal de profesores
    public function Index(){
        include_once './views/Profesor/ProfesorCon.php';
    }
    public function nuevo(){
        $alm = new ProfesorModel();
        
        if(isset($_REQUEST['id_Usuario'])){
            $alm = $this->mode->Obtener($_REQUEST['id_Usuario']);
        }
        include_once './views/Profesor/Profesor.php';
    }
    
    public function guardar_Profesor(){
        
        $alm = new ProfesorModel();
        $alm->id_Usuario =$_REQUEST['id_Usuario'];
        $alm->user_Usuario =$_REQUEST['user_Usuario'];
        $alm->password_Usuario =$_REQUEST['password_Usuario'];
        $alm->nombre_Usuario =$_REQUEST['nombre_Usuario'];
        $alm->apellido_Usuario =$_REQUEST['apellido_Usuario'];
        $alm->tipoDoc_Usuario =$_REQUEST['tipoDoc_Usuario'];
        $alm->doc_Usuario =$_REQUEST['doc_Usuario'];
        $alm->id_Especialidad_FK =$_REQUEST['id_Especialidad_FK'];
        
        $alm->id_Usuario > 0 
            ?$this->mode->actualizar_Profesor($alm) : $this->mode->nuevo_Profesor($alm);
        
        
        
        echo  "<script> alert ('Se han guardado los cambios');
        location.href = '?c=Profesor&a=Index';
        </script>";
        
    }

    public function g_eliminar_Profesor(){
        $this->mode->eliminar_Profesor($_REQUEST['id_Usuario']);
        echo  "<script> alert ('Se ha eliminado el usuario');
        location.href = '?c=Profesor&a=Index';
        </script>";
        
    }
}
