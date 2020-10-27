
<?php
//Creamos el modelo para el formulario de Cargo
class CargoModel{
//Declaramos los atributos del model que son iguales a los campos de cargo en la base de datos
    public $id_Cargo;
    public $nombre_Cargo;
       

    public $CNX;

    public function __construct(){
        try {
            $this->CNX= Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar_Cargo(){
        try {
            $query= "SELECT * from Cargo" ;
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function Obtener($id_Cargo)
	{
		try 
		{
            $query= "SELECT * FROM Cargo WHERE id_Cargo = ?";
            $stm = $this->CNX->prepare($query);
			$stm->execute(array($id_Cargo));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function nuevo_Cargo(CargoModel $data){
        try {
            $query= "INSERT INTO Cargo VALUES ('',?)";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->nombre_Cargo
                              ));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    
    public function actualizar_Cargo( $data){
        try {
            $query= "UPDATE Cargo SET
                        nombre_Cargo=?
                    where id_Cargo=?";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array(
                                $data->nombre_Cargo,
                                $data->id_Cargo));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function eliminar_Cargo($id_Cargo)
	{
		try 
		{
            $query= "DELETE  FROM cargo  WHERE id_Cargo = ?";
            $stm = $this->CNX->prepare($query);
					          

            $stm->execute(array($id_Cargo));

		} catch (Exception $e){
            die($e ->getMessage());
        }
    
        
	}

}