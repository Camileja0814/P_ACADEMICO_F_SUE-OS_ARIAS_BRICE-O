<?php
//Requerimos al modelo de este controlador
require_once "./models/CalificacionModel.php";
//Creamos el controlador
class CalificacionController{
//Creamos la variable que utilizamos en el modelo 
    private $mode;
    //Para instanciar al modelo 
    public function __CONSTRUCT(){
        $this->mode = new CalificacionModel();
    }
    //Metdo para ir a la venta principal de AsignacionCargaes
    public function Index(){
        include_once './views/Calificacion/CalificacionCon.php';
    }
    public function nuevo(){
        $alm = new CalificacionModel();
        
        if(isset($_REQUEST['id_Calificacion'])){
            $alm = $this->mode->Obtener($_REQUEST['id_Calificacion']);
        }
        include_once './views/Calificacion/Calificacion.php';
    }
    
    public function guardar_Calificacion(){
        
        $alm = new CalificacionModel();
        $alm->notaPeriodo1_Calificacion =$_REQUEST['notaPeriodo1_Calificacion'];
        $alm->notaPeriodo2_Calificacion =$_REQUEST['notaPeriodo2_Calificacion'];
        $alm->notaPeriodo3_Calificacion =$_REQUEST['notaPeriodo3_Calificacion'];
        $alm->fechaRegistro_Calificacion =$_REQUEST['fechaRegistro_Calificacion'];
        $alm->id_Asignacion_FK = $_REQUEST['id_Asignacion_FK'];
        $alm->id_Calificacion =$_REQUEST['id_Calificacion'];
        $alm->id_Calificacion > 0 
            ?$this->mode->actualizar_Calificacion($alm) : $this->mode->nuevo_Calificacion($alm);
        
        
        
        echo  "<script> alert ('Se han guardado los cambios');
        location.href = '?c=Calificacion&a=Index';
        </script>";
        
    }

    public function g_eliminar_Calificacion(){
        $this->mode->eliminar_Calificacion($_REQUEST['id_Calificacion']);
        echo  "<script> alert ('Se ha eliminado la calificación');
        location.href = '?c=Calificacion&a=Index';
        </script>";
        
    }
}
