<?php
//Requerimos al modelo de este controlador
require_once "./models/MateriaModel.php";
//Creamos el controlador
class MateriaController{
//Creamos la variable que utilizamos en el modelo 
    private $mode;
    //Para instanciar al modelo 
    public function __CONSTRUCT(){
        $this->mode = new MateriaModel();
    }
    //Metdo para ir a la venta principal de profesores
    public function Index(){
        include_once './views/Materia/MateriaCon.php';
    }
    public function nuevo(){
        $alm = new MateriaModel();
        
        if(isset($_REQUEST['id_Materia'])){
            $alm = $this->mode->Obtener($_REQUEST['id_Materia']);
        }
        include_once './views/Materia/Materia.php';
    }
    
    public function guardar_Materia(){
        
        $alm = new MateriaModel();
        $alm->id_Materia =$_REQUEST['id_Materia'];
        $alm->nombre_Materia =$_REQUEST['nombre_Materia'];
        $alm->horasSemanales_Materia =$_REQUEST['horasSemanales_Materia'];

        
        $alm->id_Materia > 0 
            ?$this->mode->actualizar_Materia($alm) : $this->mode->nuevo_Materia($alm);
        
        
        
        echo  "<script> alert ('Se han guardado los cambios');
        location.href = '?c=Materia&a=Index';
        </script>";
        
    }

    public function g_eliminar_Materia(){
        $this->mode->eliminar_Materia($_REQUEST['id_Materia']);
        echo  "<script> alert ('Se ha eliminado la materia');
        location.href = '?c=Materia&a=Index';
        </script>";
        
    } 
}
