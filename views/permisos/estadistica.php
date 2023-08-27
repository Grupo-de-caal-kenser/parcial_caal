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
<h1>ESTADISTICAS DE VENTAS</h1>
<button id="btnActualizar" class="btn btn-info">Actualizar</button>
<div class="row">
    <div class="col-lg-6">
        <canvas id="chartEstados" width="100%"></canvas>
    </div>
</div>
<script src="<?=asset('./build/js/permisos/estadistica.js') ?>"></script>