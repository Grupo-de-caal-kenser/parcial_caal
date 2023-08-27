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
            <a class="nav-link" href="/parcial_caal/roles/datatable">Roles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/parcial_caal/permisos/datatable">Asignar permiso</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/parcial_caal/permisos/estadistica">Estadísticas Permisos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/parcial_caal/permisos/estadistica2">Estadísticas Roles</a>
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
<div class="row justify-content-center">
    <div class="col table-responsive">
        <table id="tablaPermisos" class="table table-bordered table-hover">
        </table>
    </div>
</div>
<script src="<?= asset('./build/js/permisos/index.js') ?>"></script>