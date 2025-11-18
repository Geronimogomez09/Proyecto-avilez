<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Insert form</title>
</head>
<body>
    <h1 class="m-3">Agregar alumno</h1>
    <form action="insertar.php" method="POST" class="mx-3 p-2" style="width:1000px">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" required>
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">valor</label>
            <input type="number" name="valor" class="form-control" id="valor" required>
        </div>
        <div class="mb-3">
            <label for="coment" class="form-label">comentario</label>
            <input type="text" name="coment" class="form-control" id="coment" required>
        </div>
        <div class="mb-3">
            <input type="number" name="id_receta" class="form-control" name="id_receta" value="2" required>
        </div>
        <button type="submit" class="btn btn-outline-dark">Guardar</button>
        <a class="btn btn-outline-dark m-3" href="index.php" role="button">Volver</a>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>