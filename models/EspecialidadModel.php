
<?php
//Creamos el modelo para el formulario de Especialidad
class EspecialidadModel{
    //Declaramos los atributos del model que son iguales a los campos de Usuario en la base de datos
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

    public function listar_Especialidad(){
        try {
            $query= "SELECT * FROM Especialidad";
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function Obtener($id_Especialidad)
	{
		try 
		{
            $query= "SELECT * FROM Especialidad";
            $stm = $this->CNX->prepare($query);
			$stm->execute(array($id_Especialidad));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function nuevo_Especialidad(EspecialidadModel $data){
        try {
            $query= "INSERT INTO Especialidad VALUES ('',?)";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->nombre_Especialidad,
                              ));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    
    public function actualizar_Especialidad($data){
        try {
            $query= "UPDATE Especialidad SET
                        nombre_Especialidad=?
                    where id_Especialidad=?";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->nombre_Especialidad,
                                $data->id_Especialidad,
                               
                                ));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function eliminar_Especialidad($id_Especialidad)
	{
		try 
		{
            $query= "DELETE FROM  Especialidad  WHERE id_Especialidad = ?";
            $stm = $this->CNX->prepare($query);
					          

            $stm->execute(array($id_Especialidad));

		} catch (Exception $e){
            die($e ->getMessage());
        }
    
        
	}

}