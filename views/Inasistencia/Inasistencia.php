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
        <title>Inasistencia</title>
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
                    action="?c=Inasistencia&a=guardar_Inasistencia"
                    method="post"
                    class="FormularioAjax"
                    data-form="save"
                    autocomplete="off"
                    enctype="multipart/form-data">

                    <div>
                        <h1 class="page-header tituloa" style="margin-top:20px">
                            <?php echo $alm->id_Inasistencia != null ? $alm->id_Inasistencia : 'Nueva Inasistencia'; ?>
                        </h1>

                        <!--Pará establecer título principal -->
                    </div>

                    <!--para crear contenedor-->
                    <input
                        type="hidden"
                        name="id_Inasistencia"
                        value="<?php echo $alm->id_Inasistencia; ?>"/>

                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Usuario</label>
                        </div>
                        <select
                            class="custom-select selects"
                            id="inputGroupSelect01"
                            style="background-color: #ffffff00;"
                            name="id_Usuario_FKF">
                            <option selected="selected" value="<?php echo $alm->id_Usuario_FKF; ?>">
                                <?php echo $alm->id_Inasistencia != null ? ($alm->nombre_Usuario.' '.$alm->apellido_Usuario) : '--Seleccione el Usuario--'; ?>
                            </option>

                            <?php foreach ($this->mode->listar_Usuario() as $k ) : ?>
                            <option value="<?php echo $k->id_Usuario; ?>"><?php echo $k->nombre_Usuario.' '.$k->apellido_Usuario; ?></option>

                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <!--Pará crear un contenedor adaptable con los estilos de bootstrap-->
                        <label>Seleccione la Fecha de Inasistencia</label>
                        <!--Pará dar nombre al campo de texto -->

                        <input
                        name="fecha_Inasistencia"
                        value="<?php echo $alm->fecha_Inasistencia; ?>"
                            class="form-control"
                            type="date"
                            required="required"
                            title="ingrese solo numeros"/>
                        <!--Pará crear un campo de texto -->
                    </div>

                    <div class="form-group">
                        <!--Pará crear un contenedor adaptable con los estilos de bootstrap-->
                        <label>Excusa de la Inasistencia</label>
                        <!--Pará dar nombre al campo de texto -->

                        <textarea
                            name="excusa_Inasistencia"
                            class="form-control"
                            placeholder="--Escriba aqui la Excusa--"
                            required="required"><?php echo $alm->excusa_Inasistencia; ?></textarea>
                        <!--Para crear un are de texto -->
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