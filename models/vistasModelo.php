<?php

    class vistasModelo{

        protected function obtener_vistas_modelo($views){

            $listaBlanca =["Acerca","otro","AdminAcademico","AsignacionCarga","Calificaciones","Cargo",
            "Cargo_Usuario","Curso","Especialidad","Estudiante","Inasistencias","Materia",
            "Observacion","Profesor","RegistroObrservacion","Salon","SeguimientoCurso",
            "Tipousuario","UsuarioCalificacion","UsuarioInasistencia","GestionarUsuarios"];

            if (in_array($views,$listaBlanca)) {
                
                if (is_file("views/".$views.".php")) {
                    
                    $contenido = "views/".$views.".php";

                } else {
                   
                    $contenido = "index";

                }                

            } elseif ($views=="index") {
                
                $contenido = "index";

            } else {
                
                $contenido = "index";

            }
            
            return $contenido;

        }

    }   

?>