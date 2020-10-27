<?php
session_start();
$user_Usuario = $_POST['user'];
$password_Usuario = $_POST['password'];
$user_U="Admin";
$password_U="Admin";


if ($user_Usuario==$user_U && $password_Usuario==$password_U) {
    $_SESSION['username'] = $user_U;
    echo  "<script> alert ('Bienvenido $user_Usuario');
        location.href = '?c=Acerca';
        </script>";
}
else {
    echo "<script> alert ('No fue posible iniciar sesión, intente nuevamente');
    location.href = '?c=Login&a=Index';
    </script>";
}
?>