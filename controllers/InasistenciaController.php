<?php
//Requerimos al modelo de este controlador
require_once "./models/InasistenciaModel.php";
//Creamos el controlador
class InasistenciaController{
//Creamos la variable que utilizamos en el modelo 
    private $mode; 
    //Para instanciar al modelo 
    public function __CONSTRUCT(){
        $this->mode = new InasistenciaModel();
    }
    //Metdo para ir a la venta principal de AsignacionCargaes
    public function Index(){
        include_once './views/Inasistencia/InasistenciaCon.php';
    }
    public function nuevo(){
        $alm = new InasistenciaModel();
        
        if(isset($_REQUEST['id_Inasistencia'])){
            $alm = $this->mode->Obtener($_REQUEST['id_Inasistencia']);
        }
        include_once './views/Inasistencia/Inasistencia.php';
    }
    
    public function guardar_Inasistencia(){
        
        $alm = new InasistenciaModel();
        $alm->id_Inasistencia =$_REQUEST['id_Inasistencia'];
        $alm->fecha_Inasistencia =$_REQUEST['fecha_Inasistencia'];
        $alm->excusa_Inasistencia =$_REQUEST['excusa_Inasistencia'];
        $alm->id_Usuario_FKF =$_REQUEST['id_Usuario_FKF'];
      
        
        $alm->id_Inasistencia > 0 
            ?$this->mode->actualizar_Inasistencia($alm) : $this->mode->nuevo_Inasistencia($alm);
        
        
        
        echo  "<script> alert ('Se han guardado los cambios');
        location.href = '?c=Inasistencia&a=Index';
        </script>";
        
    }

    public function g_eliminar_Inasistencia(){
        $this->mode->eliminar_Inasistencia($_REQUEST['id_Inasistencia']);
        echo  "<script> alert ('Se ha eliminado la inaisitencia');
        location.href = '?c=Inasistencia&a=Index';
        </script>";
        
    }
}
