

<?php
//Creamos el modelo para el formulario de TipoUsuario
class TipoUsuarioModel{
//Declaramos los atributos del model que son iguales a los campos de tipoUsuario en la base de datos
    public $id_tipoUsuario;
    public $nombre_Tipo_Usuario;
       

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
            $query= "SELECT * from TipoUsuario" ;
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function Obtener($id_tipoUsuario)
	{
		try 
		{
            $query= "SELECT * FROM TipoUsuario WHERE id_tipoUsuario = ?";
            $stm = $this->CNX->prepare($query);
			$stm->execute(array($id_tipoUsuario));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function nuevo_TipoUsuario(TipoUsuarioModel $data){
        try {
            $query= "INSERT INTO TipoUsuario VALUES ('',?)";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->nombre_Tipo_Usuario
                              ));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    
    public function actualizar_TipoUsuario( $data){
        try {
            $query= "UPDATE TipoUsuario SET
                        nombre_Tipo_Usuario=?
                    where id_tipoUsuario=?";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array(
                                $data->nombre_Tipo_Usuario,
                                $data->id_tipoUsuario));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function eliminar_TipoUsuario($id_tipoUsuario)
	{
		try 
		{
            $query= "DELETE  FROM TipoUsuario  WHERE id_tipoUsuario = ?";
            $stm = $this->CNX->prepare($query);
					          

            $stm->execute(array($id_tipoUsuario));

		} catch (Exception $e){
            die($e ->getMessage());
        }
    
        
	}

}