<?php
//Creamos el modelo para el formulario de Profesor
class ProfesorModel{
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

    public function listar_Profesores(){
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
            id_Especialidad,
            nombre_Especialidad
            from Usuario 
            inner join Especialidad on Usuario.id_Especialidad_fk=Especialidad.id_Especialidad where id_tipoUsuario_FK=2 and estado_Usuario='Activo' ";
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    public function listar_Especialidad(){
        try {
            $query= "SELECT * from  Especialidad where nombre_Especialidad !='Ninguna'";
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
            id_Especialidad,
            nombre_Especialidad
            from Usuario 
            inner join Especialidad on Usuario.id_Especialidad_fk=Especialidad.id_Especialidad where id_Usuario=?";
            $stm = $this->CNX->prepare($query);
			$stm->execute(array($id_Usuario));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function nuevo_Profesor(ProfesorModel $data){
        try {
            $query= "CALL PA_Insertar_Usuario(?,?,?,?,?,?,'Activo','2',?)";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->user_Usuario,
                                $data->password_Usuario,
                                $data->nombre_Usuario,
                                $data->apellido_Usuario,
                                $data->tipoDoc_Usuario,
                                $data->doc_Usuario,
                                $data->id_Especialidad_FK));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    
    public function actualizar_Profesor($data){
        try {
            $query= "UPDATE Usuario SET
                        user_Usuario=?,
                        password_Usuario=?,
                        nombre_Usuario=?,
                        apellido_Usuario=?,
                        tipoDoc_Usuario=?,
                        doc_Usuario=?,
                        id_Especialidad_FK=?
                    where id_Usuario=?";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->user_Usuario,
                                $data->password_Usuario,
                                $data->nombre_Usuario,
                                $data->apellido_Usuario,
                                $data->tipoDoc_Usuario,
                                $data->doc_Usuario,
                                $data->id_Especialidad_FK,
                                $data->id_Usuario
                                ));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function eliminar_Profesor($id_Usuario)
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