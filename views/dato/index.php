
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


<div class="row justify-content-center">
            <form class="col-lg-8 border bg-light p-3">
            <h1 class="text-center">Actualizacion</h1><br>
            <input type="hidden" name="usu_id" id="usu_id">

                <div class="row mb-3">
                    <div class="col">
                    <label for="usu_nombre">Nombre del Usuario</label>
                        <input type="text" name="usu_nombre" id="usu_nombre" class="form-control" >
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="usu_catalogo">Catálogo</label>
                        <input type="number" name="usu_catalogo" id="usu_catalogo" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="usu_password">Contraseña</label>
                        <input type="text" name="usu_password" id="usu_password" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-2">
                        <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" id="btnCancelar" class="btn btn-danger w-100">Cancelar</button>
                    </div>

                </div>
            </form>
        </div>

      
        <div id="tablaUsuariosTabla" class="container mt-5">
            <div class="row justify-content-center mt-4">
                <div class="col-12 p-4 shadow"> 
                    <div class="text-center">
                        <h1>Usuarios Activos</h1>
                    </div>
            <table id="tablaUsuarios" class="table table-bordered table-hover">
                <!-- Contenido de la tabla -->
            </table>
        </div>
    </div>
</div>
<script src="<?= asset('./build/js/dato/index.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>