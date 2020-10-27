<?php
//Requerimos al modelo de este controlador
require_once "./models/ObservacionModel.php";
//Creamos el controlador
class ObservacionController{
//Creamos la variable que utilizamos en el modelo 
    private $mode;
    //Para instanciar al modelo 
    public function __CONSTRUCT(){
        $this->mode = new ObservacionModel();
    }
    //Metdo para ir a la venta principal de profesores
    public function Index(){
        include_once './views/Observacion/ObservacionCon.php';
    }
    public function nuevo(){
        $alm = new ObservacionModel();
        
        if(isset($_REQUEST['id_Observacion'])){
            $alm = $this->mode->Obtener($_REQUEST['id_Observacion']);
        }
        include_once './views/Observacion/Observacion.php';
    }
    
    public function guardar_Observacion() {
        
        $alm = new ObservacionModel();
        $alm->id_Observacion =$_REQUEST['id_Observacion'];
        $alm->fecha_Observacion =$_REQUEST['fecha_Observacion'];
        $alm->tipo_Falta =$_REQUEST['tipo_Falta'];
        $alm->descripcion_Observacion =$_REQUEST['descripcion_Observacion'];
        $alm->descargos_Usuario =$_REQUEST['descargos_Usuario'];
        $alm->id_Usuario_KF=$_REQUEST['id_Usuario_KF'];
        $alm->id_Observacion > 0 
            ?$this->mode->actualizar_Observacion($alm) : $this->mode->nuevo_Observacion($alm);
        
        
        
        echo  "<script> alert ('Se han guardado los cambios');
        location.href = '?c=Observacion&a=Index';
        </script>";
        
    }


    public function g_eliminar_Observacion(){
        $this->mode->eliminar_Observacion($_REQUEST['id_Observacion']);
        echo  "<script> alert ('Se ha eliminado la observacion');
        location.href = '?c=Observacion&a=Index';
        </script>";
        
    } 
}
