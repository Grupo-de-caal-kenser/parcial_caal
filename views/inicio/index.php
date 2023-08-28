<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="build/js/app.js"></script>
    <link rel="shortcut icon" href="<?= asset('public/images/cit.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= asset('build/styles.css') ?>">
    <title>USUARIOS LOGIN</title>
    <!-- Agregar los enlaces a los archivos CSS y JavaScript de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
    background-image: url('/parcial_caal/public/images/ejercito.jpg');
    background-size: cover;
}
        /* Personalizar estilos adicionales si es necesario */
        .navbar {
            background-color: #2471A3; /* Color azul marino claro */
        }
        .navbar-light .navbar-nav .nav-link {
            color: #ffffff; /* Color blanco para los enlaces del Navbar */
        }
        .navbar-light .navbar-toggler-icon {
            background-color: #ffffff; /* Color blanco para el icono del botón de navegación */
        }
        .btn-danger {
            font-size: 18px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
        <a class="navbar-brand" href="/parcial_caal/inicio">Menú Principal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/parcial_caal/activar">Solicitudes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/parcial_caal/dato">Usuarios Activos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/parcial_caal/desactivar">Usuarios Desactivados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/parcial_caal/dato/estadistica">Usuarios Activos e Inactivos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/parcial_caal/permisos/estadistica2">Usuarios por roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/parcial_caal/roles/datatable">Roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/parcial_caal/permisos/datatable">Permisos para el usuario</a>
                    </li>
                </ul>
            </div>
            <a class="btn btn-danger" href="/parcial_caal/logout">Cerrar Sesión</a>
        </div>
    </nav>
    <div class="row justify-content-center">
  <div class="col-lg-4">
    <h1 style="text-center">BIENVENIDO A MI PAGINA PARA USUARIOS</h1>
  </div>
    </div>
    <div class="row justify-content-center">
  <div class="col-lg-4">
    <img src="./images/cit.png" width="100%" alt="">
  </div>
</div>
    <div class="progress fixed-bottom" style="height: 6px;">
        <div class="progress-bar progress-bar-animated bg-danger" id="bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="container-fluid pt-5 mb-4" style="min-height: 85vh">
        
        <?php echo $contenido; ?>
    </div>
    <div class="container-fluid " >
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <p style="font-size:xx-small; font-weight: bold;">
                        Comando de Informática y Tecnología, <?= date('Y') ?> &copy;
                </p>
            </div>
        </div>
    </div>
    <!-- Agregar el enlace al archivo JavaScript de Bootstrap si es necesario -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>