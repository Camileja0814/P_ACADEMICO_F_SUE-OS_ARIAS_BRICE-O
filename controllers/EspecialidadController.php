<?php
//Requerimos al modelo de este controlador
require_once "./models/EspecialidadModel.php";
//Creamos el controlador
class EspecialidadController{
//Creamos la variable que utilizamos en el modelo 
    private $mode;
    //Para instanciar al modelo 
    public function __CONSTRUCT(){
        $this->mode = new EspecialidadModel();
    }
    //Metdo para ir a la venta principal de profesores
    public function Index(){
        include_once './views/Especialidad/EspecialidadCon.php';
    }
    public function nuevo(){
        $alm = new EspecialidadModel();
        
        if(isset($_REQUEST['id_Especialidad'])){
            $alm = $this->mode->Obtener($_REQUEST['id_Especialidad']);
        }
        include_once './views/Especialidad/Especialidad.php';
    }
    
    public function guardar_Especialidad(){
        
        $alm = new EspecialidadModel();
        $alm->id_Especialidad =$_REQUEST['id_Especialidad'];
        $alm->nombre_Especialidad =$_REQUEST['nombre_Especialidad'];
        
        $alm->id_Especialidad > 0 
            ?$this->mode->actualizar_Especialidad($alm) : $this->mode->nuevo_Especialidad($alm);
        
        
        
        echo  "<script> alert ('Se han guardado los cambios');
        location.href = '?c=Especialidad&a=Index';
        </script>";
        
    }

    public function g_eliminar_Especialidad(){
        $this->mode->eliminar_Especialidad($_REQUEST['id_Especialidad']);
        echo  "<script> alert ('Se ha eliminado la especialidad');
        location.href = '?c=Especialidad&a=Index';
        </script>";
        
    }
}
