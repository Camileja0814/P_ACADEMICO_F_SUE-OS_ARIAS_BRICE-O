


<?php
//Creamos el modelo para el formulario de curso
class CursoModel{
//Declaramos los atributos del model que son iguales a los campos de curso en la base de datos
    public $id_Curso;
    public $codigo_Curso;
       

    public $CNX;

    public function __construct(){
        try {
            $this->CNX= Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar_Curso(){
        try {
            $query= "SELECT * from curso" ;
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function Obtener($id_Curso)
	{
		try 
		{
            $query= "SELECT * FROM Curso WHERE id_Curso = ?";
            $stm = $this->CNX->prepare($query);
			$stm->execute(array($id_Curso));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function nuevo_Curso(CursoModel $data){
        try {
            $query= "INSERT INTO Curso VALUES ('',?)";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->codigo_Curso
                              ));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    
    public function actualizar_Curso( $data){
        try {
            $query= "UPDATE Curso SET
                        codigo_Curso=?
                    where id_Curso=?";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array(
                                $data->codigo_Curso,
                                $data->id_Curso));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function eliminar_Curso($id_Curso)
	{
		try 
		{
            $query= "DELETE  FROM Curso  WHERE id_Curso = ?";
            $stm = $this->CNX->prepare($query);
					          

            $stm->execute(array($id_Curso));

		} catch (Exception $e){
            die($e ->getMessage());
        }
    
        
	}

}