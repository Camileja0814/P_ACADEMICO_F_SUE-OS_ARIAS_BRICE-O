<?php
//Requerimos al modelo de este controlador
require_once "./models/CargoModel.php";
//Creamos el controlador
class CargoController{
//Creamos la variable que utilizamos en el modelo 
    private $mode;
    //Para instanciar al modelo 
    public function __CONSTRUCT(){
        $this->mode = new CargoModel();
    }
    //Metdo para ir a la venta principal de profesores
    public function Index(){
        include_once './views/Cargo/CargoCon.php';
    }
    public function nuevo(){
        $alm = new CargoModel();
        
        if(isset($_REQUEST['id_Cargo'])){
            $alm = $this->mode->Obtener($_REQUEST['id_Cargo']);
        }
        include_once './views/Cargo/Cargo.php';
    }
    
    public function guardar_Cargo(){
        
        $alm = new CargoModel();
        $alm->id_Cargo =$_REQUEST['id_Cargo'];
        $alm->nombre_Cargo =$_REQUEST['nombre_Cargo'];


        
        $alm->id_Cargo > 0 
            ?$this->mode->actualizar_Cargo($alm) : $this->mode->nuevo_Cargo($alm);
        
        
        
        echo  "<script> alert ('Se han guardado los cambios');
        location.href = '?c=Cargo&a=Index';
        </script>";
        
    }

    public function g_eliminar_Cargo(){
        $this->mode->eliminar_Cargo($_REQUEST['id_Cargo']);
        echo  "<script> alert ('Se ha eliminado el cargo');
        location.href = '?c=Cargo&a=Index';
        </script>";
        
    } 
}
