<?php
//Creamos el modelo para el formulario de Profesor
class UsuarioModel{
    //Declaramos los atributos del model que son iguales a los campos de Usuario en la base de datos
    public $id_Usuario;
    public $user_Usuario;
    public $password_Usuario;
    public $nombre_Usuario;
    public $apellido_Usuario;
    public $tipoDoc_Usuario;
    public $doc_Usuario;
    public $estado_Usuario;
    public $id_tipoUsuario_FK;
    public $id_Especialidad_FK; 
    public $id_Especialidad;
    public $nombre_Especialidad;   

    public $CNX;

    public function __construct(){
        try {
            $this->CNX= Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar_Usuario(){
        try {
            $query= "SELECT id_Usuario,
            user_Usuario,
            password_Usuario,
            nombre_Usuario,
            apellido_Usuario,
            tipoDoc_Usuario,
            doc_Usuario,
            estado_Usuario,
            id_tipoUsuario_FK,
            id_Especialidad_FK,
            id_tipoUsuario,
            nombre_Tipo_Usuario
            from Usuario 
            inner join tipousuario on Usuario.id_tipoUsuario_FK=tipousuario.id_tipoUsuario ";
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    
    public function inactivar_Usuario_m($id_Usuario)
	{
		try 
		{
            $query= "CALL PA_Eliminar(?)";
            $stm = $this->CNX->prepare($query);
					          

            $stm->execute(array($id_Usuario));

		} catch (Exception $e){
            die($e ->getMessage());
        }
    
        
    }
    
        
    public function activar_Usuario_m($id_Usuario)
	{
		try 
		{
            $query= "CALL PA_Activar(?)";
            $stm = $this->CNX->prepare($query);
					          

            $stm->execute(array($id_Usuario));

		} catch (Exception $e){
            die($e ->getMessage());
        }
    
        
	}


}