

<?php
//Creamos el modelo para el formulario de AsignacionCarga
class InasistenciaModel{
    //Declaramos los atributos del model que son iguales a los campos de Usuario en la base de datos
    public $id_Inasistencia;
    public $fecha_Inasistencia;
    public $excusa_Inasistencia;
    public $id_Usuario_FKF;
   


    public $CNX;

    public function __construct(){
        try {
            $this->CNX= Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar_Inasistencia(){
        try {
            $query= "SELECT id_Inasistencia,
            fecha_Inasistencia,
            excusa_Inasistencia,
            id_Usuario_FKF,
            id_Usuario,
            nombre_Usuario,
            apellido_Usuario
            from INASISTENCIA
            inner join USUARIO on Usuario.id_Usuario=INASISTENCIA.id_Usuario_FKF
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
            $query= "SELECT * from Usuario where id_tipoUsuario_FK=3 ";
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function Obtener($id_Inasistencia)
	{
		try 
		{
            $query= "SELECT id_Inasistencia,
            fecha_Inasistencia,
            excusa_Inasistencia,
            id_Usuario_FKF,
            id_Usuario,
            nombre_Usuario,
            apellido_Usuario
            from Inasistencia
            inner join USUARIO on Usuario.id_Usuario=Inasistencia.id_Usuario_FKF
             where id_Inasistencia=? ";
            $stm = $this->CNX->prepare($query);
			$stm->execute(array($id_Inasistencia));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function nuevo_Inasistencia(InasistenciaModel $data){
        try {
            $query= "insert into Inasistencia values ('',?,?,?)";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->fecha_Inasistencia,
                                
                                
                                $data->excusa_Inasistencia,
                                $data->id_Usuario_FKF));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    
    public function actualizar_Inasistencia($data){
        try {
            $query= "UPDATE Inasistencia SET
                        fecha_Inasistencia=?,
                        id_Usuario_FKF=?,
                        excusa_Inasistencia=?
                    where id_Inasistencia=?";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->fecha_Inasistencia,
                                $data->id_Usuario_FKF,
                                $data->excusa_Inasistencia,
                                $data->id_Inasistencia
                                
                                ));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function eliminar_Inasistencia($id_Inasistencia)
	{
		try 
		{
            $query= "DELETE FROM Inasistencia where id_Inasistencia=?";
            $stm = $this->CNX->prepare($query);
					          

            $stm->execute(array($id_Inasistencia));

		} catch (Exception $e){
            die($e ->getMessage());
        }
    
        
	}

}