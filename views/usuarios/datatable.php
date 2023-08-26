<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/parcial_caal/menu">Menú</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/parcial_caal/usuarios/datatable">Usuario</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/parcial_caal/roles/estadistica">Roles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/parcial_caal/permisos/datatable">Asignar permiso</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/parcial_caal/permisos/estadistica">Estadísticas</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="btn btn-danger" href="/parcial_caal/logout"><i class="bi bi-arrow-bar-left"></i>Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<h1 class="text-center">CREAR Y SOLICITAR USUARIO</h1>
<div class="row justify-content-center mb-5">
    <form class="col-lg-8 border bg-light p-3" id="formularioUsuario">
        <input type="hidden" name="usu_id" id="usu_id">
        <div class="row mb-3">
                <div class="col">
                    <label for="usu_nombre">Nombre del usuario</label>
                    <input type="text" name="usu_nombre" id="usu_nombre" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="usu_catalogo">catalogo</label>
                    <input type="number" name="usu_catalogo" id="usu_catalogo" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="usu_password">Contraseña</label>
                    <input type="number" name="usu_password" id="usu_password" class="form-control">
                </div>
            </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" form="formularioUsuario" id="btnGuardar" data-saludo= "hola" data-saludo2="hola2" class="btn btn-primary w-100">Guardar</button>
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
<h1>Datatable de Usuarios</h1>
<div class="row justify-content-center">
    <div class="col table-responsive">
        <table id="tablaUsuarios" class="table table-bordered table-hover">
        </table>
    </div>
</div>
<script src="<?= asset('./build/js/usuarios/index.js') ?>"></script>