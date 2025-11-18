<?php
$conn = mysqli_connect("localhost", "root", "", "comentarios_db");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$valor = $_POST['valor'];
$comentario = $_POST['coment'];

mysqli_query($conn, "
    UPDATE comentario 
    SET nombre='$nombre', valor='$valor', coment='$comentario' 
    WHERE id='$id'
");

header("location: ../index.html");
?>
