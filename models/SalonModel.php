

<?php
//Creamos el modelo para el formulario de Cargo
class SalonModel{
//Declaramos los atributos del model que son iguales a los campos de cargo en la base de datos
    public $id_Salon;
    public $nombre_Salon;
    public $ubicacion_Salon;
       

    public $CNX;

    public function __construct(){
        try {
            $this->CNX= Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar_Salon(){
        try {
            $query= "SELECT * from Salon" ;
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function Obtener($id_Salon)
	{
		try 
		{
            $query= "SELECT * FROM Salon WHERE id_Salon = ?";
            $stm = $this->CNX->prepare($query);
			$stm->execute(array($id_Salon));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function nuevo_Salon(SalonModel $data){
        try {
            $query= "INSERT INTO Salon VALUES ('',?,?)";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->nombre_Salon,
                                $data->ubicacion_Salon
                              ));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    
    public function actualizar_Salon( $data){
        try {
            $query= "UPDATE Salon SET
                        nombre_Salon=?,
                        ubicacion_Salon=?
                    where id_Salon=?";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array(
                                $data->nombre_Salon,
                                $data->ubicacion_Salon,
                                $data->id_Salon));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function eliminar_Salon($id_Salon)
	{
		try 
		{
            $query= "DELETE  FROM Salon  WHERE id_Salon = ?";
            $stm = $this->CNX->prepare($query);
					          

            $stm->execute(array($id_Salon));

		} catch (Exception $e){
            die($e ->getMessage());
        }
    
        
	}

}