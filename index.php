<?php include 'templates/header.php'; ?>
<div class="container mt-4">
    <h1 class="text-center">Bienvenido a la Librería Online</h1>
    <p class="text-center">Consulta nuestra colección de libros y conoce a nuestros autores destacados.</p>
<div class="d-none d-md-flex justify-content-center">
    <a href="pages/libros.php" class="btn btn-primary mx-2">Libros</a>
    <a href="pages/autores.php" class="btn btn-secondary mx-2">Autores</a>
    <a href="pages/contacto.php" class="btn btn-success mx-2">Contacto</a>
    <a href="pages/biografias.php" class="btn btn-success mx-2">Biografias</a>
</div><br>

    <!-- Carrusel de libros con 3 libros por slide -->
    <div class="carousel-container" style="max-width: 900px; margin: 0 auto;">
        <div id="bookCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                    // Conexión a la base de datos
                    include 'db/conexion.php';

                    // Consulta para obtener los libros y sus imágenes
                    $stmt = $pdo->query('SELECT t.id_titulo, t.titulo, f.fotografia FROM titulos t LEFT JOIN fotografias f ON t.id_titulo = f.id_titulo');
                    $libros = $stmt->fetchAll();
                    $isFirst = true;

                    // Dividir los libros en grupos de 3
                    for ($i = 0; $i < count($libros); $i += 3) {
                        // Marcar el primer grupo de libros como activo
                        $activeClass = $isFirst ? 'active' : '';
                        $isFirst = false;

                        // Crear un slide con 3 libros
                        echo '<div class="carousel-item ' . $activeClass . '">';
                        
                        // Mostrar 3 libros por slide
                        echo '<div class="d-flex justify-content-between">';
                        for ($j = $i; $j < $i + 3 && $j < count($libros); $j++) {
                            $libro = $libros[$j];
                            echo '<div class="col-12 col-md-4" style="padding: 0 10px; flex: 0 0 33.33%;">';
                            echo '<img src="' . htmlspecialchars($libro['fotografia'] ?? 'assets/img/default.jpg') . '" class="d-block w-100" alt="' . htmlspecialchars($libro['titulo']) . '" style="height: 300px; object-fit: contain;">';
                            
                            // Botón de compra centrado debajo de la imagen
                            echo '<div class="text-center mt-2">';
                            echo '<a href="https://skingratisfortnite.7agarments.com/pages/libros.php" class="btn btn-success">Comprar</a>';
                            echo '</div>';

                            echo '</div>';
                        }
                        echo '</div>';
                        echo '</div>';
                    }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#bookCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bookCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<?php include 'templates/footer.php'; ?>
