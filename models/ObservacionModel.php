
<?php
//Creamos el modelo para el formulario de Cargo
class ObservacionModel{
//Declaramos los atributos del model que son iguales a los campos de cargo en la base de datos
public $id_Observacion;
public $fecha_Observacion;
public $tipo_Falta;
public $descripcion_Observacion;
public $descargos_Usuario;
public $id_Usuario_KF;
public $nombre_Usuario;



    public $CNX;




    public function __construct(){
        try {
            $this->CNX= Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar_Observacion(){
        try {
            $query= "SELECT * from Observacion inner join Usuario on usuario.id_Usuario=observacion.id_Usuario_FK" ;
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function listar_Usuario(){
        try {
            $query= "SELECT * from Usuario where id_tipoUsuario_FK=3" ;
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    public function Obtener($id_Observacion)
	{
		try 
		{
            $query= "SELECT * FROM Observacion inner join Usuario on usuario.id_Usuario=Observacion.id_Usuario_FK WHERE id_Observacion = ?";
            $stm = $this->CNX->prepare($query);
			$stm->execute(array($id_Observacion));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function nuevo_Observacion(ObservacionModel $data){
        try {
            $query= "INSERT INTO observacion VALUES ('',?,?,?,?,?)";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array($data->fecha_Observacion,
                                $data->tipo_Falta,
                                $data->descripcion_Observacion,
                                $data->descargos_Usuario,
                                $data->id_Usuario_KF      
                                  ));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }
    
    public function actualizar_Observacion( $data){
        try {
            $query= "UPDATE Observacion SET
                        fecha_Observacion=?,
                        tipo_Falta=?,
                        descripcion_Observacion=?,
                        descargos_Usuario=?,
                        id_Usuario_FK=?

                    where id_Observacion=?";
            $stm = $this->CNX->prepare($query);
            $stm->execute(array(
                                $data->fecha_Observacion,
                                $data->tipo_Falta,
                                $data->descripcion_Observacion,
                                $data->descargos_Usuario,
                                $data->id_Usuario_KF,
                                $data->id_Observacion));
            //return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e ->getMessage());
        }
    }

    public function eliminar_Observacion($id_Observacion)
	{
		try 
		{
            $query= "DELETE  FROM observacion  WHERE id_Observacion = ?";
            $stm = $this->CNX->prepare($query);
					          

            $stm->execute(array($id_Observacion));

		} catch (Exception $e){
            die($e ->getMessage());
        }
    
        
	}

}