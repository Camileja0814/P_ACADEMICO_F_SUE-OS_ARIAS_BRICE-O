<!DOCTYPE html>
<html lang="es">
<head>
  <title>Sueños de Luz</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>assets/css/main.css">
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>assets/css/menu_Lateral.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
   
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
 </head>
<body>
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>assets/css/menu_Lateral.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
   
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
 
  <?php 
    require_once "./controllers/vistasControlador.php";
    
    $vt = new vistasControlador();
    $vistasR= $vt->obtener_vistas_controlador();
    if ($vistasR=="index") :
      header('Location: http://localhost/P_ACADEMICO_F_SUE%C3%91OS_ARIAS_BRICE%C3%91O/Acerca');
     else :
      # code...
      ?>

<!-- side-bar -->
<?php include "./views/modules/navlateral.php" ?>

<!-- content-page -->

<section class="full-box dashboard-contentPage">

<!-- nav-bar -->
<?php include "./views/modules/navbar.php" ?>


<!-- content-page -->
<?php require_once $vistasR;?>
 <?php include "./views/modules/fondo_Form.php" ?>
 

</section>
     <?php endif;?>
<!-- scripts -->
<?php include "./views/modules/script.php" ?>

</body>
</html>