<?php
//Creamos el modelo para el formulario de Profesor
class LoginModel{
    public $user_Usuario;
    public $password_Usuario;
    public $id_tipoUsuario_FK;
    public $CNX;

    public function __construct(){
        try {
            $this->CNX= Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listar_TipoUsuario(){
        try {
            $query= "SELECT * from  tipousuario";
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    
    public function Obtener($data)
	{
		try 
		{
            $query= "SELECT * FROM Usuario where user_Usuario=? and password_Usuario= ? and id_tipoUsuario_FK=? and estado_Usuario='Activo' ";
            $stm = $this->CNX->prepare($query);
			$stm->execute(array($data->user_Usuario,
                                $data->password_Usuario,
                                $data->id_tipoUsuario_FK));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    public function Iniciar_Sesion($data,$datos){
        try {
            
            $query = "SELECT * FROM Usuario where user_Usuario=? and password_Usuario= ? and id_tipoUsuario_FK=? and estado_Usuario='Activo' ";            
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->user_Usuario,
                                $data->password_Usuario,
                                $data->id_tipoUsuario_FK));
            if($stm->rowCount()>0){
                session_start();
                $_SESSION['nombre']=$datos->nombre_Usuario.' '.$datos->apellido_Usuario;
                $_SESSION['id']=$datos->id_Usuario;
                if($data->id_tipoUsuario_FK==1){
                    $_SESSION['Admin']=$data->user_Usuario;
                    echo  "<script> alert ('Bienvenido administrador: $datos->nombre_Usuario $datos->apellido_Usuario');
                    location.href = '?c=Acerca';
                    </script>";
                }elseif($data->id_tipoUsuario_FK==2){
                    $_SESSION['Profe']=$data->user_Usuario;
                    echo  "<script> alert ('Bienvenido profesor: $datos->nombre_Usuario $datos->apellido_Usuario');
                    location.href = '?c=Acerca';
                    </script>"; 
                }elseif($data->id_tipoUsuario_FK==3){
                    $_SESSION['Estudiante']=$data->user_Usuario;
                    echo  "<script> alert ('Bienvenido Estudiante: $datos->nombre_Usuario $datos->apellido_Usuario');
                    location.href = '?c=Acerca';
                    </script>"; 
                }
                
            }else {
                echo "<script> alert ('No fue posible iniciar sesión, intente nuevamente');
                location.href = '?c=Login&a=Index';
                </script>";
         }
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }



}