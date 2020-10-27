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
        <title>Gestionar Especialidad</title>
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
                    action="?c=Especialidad&a=guardar_Especialidad"
                    method="post"
                    class="FormularioAjax"
                    data-form="save"
                    enctype="multipart/form-data">

                    <div>
                        <h1 class="page-header tituloa" style="margin-top:20px">
                            <?php echo $alm->id_Especialidad != null ? $alm->nombre_Especialidad : 'Nuevo Especialidad'; ?>
                        </h1>
                    </div>

                    <!--para crear contenedor-->
                    <input
                        type="hidden"
                        name="id_Especialidad"
                        value="<?php echo $alm->id_Especialidad; ?>"/>
                    <div class="form-group">

                        <label id="Label2" runat="server" text="Label">Nombre Especialidad:</label>
                        <!--Pará dar nombre al campo de texto -->

                        <input
                            value="<?php echo $alm->nombre_Especialidad; ?>"
                            name="nombre_Especialidad"
                            id="TextBox4"
                            runat="server"
                            class="form-control"
                            type="text"
                            placeholder="Ingrese Nombre"
                            required="required"
                            pattern="[a-zA- ZÑñ]{1,20}"
                            title="ingrese solo letras"/>
                        <!--Pará crear un campo de texto -->

                    </div>

                    <div class="form-group" id="botones">
                        <input type="submit" value="Guardar" id="Crear" class="boton btn btn-info"/>

                    </div>

                </form>
            </div>

            <?php include "./views/modules/fondo_Form.php" ?>

        </section>

        <!-- scripts -->
        <?php include "./views/modules/script.php" ?>

    </body>

</html>