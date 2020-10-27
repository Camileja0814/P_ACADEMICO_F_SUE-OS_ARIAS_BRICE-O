<?php
//Requerimos al modelo de este controlador
require_once "./models/CursoModel.php";
//Creamos el controlador
class CursoController{
//Creamos la variable que utilizamos en el modelo 
    private $mode;
    //Para instanciar al modelo 
    public function __CONSTRUCT(){
        $this->mode = new CursoModel();
    }
    //Metdo para ir a la venta principal de profesores
    public function Index(){
        include_once './views/Curso/CursoCon.php';
    }
    public function nuevo(){
        $alm = new CursoModel();
        
        if(isset($_REQUEST['id_Curso'])){
            $alm = $this->mode->Obtener($_REQUEST['id_Curso']);
        }
        include_once './views/Curso/Curso.php';
    }
    
    public function guardar_Curso(){
        
        $alm = new CursoModel();
        $alm->id_Curso =$_REQUEST['id_Curso'];
        $alm->codigo_Curso =$_REQUEST['codigo_Curso'];


        
        $alm->id_Curso > 0 
            ?$this->mode->actualizar_Curso($alm) : $this->mode->nuevo_Curso($alm);
        
        
        
        echo  "<script> alert ('Se han guardado los cambios');
        location.href = '?c=Curso&a=Index';
        </script>";
        
    }

    public function g_eliminar_Curso(){
        $this->mode->eliminar_Curso($_REQUEST['id_Curso']);
        echo  "<script> alert ('Se ha eliminado el curso');
        location.href = '?c=curso&a=Index';
        </script>";
        
    } 
}
