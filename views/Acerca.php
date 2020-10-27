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
    <title>Acerca de</title>
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
<?php include "./views/modules/cargador.php" ?>
    <!-- side-bar -->
    <?php include "./views/modules/navlateral.php" ?>

    <!-- content-page -->

    <section class="full-box dashboard-contentPage">

        <!-- nav-bar -->
        <?php include "./views/modules/navbar.php" ?>


        <!-- content-page -->
        <div class="ejemplo">
<link rel="stylesheet" href="<?php echo SERVERURL;?>assets/css/Redes.css">
<!--seccion de la mision-->
<section class="card" id="Servicios">
    <!--Para crear contenedor de clase tarjeta-->
    <div class="card-header">
        <!--Para poner emcabezado a la tarjeta-->
        <h1>Servicios</h1>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <!---Para escribir una cita textual del parrafo-->
            <p>
                <!--Para crear parrafo-->
                <ul>
                    <li>Transporte</li>
                    <li>Clases extracurriculares</li>
                    <li>Alimentación</li>
                    <li>Otros beneficios</li>
                </ul>
            </p>

        </blockquote>
    </div>
</section>

<!--seccion de la mision-->
<section class="card" id="Mision">
    <!--Para crear contenedor de clase tarjeta-->
    <div class="card-header">
        <!--Para poner emcabezado a la tarjeta-->
        <h1>Misión</h1>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <!---Para escribir una cita textual del parrafo-->
            <p>
                <!--Para crear parrafo-->
                El Jardín Fundación Sueños de Luz brinda a los niños y a las niñas una educación inicial
                de calidad y calidez;
                que les permita un desarrollo armónico e integral y reconociéndolos como sujetos de
                derechos capaces de crear y
                participar con libertad, teniendo como principal fundamento los valores y pilares como:
                El arte, la literatura,
                el juego y la exploración del medio.
            </p>

        </blockquote>
    </div>
</section>

<!--seccion de la vision-->
<section class="card" id="Vision">
    <!--Para crear contenedor de clase tarjeta-->
    <div class="card-header">
        <!--Para poner emcabezado a la tarjeta-->
        <h1>Visión</h1>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <!---Para escribir una cita textual del parrafo-->
            <p>
                <!--Para crear parrafo-->
                El Jardín fundación Sueños de Luz será reconocido al 2020 como una institución que
                brinda a los niños y a las niñas
                una pedagogía basada en el amor y el reconocimiento de los derechos, contando para esto
                con espacios adecuados y
                seguros que permitan e pleno desarrollo de todas las habilidades y con un equipo de
                personas comprometidas por el
                desarrollo integral de los niños y las niñas de los diferentes niveles.
            </p>


        </blockquote>
    </div>
</section>

<!--seccion de principios-->
<section class="card" id="Principios">
    <!--Para crear contenedor de clase tarjeta-->
    <div class="card-header">
        <!--Para poner emcabezado a la tarjeta-->
        <h1>Principios</h1>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <!---Para escribir una cita textual del parrafo-->
            <ul>
                <!--Para crear lista desordenada-->
                <li>
                    <h3>Principio de integralidad</h3>

                    <p>
                        El Jardín Fundación Sueños de Luz concibe la acción pedagógica como un proceso
                        integral en él se abarca
                        todas las dimensiones del desarrollo del niño y la niña, la personal social, lo
                        espiritual, lo cognitivo,
                        lo comunicativo, lo corporal y lo artístico, para potencializarlas y alcanzar
                        niveles de acciones y aprendizajes
                        significativos, necesarios para su desenvolvimiento en sociedad como un ser
                        humano digno, pleno, autónomo y libre.
                        Para lograr un desarrollo integral en los niños y niñas es necesario, en los
                        primeros años de vida, contar con
                        una apropiada nutrición, atención en salud, amor, estimulación psicológica e
                        interacciones significativas con
                        sus padres y con otros adultos que ejercen algún tipo de influencia en su
                        proceso de crianza.
                    </p>

                    <p>
                        Es importante que las maestras en el jardín infantil les motiven e inviten a
                        conocer un mundo, mágico donde
                        ellos y ellas pueden explorar, experimentar, descubrir nuevas posibilidades de
                        aprendizajes por medio de juego
                        que es el eje dinamizador en los aprendizajes de los niños y niñas en la primera
                        infancia, donde se les fortaleza
                        cada área de desarrollo. Se lleva un hilo conductor en el trabajo pedagógico con
                        ellos y ellas, potenciando sus
                        capacidades que les faciliten el aprendizaje y se vean reflejados en su
                        desarrollo integral como seres humanos
                        plenos, por tanto, se den orientar a la solución de problemas abiertos,
                        sencillos y se van complejizando según
                        las edades, características y ritmos de aprendizaje que tienen los niños y las
                        niñas y van aprendiendo a resolver
                        situaciones en los contextos naturales relacionados con su mundo físico,
                        afectivo, cognitivo, social y cultural,
                        con una clara intencionalidad pedagógica y didáctica.
                    </p>
                </li>


                <li>
                    <h3>Principio de participación</h3>

                    <p>
                        El jardín infantil busca una intervención activa, consciente y permanente de las
                        familias y el talento humano
                        que labora en el jardín infantil con el objeto de garantizar a los niños y las
                        niñas su desarrollo armónico e
                        integral y el ejercicio pleno de sus derechos. Se parte de reconocer que la
                        familia, cualquiera que sea su tipología,
                        es el núcleo primario en el cual los niños han iniciado sus procesos de
                        comunicación, aprendizaje, socialización
                        y participación; al igual que ha sido el espacio en el que se han construido los
                        primeros vínculos, relaciones
                        afectivas y significaciones hacia si mismo y hacia los otros.
                    </p>
                </li>

                <li>
                    <h3>Principio de la Lúdica </h3>

                    <p>
                        Para el jardín Fundación Sueños de Luz el principio de la lúdica se centra en el
                        juego como dinamizador de
                        la vida de los niños y de las niñas mediante el cual constituye conocimientos,
                        se encuentra consigo mismo, con
                        el mundo físico y social, desarrolla iniciativas propias, comparte sus
                        intereses, desarrolla habilidades de
                        comunicación, construye y se apropia de normas. Asimismo, reconoce que el gozo,
                        el entusiasmo, el placer de
                        crear, recrear y de generar significados deben construir el centro de toda
                        acción realizada por y para el niño
                        y niña, en sus entornos familiar, natural, social, étnico y cultural.
                    </p>

                </li>
            </ul>

        </blockquote>
    </div>
</section>

<!--seccion de objetivo general-->
<section class="card" id="Obj_G">
    <div class="card-header">
        <h1>Objetivo General</h1>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <p>
                Fomentar en los niños y las niñas el amor y el respeto en igualdad de condiciones a
                través de diversas actividades
                lúdicas que conlleven al reconocimiento del yo y del otro como sujetos activos de
                derechos, de esta manera se
                garantizan ambientes propicios llenos de amor y respeto. Así mismo se buscará
                sensibilizar a las familias de la
                importancia durante el proceso de desarrollo integral de sus hijos e hijas.

            </p>


        </blockquote>
    </div>

</section>

<!--seccion de objetivos especificos-->
<section class="card" id="Obj_E">
    <div class="card-header">
        <h1>Objetivos Específicos</h1>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <ul>
                <li>
                    <p>
                        Atender integralmente a los niños y a las niñas articulando acciones
                        relacionadas con el cuidado calificado.
                    </p>
                </li>


                <li>
                    <p>
                        Brindar espacios adecuados y seguros, provistos de calidad en recursos humanos,
                        físicos y material didáctico.
                    </p>
                </li>


                <li>
                    <p>
                        Crear ambientes enriquecidos que desarrollen en los niños y las niñas su
                        creatividad e imaginación.
                    </p>
                </li>


                <li>
                    <p>
                        Favorecer el desarrollo de la identidad de los niños y las niñas, mediante el
                        buen trato que reconozca la
                        diversidad y sus diferencias de género, sociales y culturales.
                    </p>
                </li>

                <li>
                    <p>
                        Garantizar la presencia del juego, el arte, la literatura y la exploración del
                        medio como condición
                        indispensable para el potenciamiento del desarrollo de los niños y las niñas.
                    </p>
                </li>

                <li>
                    <p>
                        Proporcionar con el buen ejemplo el cumplimiento de los derechos y los deberes
                        fundamentales que establecemos
                        en nuestro proyecto por medio del afecto, el respeto y la interacción a través
                        de la lúdica.
                    </p>
                </li>
            </ul>

        </blockquote>
    </div>
</section>

<div>
    <!-- Redes Sociales -->
    <ul class="social-networks square spin-icon">
        <li><a href="https://twitter.com/pasitoapasoch" class="icon-twitter" target="_Blank" id="Tw">Twitter</a></li>
        <li><a href="https://www.facebook.com/ARCAsoft-110012580371484" class="icon-facebook" target="_Blank"
                id="Fc">Facebook</a></li>
        <li><a href="https://www.pinterest.es/pin/740701469936704769/" class="icon-pinterest" target="_Blank"
                id="Pt">Pinterest</a></li>
        <li><a href="https://www.instagram.com/origami_jardines/?hl=es-la" class="icon-instagram" target="_Blank"
                id="Ig">Instagram</a></li>
    </ul>
   
</div>
</div>

        <?php include "./views/modules/fondo_Form.php" ?>


    </section>

    <!-- scripts -->
    <?php include "./views/modules/script.php" ?>

</body>

</html>
