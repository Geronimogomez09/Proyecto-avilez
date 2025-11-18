<?php
$conn = mysqli_connect("localhost", "root", "", "comentarios_db");
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM comentario WHERE id=$id");
header("Location: ../index.html");
?>