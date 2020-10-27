

<?php
//Creamos el modelo para el formulario de AsignacionCarga
class CalificacionModel{
    //Declaramos los atributos del model que son iguales a los campos de Usuario en la base de datos
    public $id_Calificacion;
    public $notaPeriodo1_Calificacion;
    public $notaPeriodo2_Calificacion;
    public $notaPeriodo3_Calificacion;
    public $fechaRegistro_Calificacion;
    public $id_Usuario_FKFK;

    public $CNX;

    public function __construct(){
        try {
            $this->CNX= Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar_Calificacion(){
        try {
            $query= "SELECT id_Calificacion,
            notaPeriodo1_Calificacion,
            notaPeriodo2_Calificacion,
            notaPeriodo3_Calificacion,
            fechaRegistro_Calificacion,
            nombre_Usuario,
            apellido_Usuario,
            id_Asignacion_FK,
            id_Asignacion,
            id_Materia_FK,
            nombre_Materia,
            id_Usuario_KFFK,
            id_Curso_FKF,
            codigo_Curso
            from CALIFICACION
            INNER JOIN ASIGNACIONCARGA ON  CALIFICACION.id_Asignacion_FK=ASIGNACIONCARGA.id_Asignacion
            INNER JOIN MATERIA ON MATERIA.id_Materia=ASIGNACIONCARGA.id_Materia_FK
            INNER JOIN USUARIO ON USUARIO.id_Usuario=ASIGNACIONCARGA.id_Usuario_KFFK
            INNER JOIN CURSO ON CURSO.id_Curso=ASIGNACIONCARGA.id_Curso_FKF;
            ";
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    
    public function listar_Usuario(){
        try {
            $query= "SELECT 
            nombre_Usuario,
            apellido_Usuario,
            id_Asignacion,
            id_Materia_FK,
            nombre_Materia,
            id_Usuario_KFFK,
            id_Curso_FKF,
            codigo_Curso
            from ASIGNACIONCARGA
            INNER JOIN MATERIA ON MATERIA.id_Materia=ASIGNACIONCARGA.id_Materia_FK
            INNER JOIN USUARIO ON USUARIO.id_Usuario=ASIGNACIONCARGA.id_Usuario_KFFK
            INNER JOIN CURSO ON CURSO.id_Curso=ASIGNACIONCARGA.id_Curso_FKF;";
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function Obtener($id_Calificacion)
	{
		try 
		{
            $query= "SELECT *
            from CALIFICACION
            INNER JOIN ASIGNACIONCARGA ON  CALIFICACION.id_Asignacion_FK=ASIGNACIONCARGA.id_Asignacion
            INNER JOIN MATERIA ON MATERIA.id_Materia=ASIGNACIONCARGA.id_Materia_FK
            INNER JOIN USUARIO ON USUARIO.id_Usuario=ASIGNACIONCARGA.id_Usuario_KFFK
            INNER JOIN CURSO ON CURSO.id_Curso=ASIGNACIONCARGA.id_Curso_FKF
            WHERE id_Calificacion=?";
            $stm = $this->CNX->prepare($query);
			$stm->execute(array($id_Calificacion));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function nuevo_Calificacion(CalificacionModel $data){
        try {
            $query= "insert into Calificacion values ('',?,?,?,?,?)";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array(
                $data->notaPeriodo1_Calificacion,
                $data->notaPeriodo2_Calificacion,
                $data->notaPeriodo3_Calificacion,
                $data->fechaRegistro_Calificacion,
                $data->id_Asignacion_FK));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    
    public function actualizar_Calificacion($data){
        try {
            $query= "UPDATE Calificacion SET
                        notaPeriodo1_Calificacion=?,
                        notaPeriodo2_Calificacion=?,
                        notaPeriodo3_Calificacion=?,
                        fechaRegistro_Calificacion=?,
                        id_Asignacion_FK=?
                    where id_Calificacion=?";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->notaPeriodo1_Calificacion,
                                $data->notaPeriodo2_Calificacion,
                                $data->notaPeriodo3_Calificacion,
                                $data->fechaRegistro_Calificacion,
                                $data->id_Asignacion_FK,
                                $data->id_Calificacion
                                ));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function eliminar_Calificacion($id_Calificacion)
	{
		try 
		{
            $query= "DELETE FROM Calificacion where id_Calificacion=?";
            $stm = $this->CNX->prepare($query);
					          

            $stm->execute(array($id_Calificacion));

		} catch (Exception $e){
            die($e ->getMessage());
        }
    
        
	}

}