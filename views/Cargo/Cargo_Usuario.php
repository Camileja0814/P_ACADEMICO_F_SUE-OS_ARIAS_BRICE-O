<?php 
session_start();
if (isset($_SESSION['Admin'])){
    $sesion = $_SESSION['Admin'];
}elseif (isset($_SESSION['Profe'])){
    $sesion = $_SESSION['Profe'];
}elseif (isset($_SESSION['Estudiante'])){
    $sesion = $_SESSION['Estudiante'];
}
if(!isset($sesion)){
    header("location: ../index.php");
 
}

?>
<?php
require_once "../core/configGeneral.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
        <title>Gestionar Carga</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
        <link rel="stylesheet" href="<?php echo SERVERURL; ?>assets/css/main.css">
        <link rel="stylesheet" href="<?php echo SERVERURL; ?>assets/css/menu_Lateral.css">
</head>

<body>

        <!-- side-bar -->
        <?php include "./modules/navlateral.php" ?>

        <!-- content-page -->

        <section class="full-box dashboard-contentPage">

                <!-- nav-bar -->
                <?php include "./modules/navbar.php" ?>


                <!-- content-page -->
                <div class="formularios">
  
  <form action="recibe.php" method="post"  > 
  
  <div class="container">
        <div>
         


      </div>
              <div class="form-group">
          <!--Pará mostrar una línea horizontal en el documento-->
          
          <!--Pará mostrar una línea horizontal en el documento-->
          <div>
              <h1 class="tituloa form-group">Cargo Usuario</h1>
              <!--Pará establecer título principal -->
          </div>
          <!--para crear contenedor-->
          
          <!--Pará mostrar una línea horizontal en el documento-->
                   <div>
               <label id="Label1" runat="server" Text="Label">ID Cargo:</label><!--Pará dar nombre al campo de texto -->

          <input name="ID Cargo" id="TextBox3" runat="server" class="form-control" type="text" placeholder="Ingrese ID del cargo" required autocomplete="on" pattern="[0-9]{1,20}"
                  title="ingrese solo numeros" /><!--Pará crear un campo de texto -->
              
              
          </div>
                   <div>
               <label id="Label2" runat="server" Text="Label">ID Usuario:</label><!--Pará dar nombre al campo de texto -->

          <input name="ID Usuario" id="TextBox3" runat="server" class="form-control" type="text" placeholder="Ingrese ID" required autocomplete="on" pattern="[0-9]{1,20}"
                  title="ingrese solo numeros" /><!--Pará crear un campo de texto -->
              
              
          </div>
                  
                  
            </div>
          <div class="form-group" id="botones">
              <!--Pará mostrar una línea horizontal en el documento-->
               <input type="submit" value="Crear" id="Crear" class="boton btn btn-info" /> <!--Pará crear un contenedor adaptable con los estilos de bootstrap-->
          <input type="submit" value="Modoficar" id="Modificar" class="boton btn btn-info" /> <!--Pará crear un botón con estilo bootstrap-->
            <input type="submit" value="Consultar" id="Consultar" class="boton btn btn-info" /> <!--Pará crear un botón con estilo bootstrap-->

          </div>


      </div>
      
    
  </form>


  </div>

                <?php include "./modules/fondo_Form.php" ?>


        </section>

        <!-- scripts -->
        <?php include "./modules/script.php" ?>

</body>

</html>