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

#tablaPermiso{
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
<h1 class="text-center">ASIGNAR PERMISOS</h1>
<div class="row justify-content-center mb-5">
    <form class="col-lg-8 border bg-light p-3" id="formularioPermiso">
        <input type="hidden" name="permiso_id" id="permiso_id">
        <div class="row mb-3">
                <div class="col">
                    <label for="permiso_usuario">USUARIO</label>
                    <select name="permiso_usuario" id="permiso_usuario" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($usuarios as $usuario) : ?>
                            <option value="<?= $usuario['usu_id'] ?>"><?= $usuario['usu_nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col">
                    <label for="permiso_rol">ASIGNAR UN ROL</label>
                    <select name="permiso_rol" id="permiso_rol" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($roles as $rol) : ?>
                            <option value="<?= $rol['rol_id'] ?>"><?= $rol['rol_nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" form="formularioPermiso" id="btnGuardar" data-saludo= "hola" data-saludo2="hola2" class="btn btn-primary w-100">Guardar</button>
            </div>
            <div class="col">
                <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
            </div>
            <div class="col">
                <button type="button" id="btnBuscar" class="btn btn-info w-100">Buscar</button>
            </div>
            <div class="col">
                <button type="button" id="btnCancelar" class="btn btn-danger w-100">Cancelar</button>
            </div>
        </div>
    </form>
</div>
<h1>Datatable de Permisos</h1>
<div id="tablaPermiso" class="row justify-content-center">
    <div class="col table-responsive">
        <table id="tablaPermisos" class="table table-bordered table-hover">
        </table>
    </div>
</div>
<script src="<?= asset('./build/js/permisos/index.js') ?>"></script>