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
    <title>Materia</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>assets/css/main.css">
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>assets/css/menu_Lateral.css">
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>assets/css/main.css">
    <link href="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.css" rel="stylesheet">

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

            <div class="buttons-toolbar">
            </div>

            <div class="titles">
                <h1 class="tituloa ">Materia</h1>
                <div class="form-group" id="botones">
                    <!--Pará mostrar una línea horizontal en el documento-->
                    <a href="?c=Materia&a=nuevo" class="boton btn btn-info botones">Nueva Materia</a>

                    <!--Pará crear un contenedor adaptable con los estilos de bootstrap-->


                </div>
            </div>

            <div class="tablas">
            <table id="table" data-toggle="table" data-height="auto" data-search="true" data-show-refresh="false"
                data-show-columns="true" data-buttons-toolbar=".buttons-toolbar">
                <thead>
                    <tr>
                        <th data-field="ID">ID</th>
                        <th data-field="materia">Materia</th>
                        <th data-field="horasSemanales">Horas Semanales </th>
                        <th data-field="editar"></th>
                        <th data-field="eliminar"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($this->mode->listar_Materia() as $k ) : ?>
                    <tr>
                        <th data-field="ID" scope="row"><?php echo $k->id_Materia; ?></th>
                        <td data-field="materia"><?php echo $k->nombre_Materia; ?></td>
                        <td data-field="horasSemanales"><?php echo $k->horasSemanales_Materia; ?></td>
                        <th data-field="editar">
                            <div class="form-group" id="botones">
                                <!--Pará mostrar una línea horizontal en el documento-->
                                <a href="?c=Materia&a=nuevo&id_Materia=<?php echo $k->id_Materia;?>"  class="fas fa-user-edit fa-lg " ></a>

                                <!--Pará crear un contenedor adaptable con los estilos de bootstrap-->


                            </div>
                        </th>
                        <th data-field="eliminar">
                        <div class="form-group" id="botones">
                                <!--Pará mostrar una línea horizontal en el documento-->
                                <a onclick="javascript:return confirm('¿Desea eliminar el registro?');
                                " href="?c=Materia&a=g_eliminar_Materia&id_Materia=<?php echo $k->id_Materia;?>"
                                 class="fas fa-trash-alt fa-lg"></a>
                               

                                <!--Pará crear un contenedor adaptable con los estilos de bootstrap-->


                            </div>
                        </th>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
</div>
            <script src="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.js"></script>










        </div>

        </div>

        <?php include "./views/modules/fondo_Form.php" ?>


    </section>

    <!-- scripts -->
    <?php include "./views/modules/script.php" ?>

</body>

</html>