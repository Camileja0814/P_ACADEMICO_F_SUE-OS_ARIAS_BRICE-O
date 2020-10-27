<?php
//Requerimos al modelo de este controlador
require_once "./models/EstudianteModel.php";
//Creamos el controlador
class EstudianteController{
//Creamos la variable que utilizamos en el modelo 
    private $mode;
    //Para instanciar al modelo 
    public function __CONSTRUCT(){
        $this->mode = new EstudianteModel();
    }
    //Metdo para ir a la venta principal de profesores
    public function Index(){
        include_once './views/Estudiante/EstudianteCon.php';
    }
    public function nuevo(){
        $alm = new EstudianteModel();
        
        if(isset($_REQUEST['id_Usuario'])){
            $alm = $this->mode->Obtener($_REQUEST['id_Usuario']);
        }
        include_once './views/Estudiante/Estudiante.php';
    }
    
    public function guardar_Estudiante(){
        
        $alm = new EstudianteModel();
        $alm->id_Usuario =$_REQUEST['id_Usuario'];
        $alm->user_Usuario =$_REQUEST['user_Usuario'];
        $alm->password_Usuario =$_REQUEST['password_Usuario'];
        $alm->nombre_Usuario =$_REQUEST['nombre_Usuario'];
        $alm->apellido_Usuario =$_REQUEST['apellido_Usuario'];
        $alm->tipoDoc_Usuario =$_REQUEST['tipoDoc_Usuario'];
        $alm->doc_Usuario =$_REQUEST['doc_Usuario'];
        
        
        $alm->id_Usuario > 0 
            ?$this->mode->actualizar_Estudiante($alm) : $this->mode->nuevo_Estudiante($alm);
        
        
        
        echo  "<script> alert ('Se han guardado los cambios');
        location.href = '?c=Estudiante&a=Index';
        </script>";
        
    }

    public function g_eliminar_Estudiante(){
        $this->mode->eliminar_Estudiante($_REQUEST['id_Usuario']);
        echo  "<script> alert ('Se ha eliminado el usuario');
        location.href = '?c=Estudiante&a=Index';
        </script>";
        
    }
}
