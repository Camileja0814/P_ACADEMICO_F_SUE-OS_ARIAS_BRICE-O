<?php
//Requerimos al modelo de este controlador
require_once "./models/SeguimientoCursoModel.php";
//Creamos el controlador
class SeguimientoCursoController{
//Creamos la variable que utilizamos en el modelo 
    private $mode;
    //Para instanciar al modelo 
    public function __CONSTRUCT(){
        $this->mode = new SeguimientoCursoModel();
    }
    //Metdo para ir a la venta principal de SeguimientoCursoes
    public function Index(){
        include_once './views/SeguimientoCurso/SeguimientoCursoCon.php';
    }
    public function nuevo(){
        $alm = new SeguimientoCursoModel();
        
        if(isset($_REQUEST['id_Seguimiento'])){
            $alm = $this->mode->Obtener($_REQUEST['id_Seguimiento']);
        }
        include_once './views/SeguimientoCurso/SeguimientoCurso.php';
    }
    
    public function guardar_SeguimientoCurso(){
        
        $alm = new SeguimientoCursoModel();
        $alm->id_Seguimiento =$_REQUEST['id_Seguimiento'];
        $alm->id_Usuario_FKFKF =$_REQUEST['id_Usuario_FKFKF'];
        $alm->id_Curso_FK =$_REQUEST['id_Curso_FK'];
        $alm->fecha_Seguimiento =$_REQUEST['fecha_Seguimiento'];
        $alm->id_Salon_FK =$_REQUEST['id_Salon_FK'];
        
        $alm->id_Seguimiento > 0 
            ?$this->mode->actualizar_SeguimientoCurso($alm) : $this->mode->nuevo_SeguimientoCurso($alm);
        
        
        
        echo  "<script> alert ('Se han guardado los cambios');
        location.href = '?c=SeguimientoCurso&a=Index';
        </script>";
        
    }

    public function g_eliminar_SeguimientoCurso(){
        $this->mode->eliminar_SeguimientoCurso($_REQUEST['id_Seguimiento']);
        echo  "<script> alert ('Se ha eliminado el usuario');
        location.href = '?c=SeguimientoCurso&a=Index';
        </script>";
        
    }
}
