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
        <title>Gestion Calificación</title>
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
                    action="?c=Calificacion&a=guardar_Calificacion"
                    method="post"
                    class="FormularioAjax"
                    data-form="save"
                    autocomplete="off"
                    enctype="multipart/form-data">

                    <div>
                        <h1 class="page-header tituloa" style="margin-top:20px">
                            <?php echo $alm->id_Calificacion != null ? $alm->id_Calificacion : 'Nueva Calificacion'; ?>
                        </h1>

                        <!--Pará establecer título principal -->
                    </div>

                    <!--para crear contenedor-->
                    <input
                        type="hidden"
                        name="id_Calificacion"
                        value="<?php echo $alm->id_Calificacion; ?>"/>

                   
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Materia / Estudiante / Curso</label>
                        </div>
                        <select
                            class="custom-select selects"
                            id="inputGroupSelect01"
                            style="background-color: #ffffff00;"
                            name="id_Asignacion_FK">
                            <option selected="selected" value="<?php echo $alm->id_Asignacion; ?>">
                                <?php echo $alm->id_Calificacion != null ? ($alm->nombre_Usuario.'  '.$alm->apellido_Usuario.' - '.$alm->nombre_Materia.' - '.$alm->codigo_Curso) : '--Seleccione el Usuario / Materia /Curso--'; ?>
                            </option>
                            <?php foreach ($this->mode->listar_Usuario() as $k ) : ?>
                            <option value="<?php echo $k->id_Asignacion ; ?>"><?php echo $k->nombre_Usuario.'  '.$k->apellido_Usuario.' - '.$k->nombre_Materia.' - '.$k->codigo_Curso; ?></option>

                            <?php endforeach; ?>

                           
                        </select>
                    </div>
                   
                    <div class="form-group">
                        <!--Pará crear un contenedor adaptable con los estilos de bootstrap-->
                        <label>Nota del Periodo 1</label>
                        <!--Pará dar nombre al campo de texto -->

                        <input
                        value="<?php echo $alm->notaPeriodo1_Calificacion; ?>"
                            name="notaPeriodo1_Calificacion"
                            class="form-control"
                            type="text"
                            placeholder="Ingrese Nota de 1 a 5"
                            required="required"
                            
                            pattern="[0-9]{1,5}"
                            title="ingrese solo numeros"/>
                        <!--Pará crear un campo de texto -->
                    </div>

                    <div class="form-group">
                        <!--Pará crear un contenedor adaptable con los estilos de bootstrap-->
                        <label>Nota del Periodo 2</label>
                        <!--Pará dar nombre al campo de texto -->

                        <input
                        value="<?php echo $alm->notaPeriodo2_Calificacion; ?>"
                            name="notaPeriodo2_Calificacion"
                            class="form-control"
                            type="text"
                            placeholder="Ingrese Nota de 1 a 5"
                            required="required"
                            
                            pattern="[0-9]{1,5}"
                            title="ingrese solo numeros"/>
                        <!--Pará crear un campo de texto -->
                    </div>

                    <div class="form-group">
                        <!--Pará crear un contenedor adaptable con los estilos de bootstrap-->
                        <label>Nota del Periodo 3</label>
                        <!--Pará dar nombre al campo de texto -->

                        <input
                        value="<?php echo $alm->notaPeriodo3_Calificacion; ?>"
                            name="notaPeriodo3_Calificacion"
                            class="form-control"
                            type="text"
                            placeholder="Ingrese Nota de 1 a 5"
                            required="required"
                            
                            pattern="[0-9]{1,5}"
                            title="ingrese solo numeros"/>
                        <!--Pará crear un campo de texto -->
                    </div>

                  
                    <div class="form-group">
                        <label id="Label1" runat="server" text="Label">
                            Fecha Asignación:</label>
                        <!--Pará dar nombre al campo de texto -->

                        <input
                            value="<?php echo $alm->fechaRegistro_Calificacion; ?>"
                            name="fechaRegistro_Calificacion"
                            class="form-control"
                            type="date"
                            required="required"
                            title="ingrese la fecha"/>
                        <!--Pará crear un campo de texto -->

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