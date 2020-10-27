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
        <title>Gestionar Cargo</title>
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
                    action="?c=Cargo&a=guardar_Cargo"
                    method="post"
                    class="FormularioAjax"
                    data-form="save"
                    autocomplete="off"
                    enctype="multipart/form-data">

                    <div>
                        <h1 class="page-header tituloa" style="margin-top:20px">
                            <?php echo $alm->id_Cargo != null ? $alm->nombre_Cargo : 'Nuevo Cargo'; ?>
                        </h1>

                        <!--Pará establecer título principal -->
                    </div>

                    <!--para crear contenedor-->
                    <input type="hidden" name="id_Cargo" value="<?php echo $alm->id_Cargo; ?>"/>

                    <div class="form-group">

                        <label id="Label2" runat="server" text="Label">Nombre Cargo:</label>
                        <!--Pará dar nombre al campo de texto -->

                        <input
                            name="nombre_Cargo"
                            id="TextBox4"
                            runat="server"
                            class="form-control"
                            type="text"
                            placeholder="Ingrese Nombre"
                            pattern="[a-zA-ZÑñ]{1,20}"
                            title="ingrese solo letras
                        "
                            value="<?php echo $alm->nombre_Cargo; ?>"
                            required="required"/>

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