<?php
//Creamos el modelo para el formulario de Administrador
class AdminModel{
//Declaramos los atributos del model que son iguales a los campos de usuario en la base de datos
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

    public $CNX;

    public function __construct(){
        try {
            $this->CNX= Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar_Administradores(){
        try {
            $query= "SELECT * from Usuario where id_tipoUsuario_FK=1 and estado_Usuario='Activo'";
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function Obtener($id_Usuario)
	{
		try 
		{
            $query= "CALL PA_Obtener(?)";
            $stm = $this->CNX->prepare($query);
			$stm->execute(array($id_Usuario));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function nuevo_Admin(AdminModel $data){
        try {
            $query= "CALL PA_Insertar_Usuario(?,?,?,?,?,?,'Activo','1','5')";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->user_Usuario,
                                $data->password_Usuario,
                                $data->nombre_Usuario,
                                $data->apellido_Usuario,
                                $data->tipoDoc_Usuario,
                                $data->doc_Usuario));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    
    public function actualizar_Admin( $data){
        try {
            $query= "CALL PA_modificar_Usuario(?,?,?,?,?,?,?)";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->user_Usuario,
                                $data->password_Usuario,
                                $data->nombre_Usuario,
                                $data->apellido_Usuario,
                                $data->tipoDoc_Usuario,
                                $data->doc_Usuario,
                                $data->id_Usuario));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function eliminar_Admin($id_Usuario)
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

}