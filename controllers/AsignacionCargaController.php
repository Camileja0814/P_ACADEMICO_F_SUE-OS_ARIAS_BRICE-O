<?php
//Requerimos al modelo de este controlador
require_once "./models/AsignacionCargaModel.php";
//Creamos el controlador
class AsignacionCargaController{
//Creamos la variable que utilizamos en el modelo 
    private $mode;
    //Para instanciar al modelo 
    public function __CONSTRUCT(){
        $this->mode = new AsignacionCargaModel();
    }
    //Metdo para ir a la venta principal de AsignacionCargaes
    public function Index(){
        include_once './views/AsignacionCarga/AsignacionCargaCon.php';
    }
    public function nuevo(){
        $alm = new AsignacionCargaModel();
        
        if(isset($_REQUEST['id_Asignacion'])){
            $alm = $this->mode->Obtener($_REQUEST['id_Asignacion']);
        }
        include_once './views/AsignacionCarga/AsignacionCarga.php';
    }
    
    public function guardar_AsignacionCarga(){
        
        $alm = new AsignacionCargaModel();
        $alm->id_Asignacion =$_REQUEST['id_Asignacion'];
        $alm->id_Materia_FK =$_REQUEST['id_Materia_FK'];
        $alm->id_Usuario_KFFK =$_REQUEST['id_Usuario_KFFK'];
        $alm->id_Curso_FKF =$_REQUEST['id_Curso_FKF'];
        $alm->fecha_Asignacion =$_REQUEST['fecha_Asignacion'];
        
        $alm->id_Asignacion > 0 
            ?$this->mode->actualizar_AsignacionCarga($alm) : $this->mode->nuevo_AsignacionCarga($alm);
        
        
        
        echo  "<script> alert ('Se han guardado los cambios');
        location.href = '?c=AsignacionCarga&a=Index';
        </script>";
        
    }

    public function g_eliminar_AsignacionCarga(){
        $this->mode->eliminar_AsignacionCarga($_REQUEST['id_Asignacion']);
        echo  "<script> alert ('Se ha eliminado el usuario');
        location.href = '?c=AsignacionCarga&a=Index';
        </script>";
        
    }
}
