<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
sesion_star();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect('localhost','root','','login');

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:home.php");

}else{
    ?>
    <?php
    include("index.php");
    ?>
    <h1>ERROR AL CONECTAR LA BASE DE DATOS</h1>
    <?php
}

mysqli_free_result($resultado);
mysqli_close($conexion);