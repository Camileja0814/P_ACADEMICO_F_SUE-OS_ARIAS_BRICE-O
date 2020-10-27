<?php
//Requerimos al modelo de este controlador
require_once "./models/SalonModel.php";
//Creamos el controlador
class SalonController{
//Creamos la variable que utilizamos en el modelo 
    private $mode;
    //Para instanciar al modelo 
    public function __CONSTRUCT(){
        $this->mode = new SalonModel();
    }
    //Metdo para ir a la venta principal de profesores
    public function Index(){
        include_once './views/Salon/SalonCon.php';
    }
    public function nuevo(){
        $alm = new SalonModel();
        
        if(isset($_REQUEST['id_Salon'])){
            $alm = $this->mode->Obtener($_REQUEST['id_Salon']);
        }
        include_once './views/Salon/Salon.php';
    }
    
    public function guardar_Salon(){
        
        $alm = new SalonModel();
        $alm->id_Salon =$_REQUEST['id_Salon'];
        $alm->nombre_Salon =$_REQUEST['nombre_Salon'];
        $alm->ubicacion_Salon =$_REQUEST['ubicacion_Salon'];


        
        $alm->id_Salon > 0 
            ?$this->mode->actualizar_Salon($alm) : $this->mode->nuevo_Salon($alm);
        
        
        
        echo  "<script> alert ('Se han guardado los cambios');
        location.href = '?c=Salon&a=Index';
        </script>";
        
    }

    public function g_eliminar_Salon(){
        $this->mode->eliminar_Salon($_REQUEST['id_Salon']);
        echo  "<script> alert ('Se ha eliminado el salon');
        location.href = '?c=Salon&a=Index';
        </script>";
        
    } 
}
