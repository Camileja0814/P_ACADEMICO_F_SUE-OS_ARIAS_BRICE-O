<?php
include_once './models/AdminModel.php';
class AdminController{

   
    private $mode;

    public function __CONSTRUCT(){
        $this->mode = new AdminModel();
    }

    public function Index(){
        include_once './views/Administrador/AdminCon.php';
    }
    public function nuevo(){
        $alm = new AdminModel();
        
        if(isset($_REQUEST['id_Usuario'])){
            $alm = $this->mode->Obtener($_REQUEST['id_Usuario']);
        }
        include_once './views/Administrador/AdminAcademico.php';
    }
    
    public function guardar_admin(){
        
        $alm = new AdminModel();
        $alm->id_Usuario =$_REQUEST['id_Usuario'];
        $alm->user_Usuario =$_REQUEST['user_Usuario'];
        $alm->password_Usuario =$_REQUEST['password_Usuario'];
        $alm->nombre_Usuario =$_REQUEST['nombre_Usuario'];
        $alm->apellido_Usuario =$_REQUEST['apellido_Usuario'];
        $alm->tipoDoc_Usuario =$_REQUEST['tipoDoc_Usuario'];
        $alm->doc_Usuario =$_REQUEST['doc_Usuario'];
        
        $alm->id_Usuario > 0 
            ?$this->mode->actualizar_Admin($alm) : $this->mode->nuevo_Admin($alm);
        
        
        
        echo  "<script> alert ('Se han guardado los cambios');
        location.href = '?c=Admin&a=Index';
        </script>";
        
    }

    public function g_eliminar_Admin(){
        $this->mode->eliminar_Admin($_REQUEST['id_Usuario']);
        echo  "<script> alert ('Se ha eliminado el usuario');
        location.href = '?c=Admin&a=Index';
        </script>";
        
    }
}
