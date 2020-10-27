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
    <title>Observación</title>
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
                <h1 class="tituloa ">Observación</h1>
                <?php
                    if($sesion=='A' or $sesion=='P'){
                        echo '
                        <div class="form-group" id="botones">
                            <!--Pará mostrar una línea horizontal en el documento-->
                            <a href="?c=Observacion&a=nuevo" class="boton btn btn-info botones">Nueva Observación</a>

                            <!--Pará crear un contenedor adaptable con los estilos de bootstrap-->


                        </div>
                        ';
                    }else{echo ' ';}
                ?>
                
            </div>

            <div class="tablas">
            <table id="table" data-toggle="table" data-height="auto" data-search="true" data-show-refresh="false"
                data-show-columns="true" data-buttons-toolbar=".buttons-toolbar">
                <thead>
                    <tr>
                        <th data-field="ID">ID</th>
                        <th data-field="Nombre">Nombre</th>
                        <th data-field="Apellido">Apellido</th>
                        <th data-field="fecha">Fecha</th>
                        <th data-field="tipo">Tipo</th>
                        <th data-field="descripcion">Descripción</th>
                        <th data-field="Descargos">Descargos</th>
                        <?php
                            if($sesion=='A'){
                                echo '
                                <th data-field="editar"></th>
                                <th data-field="eliminar"></th>
                                ';
                            }else{echo ' ';}
                        ?>
                        
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($this->mode->listar_Observacion() as $k ) : ?>
                    <tr>
                        <th data-field="ID" scope="row"><?php echo $k->id_Observacion; ?></th>
                        <td data-field="Nombre"><?php echo $k->nombre_Usuario; ?></td>
                        <td data-field="Apellido"><?php echo $k->apellido_Usuario; ?></td>
                        <td data-field="fecha"><?php echo $k->fecha_Observacion; ?></td>
                        <td data-field="tipo"><?php echo $k->tipo_Falta; ?></td>
                        <td data-field="descripcion"><?php echo $k->descripcion_Observacion; ?></td>
                        <td data-field="Descargos"><?php echo $k->descargos_Usuario; ?></td>
                        <?php
                            if($sesion=='A'){
                                echo '
                                <th data-field="editar">
                                    <div class="form-group" id="botones">
                                        <!--Pará mostrar una línea horizontal en el documento-->
                                        <a href="?c=Observacion&a=nuevo&id_Observacion='. $k->id_Observacion.' "  class="fas fa-user-edit fa-lg " ></a>

                                        <!--Pará crear un contenedor adaptable con los estilos de bootstrap-->


                                    </div>
                                </th>
                                <th data-field="eliminar">
                                <div class="form-group" id="botones">
                                        <!--Pará mostrar una línea horizontal en el documento-->
                                        <a onclick="javascript:return confirm(\'¿Desea eliminar el registro?\');
                                        " href="?c=Observacion&a=g_eliminar_Observacion&id_Observacion='.$k->id_Observacion.' "
                                        class="fas fa-trash-alt fa-lg"></a>
                                    

                                        <!--Pará crear un contenedor adaptable con los estilos de bootstrap-->


                                    </div>
                                </th>
                                ';
                            }else{echo ' ';}
                        ?>
                        
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