<?php
//Requerimos al modelo de este controlador
require_once "./models/LoginModel.php";
//Creamos el controlador
class LoginController{
//Creamos la variable que utilizamos en el modelo 
    private $mode;
    //Para instanciar al modelo 
    public function __CONSTRUCT(){
        $this->mode = new LoginModel();
    }
    //Metdo para ir a la venta principal de profesores
    public function Index(){
        include_once './views/index.php';
    }
    public function Iniciar(){
        
        $alm = new loginModel();
        $datos = new loginModel();
        $alm->user_Usuario =$_REQUEST['user_Usuario'];
        $alm->password_Usuario =$_REQUEST['password_Usuario'];
        $alm->id_tipoUsuario_FK =$_REQUEST['id_tipoUsuario_FK'];
        $datos=$this->mode->Obtener($alm);
        $inicio=$this->mode->Iniciar_Sesion($alm,$datos);

    }
    

}