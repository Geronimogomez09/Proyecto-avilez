<?php
$conn = mysqli_connect("localhost", "root", "", "comentarios_db");
$resultado = mysqli_query($conn, "SELECT * FROM comentario where id_receta=2");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asado Argentino Tradicional</title>
    <link rel="stylesheet" href="recetas.css">
    <link rel="icon" href="../imagenes/principal/Logo.png">
</head>

<body>
            <aside class="sidebar" id="sidebar">
            <div class="sidebar-top">
                <div class="brand">
                    <!-- Logo redondeado; la imagen real debe estar en imagenes/Logo.png -->
                    <img src="../imagenes/principal/Logo.png" alt="Logo" class="logo-img" />
                    <div class="brand-text">
                        <h1>Kitty claus</h1>
                        <small>¡Recetas Especiales!</small>
                    </div>
                </div>

                <!-- NAV: tarjetas minimalistas -->
                <nav class="nav-cards" aria-label="Géneros de comida">
                    <h2 class="nav-title h2">Secciones</h2>
                    <div class="nav-items">
                        <a href="#div1" class="nav-item">Autor</a>
                        <a href="#div2" class="nav-item">Ingredientes</a>
                        <a href="#div3" class="nav-item">Receta</a>
                        <a href="#opiniones" class="nav-item">Calificaciones</a>
                    </div>
                    <nav class="nav-cards">
                    <h2 class="nav-title h2">Volver a  inicio</h2>
                    <div class="nav-items">
                        <a href="../index.html" class="nav-item">Volver</a>
                    </div>
                    <h2 class="nav-title h2">Galeria:</h2>
                    <div class="nav-items">
                        <a href="../galeria.html" class="nav-item">Ir galeria</a>
                    </div>
                    </nav>
                </nav>
            </div>

            <!-- Anuncio -->
            <div class="sidebar-mid">
                <div class="anuncio">
                    <h3>Anuncio</h3>
                    <p>Nueva sección: recetas fáciles en 30 minutos.
                        Próximamente: videos.</p>
                </div>
            </div>

            <!-- Login vertical abajo -->
            
        </aside>
        <aside class="contenido">
    <main>
        <div class="imagen">
            <img src="../imagenes/bizcochuelo_de_vainilla.webp" alt="Bizcochuelo_de_Vainilla">
            <div class="descripcion">
            <h1>Bizcochuelo de Vainilla</h1>
            <p>
                Esponjoso y aromático, este bizcochuelo es la base perfecta para tortas o simplemente para acompañar un mate o café.
            </p>
            </div>
        </div>
    <div class="parent">
        <div class="div1" id="div1">           
        <h2>Autor</h2>
        <h3>Lautaro Martínez </h3>
        <img src="../imagenes/principal/chef_lautaro.jpeg" alt="Imagen_chef_lautaro">
        <p>
            Lautaro Martínez es un chef creativo y apasionado por la cocina, conocido por su habilidad para transformar ingredientes simples en experiencias gastronómicas memorables. Su estilo combina técnicas clásicas con innovación, ofreciendo platos que sorprenden tanto por sabor como por presentación.
        </p>
        </div>
        <div class="div2" id="div2">    
        <h2>Ingredientes</h2>
        <h3>Para el Bizcochuelo</h3>
            <ul>
                <li>4 huevos</li>
                <li>200 g de azúcar</li>
                <li>200 g de harina leudante</li>
                <li>1 cucharadita de esencia de vainilla</li>
                <li>100 ml de leche</li>
                <li>100 ml de aceite</li>
            </ul>
        </div>
        <div class="div3" id="div3">
                <h2>Receta</h2>
            <ol>
                <li>Batir los huevos con el azúcar hasta que la mezcla duplique su volumen.</li>
                <li>Agregar la vainilla, la leche y el aceite, mezclando suavemente.</li>
                <li>Incorporar la harina tamizada en forma envolvente.</li>
                <li>Verter la mezcla en un molde enmantecado y enharinado.</li>
                <li>Hornear a 180 °C durante 40 minutos o hasta que al pinchar salga limpio.</li>
                <li>Dejar enfriar y desmoldar.</li>
                <li>Servir solo o espolvoreado con azúcar impalpable.</li>
            </ol>
        </div>
    </div>
        <div class="opiniones" id="opiniones">
    <div class="mx-3 p-2" style="max-width: 900px;">
        <div class="comentarios-content">
        <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
            <!-- Tarjeta -->
            <div class="comentario-card">

                <!-- Nombre + Valor -->
                <div class="com-header">
                    <strong><?= $fila['nombre'] ?></strong>
                    <p>valoración: <span class="valor"><?= $fila['valor'] ?></span>/5</p>
                </div>

                <!-- Comentario -->
                <div class="comentario-texto">
                    <?= $fila['coment'] ?>
                </div>

                <!-- Botones -->
                <div class="comentario-botones">
                    <a class="btn-op" href="editar.php?id=<?= $fila['id'] ?>">Editar</a>
                    <a class="btn-op" href="eliminar.php?id=<?= $fila['id'] ?>"
                        onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                </div>

            </div>
        <?php } ?>
        </div>
        <!-- Botón Agregar -->
        <a class="btn btn-outline-dark m-3" href="agregar2.php">Agregar comentario</a>
    </div>
</div>

                        <footer class="site-footer">
                <div class="footer-inner">
                    <div class="footer-brand">
                        <img src="../imagenes/principal/Logo.png" alt="Logo" class="footer-logo">
                        <h2 class="h2">Kitty claus</h2>
                    </div>
                    <div class="footer-links">
                        <div class="fcol"><h4 class="h4">Acerca</h4><p>Recetas, tips y
                                más.</p></div>
                        <div
                            class="fcol"><h4 class="h4">Contacto</h4><p>contacto@recetas.example</p></div>
                        <div class="fcol"><h4 class="h4">Legal</h4><p>Términos y
                                privacidad</p></div>
                    </div>
                </div>
            </footer>
    </main>
    </aside>
    <script src="../main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>