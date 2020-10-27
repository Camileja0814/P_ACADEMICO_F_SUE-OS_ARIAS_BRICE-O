<?php
//Creamos el modelo para el formulario de AsignacionCarga
class AsignacionCargaModel{
    //Declaramos los atributos del model que son iguales a los campos de Usuario en la base de datos
    public $id_Asignacion;
    public $id_Materia_FK;
    public $id_Usuario_KFFK;
    public $id_Curso_FKF;
    public $fecha_Asignacion;


    public $CNX;

    public function __construct(){
        try {
            $this->CNX= Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar_AsignacionCarga(){
        try {
            $query= "SELECT id_Asignacion,
            id_Materia_FK,
            nombre_Materia,
            id_Usuario_KFFK,
            nombre_Usuario,
            apellido_Usuario,
            id_Curso_FKF,
            codigo_Curso,
            fecha_Asignacion
            from ASIGNACIONCARGA
            inner join Materia on Materia.id_Materia=ASIGNACIONCARGA.id_Materia_FK
            inner join Curso on Curso.id_Curso=ASIGNACIONCARGA.id_Curso_FKF
            inner join USUARIO on Usuario.id_Usuario=ASIGNACIONCARGA.id_Usuario_KFFK";
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    public function listar_Materia(){
        try {
            $query= "SELECT * from Materia";
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    public function listar_Curso(){
        try {
            $query= "SELECT * from Curso";
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    public function listar_Usuario(){
        try {
            $query= "SELECT * from Usuario where id_tipoUsuario_FK=3";
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function Obtener($id_Asignacion)
	{
		try 
		{
            $query= "SELECT id_Asignacion,
            id_Materia_FK,
            nombre_Materia,
            id_Usuario_KFFK,
            nombre_Usuario,
            apellido_Usuario,
            id_Curso_FKF,
            codigo_Curso,
            fecha_Asignacion
            from ASIGNACIONCARGA
            inner join Materia on Materia.id_Materia=ASIGNACIONCARGA.id_Materia_FK
            inner join Curso on Curso.id_Curso=ASIGNACIONCARGA.id_Curso_FKF
            inner join USUARIO on Usuario.id_Usuario=ASIGNACIONCARGA.id_Usuario_KFFK
             where id_Asignacion=?";
            $stm = $this->CNX->prepare($query);
			$stm->execute(array($id_Asignacion));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function nuevo_AsignacionCarga(AsignacionCargaModel $data){
        try {
            $query= "insert into AsignacionCarga values ('',?,?,?,?)";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->id_Materia_FK,
                                $data->id_Usuario_KFFK,
                                $data->id_Curso_FKF,
                                $data->fecha_Asignacion));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    
    public function actualizar_AsignacionCarga($data){
        try {
            $query= "UPDATE AsignacionCarga SET
                        id_Materia_FK=?,
                        id_Usuario_KFFK=?,
                        id_Curso_FKF=?,
                        fecha_Asignacion=?
                    where id_Asignacion=?";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->id_Materia_FK,
                                $data->id_Usuario_KFFK,
                                $data->id_Curso_FKF,
                                $data->fecha_Asignacion,
                                $data->id_Asignacion
                                ));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function eliminar_AsignacionCarga($id_Asignacion)
	{
		try 
		{
            $query= "DELETE FROM AsignacionCarga where id_Asignacion=?";
            $stm = $this->CNX->prepare($query);
					          

            $stm->execute(array($id_Asignacion));

		} catch (Exception $e){
            die($e ->getMessage());
        }
    
        
	}

}