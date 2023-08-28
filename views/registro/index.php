<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <!-- Agregar los enlaces a los archivos CSS y JavaScript de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
                body {
    background-image: url('/parcial_caal/public/images/ejercito.jpg');
    background-size: cover;
}

#contenido {
    background-color: rgba(0, 0, 0, 0.5); /* Fondo gris medio oscuro con opacidad */
    padding: 20px; /* Añade un espacio de separación del borde */
}

#tablaUsuariosTabla {
    background-color: #f2f2f2; /* Gris claro */
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); /* Sombra */
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
    <h2 class="text-center mb-4 text-primary">Registro de Usuario</h2>
    <div class="row justify-content-center">
        <form id="formRegistro" class="col-lg-4 border rounded p-3" action="/parcial_caal/registro" method="POST">
            <div class="row mb-3">
                <div class="col">
                    <label for="usu_nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="usu_nombre" name="usu_nombre" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="usu_catalogo" class="form-label">Catálogo</label>
                    <input type="number" class="form-control" id="usu_catalogo" name="usu_catalogo" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="usu_password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="usu_password" name="usu_password" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-check-label" for="show_password">
                        <input type="checkbox" id="show_password">
                        Mostrar Contraseña
                    </label>
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </div>
        </form>
    </div>
    <div class="mt-3">
        <p class="mb-0 text-center">¿Ya tiene una cuenta?<a href="/parcial_caal/" class="text-primary fw-bold ms-2">Iniciar Sesión</a></p>
    </div>
    <script src="<?= asset('./build/js/registro/index.js') ?>"></script>
</body>
</html>