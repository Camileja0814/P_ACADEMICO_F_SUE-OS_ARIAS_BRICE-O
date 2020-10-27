<?php 
session_start();
$nombre=$_SESSION['nombre'];
$id=$_SESSION['id'];
if (isset($_SESSION['Admin'])){
    $sesion = 'A';
}elseif (isset($_SESSION['Profe'])){
    $sesion = 'P';
}elseif (isset($_SESSION['Estudiante'])){
    $sesion = 'E';
}
if(!isset($sesion)){
    header("location:?c=Login&a=Index");
    
}else {
    
}

?>
<?php
require_once "./core/configGeneral.php";
?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Observacion</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link
            href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600'
            rel='stylesheet'
            type='text/css'>
        <link
            href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
            rel="stylesheet">
        <link
            rel='stylesheet'
            href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
        <link
            rel='stylesheet'
            href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
        <link
            rel="stylesheet"
            href="<?php echo SERVERURL; ?>assets/css/menu_Lateral.css">
        <link rel="stylesheet" href="<?php echo SERVERURL; ?>assets/css/main.css">
    </head>

    <body>
        <?php include "./views/modules/cargador.php" ?>

        <!-- side-bar -->
        <?php include "./views/modules/navlateral.php" ?>

        <!-- content-page -->

        <section class="full-box dashboard-contentPage">

            <!-- nav-bar -->
            <?php include "./views/modules/navbar.php" ?>

            <!-- content-page -->
            <div class="container">
                <form
                    action="?c=Observacion&a=guardar_Observacion"
                    method="post"
                    class="FormularioAjax"
                    data-form="save"
                    autocomplete="off"
                    enctype="multipart/form-data">

                    <div>
                        <h1 class="page-header tituloa" style="margin-top:20px">
                            <?php echo $alm->id_Observacion != null ? $alm->tipo_Falta : 'Nueva Observación'; ?>
                        </h1>

                        <!--Pará establecer título principal -->
                    </div>

                    <!--para crear contenedor-->
                    <input type="hidden" name="id_Observacion" value="<?php echo $alm->id_Observacion; ?>"/>
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Usuario</label>
                            </div>
                            <select  class="custom-select selects" id="inputGroupSelect01"
                                style="background-color: #ffffff00;" name="id_Usuario_KF">
                                <option selected value="<?php echo $alm->id_Usuario_FK; ?>">
                                <?php echo $alm->id_Observacion != null ? ($alm->nombre_Usuario.' '.$alm->apellido_Usuario) : '--Seleccione el Usuario--'; ?>
                            </option>
                                
                                <?php foreach ($this->mode->listar_Usuario() as $k ) : ?>
                                    <option value="<?php echo $k->id_Usuario; ?>"><?php echo $k->nombre_Usuario.' '.$k->apellido_Usuario; ?></option>
                        
                                <?php endforeach; ?>

                            </select>
                        </div>
                    <div class="form-group">
                        <!--Pará crear un contenedor adaptable con los estilos de bootstrap-->

                        <label for="nombre">Seleccione la Fecha de la Observación</label>
                        <!--Pará dar nombre al campo de texto -->

                        <input
                        value="<?php echo $alm->fecha_Observacion; ?>"
                            name="fecha_Observacion"
                            type="date"
                            class="form-control"
                            required="required"/>
                        <!--Pará crear un campo de texto -->

                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01" required="required">Tipo de Falta</label>
                        </div>
                        <select
                        value="<?php echo $alm->tipo_Falta; ?>"
                            name="tipo_Falta"
                            class="custom-select selects"
                            id="inputGroupSelect01"
                            required="required"
                            style="background-color: #ffffff00;">
                            <option selected value="<?php echo $alm->tipo_Falta; ?>">
                                <?php
                                if($alm->id_Observacion != null){
                                    if($alm->tipo_Falta == "Leve"){
                                         echo "Leve";
                                        }elseif($alm->tipo_Falta == "Grave"){
                                             echo "Grave";
                                            }elseif($alm->tipo_Falta == "Gravisima"){
                                                 echo "Gravisima";
                                                }
                                }else{echo "--Seleccione el tipo de la Falta--";}   
                                    
                                
                                 ?>
                            <option value="Leve">Leve</option>
                            <option value="Grave">Grave</option>
                            <option value="Gravisima">Gravisima</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descripciòn Observaciòn</label>
                        <textarea
                        
                            name="descripcion_Observacion"
                            class="form-control"
                            id="exampleFormControlTextarea1"
                            required="required"
                            placeholder="Ingrese descripción"
                            rows="3"><?php echo $alm->descripcion_Observacion; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descargos Usuarios</label>
                        <textarea
                        
                            name="descargos_Usuario"
                            class="form-control"
                            id="exampleFormControlTextarea1"
                            required="required"
                            placeholder="Ingrese descripción"
                            rows="3"><?php echo $alm->descargos_Usuario; ?></textarea>
                    </div>

                    <div class="form-group" id="botones">
                        <!--Pará mostrar una línea horizontal en el documento-->
                        <input type="submit" value="Guardar" id="Crear" class="boton btn btn-info"/>
                        <!--Pará crear un contenedor adaptable con los estilos de bootstrap-->

                    </div>

                </form>
            </div>

            <?php include "./views/modules/fondo_Form.php" ?>

        </section>

        <!-- scripts -->
        <?php include "./views/modules/script.php" ?>

    </body>

</html>