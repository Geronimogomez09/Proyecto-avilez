<?php
$conn = mysqli_connect("localhost", "root", "", "comentarios_db");
$nombre = $_POST['nombre'];
$valor = $_POST['valor'];
$comentario = $_POST['coment'];
$id_receta = $_POST['id_receta'];
mysqli_query($conn, "INSERT INTO comentario (nombre, valor, coment, id_receta) VALUES ('$nombre', '$valor', '$comentario', '$id_receta')");
header("location: ../index.html");
?>