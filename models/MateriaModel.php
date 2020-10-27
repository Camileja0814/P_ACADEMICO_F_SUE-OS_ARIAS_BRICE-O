


<?php
//Creamos el modelo para el formulario de Materia
class MateriaModel{
//Declaramos los atributos del model que son iguales a los campos de materia en la base de datos
    public $id_Materia;
    public $nombre_Materia;
    public $horasSemanales_Materia;

    public $CNX;

    public function __construct(){
        try {
            $this->CNX= Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar_Materia(){
        try {
            $query= "SELECT * from Materia" ;
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function Obtener($id_Materia)
	{
		try 
		{
            $query= "SELECT * FROM Materia WHERE id_Materia = ?";
            $stm = $this->CNX->prepare($query);
			$stm->execute(array($id_Materia));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function nuevo_Materia(MateriaModel $data){
        try {
            $query= "INSERT INTO Materia VALUES ('',?,?)";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->nombre_Materia,
                                $data->horasSemanales_Materia
                              ));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    
    public function actualizar_Materia( $data){
        try {
            $query= "UPDATE Materia SET
                        nombre_Materia=?,
                        horasSemanales_Materia=?
                    where id_Materia=?";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array(
                                $data->nombre_Materia,
                                $data->horasSemanales_Materia,
                                $data->id_Materia));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function eliminar_Materia($id_Materia)
	{
		try 
		{
            $query= "DELETE  FROM Materia  WHERE id_Materia = ?";
            $stm = $this->CNX->prepare($query);
					          

            $stm->execute(array($id_Materia));

		} catch (Exception $e){
            die($e ->getMessage());
        }
    
        
	}

}