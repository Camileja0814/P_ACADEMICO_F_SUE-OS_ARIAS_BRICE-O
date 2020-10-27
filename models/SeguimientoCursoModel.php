<?php
//Creamos el modelo para el formulario de SeguimientoCurso
class SeguimientoCursoModel{
    //Declaramos los atributos del model que son iguales a los campos de Usuario en la base de datos
    public $id_Seguimiento;
    public $id_Usuario_FKFKF;
    public $id_Curso_FK;
    public $fecha_Seguimiento;
    public $id_Salon_FK;
    public $nombre_Usuario;
    public $codigo_Curso;
    public $nombre_Salon;

    public $CNX;

    public function __construct(){
        try {
            $this->CNX= Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar_SeguimientoCurso(){
        try {
            $query= "SELECT id_Seguimiento,
            nombre_Usuario,
            id_Usuario_FKFKF,
            id_Salon_FK,
            id_Curso_FK,
            apellido_Usuario,
            codigo_Curso,
            fecha_Seguimiento,
            nombre_Salon
            from Usuario  inner join seguimientocurso on seguimientocurso.id_Usuario_FKFKF=Usuario.id_Usuario
            inner join Salon on Salon.id_Salon=seguimientocurso.id_Salon_FK
            inner join Curso on Curso.id_Curso=seguimientocurso.id_Curso_FK ";
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
    public function listar_Salon(){
        try {
            $query= "SELECT * from Salon";
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function Obtener($id_Seguimiento)
	{
		try 
		{
            $query= "SELECT id_Seguimiento,
            nombre_Usuario,
            apellido_Usuario,
            id_Usuario_FKFKF,
            id_Salon_FK,
            id_Curso_FK,
            codigo_Curso,
            fecha_Seguimiento,
            nombre_Salon
            from Usuario  inner join seguimientocurso on seguimientocurso.id_Usuario_FKFKF=Usuario.id_Usuario
            inner join Salon on Salon.id_Salon=seguimientocurso.id_Salon_FK
            inner join Curso on Curso.id_Curso=seguimientocurso.id_Curso_FK
             where id_Seguimiento=?";
            $stm = $this->CNX->prepare($query);
			$stm->execute(array($id_Seguimiento));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function nuevo_SeguimientoCurso(SeguimientoCursoModel $data){
        try {
            $query= "insert into SEGUIMIENTOCURSO values ('',?,?,?,?)";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->id_Usuario_FKFKF,
                                $data->id_Curso_FK,
                                $data->fecha_Seguimiento,
                                $data->id_Salon_FK));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    
    public function actualizar_SeguimientoCurso($data){
        try {
            $query= "UPDATE SEGUIMIENTOCURSO SET
                        id_Usuario_FKFKF=?,
                        id_Curso_FK=?,
                        fecha_Seguimiento=?,
                        id_Salon_FK=?
                    where id_Seguimiento=?";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->id_Usuario_FKFKF,
                                $data->id_Curso_FK,
                                $data->fecha_Seguimiento,
                                $data->id_Salon_FK,
                                $data->id_Seguimiento
                                ));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function eliminar_SeguimientoCurso($id_Seguimiento)
	{
		try 
		{
            $query= "DELETE FROM SEGUIMIENTOCURSO where id_Seguimiento=?";
            $stm = $this->CNX->prepare($query);
					          

            $stm->execute(array($id_Seguimiento));

		} catch (Exception $e){
            die($e ->getMessage());
        }
    
        
	}

}