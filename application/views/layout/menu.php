<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>chome" class="brand-link">
      <img src="<?php echo base_url();?>assets/dist/img/logo.jpg" alt="SISCA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SISCA.PP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="" >
        </div>
        <div class="info">
          <a>Unidad Educativa Padre Pio</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  

          <?php if ($this->session->userdata("Login")['session_Tipo'] == "Administrador"): ?>
          <li class="nav-item has-treeview <?= $datos['menu'] == 'Configuracion' ? 'menu-open' : ''?>">
            <a href="#" class="nav-link <?= $datos['submenu'] == 'Cusuario' ? 'active' : ''?>">
              <i class="fa fa-cog"></i>
              <p>
                Configuracion
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>cusuarios" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>Usuarios</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url() ?>CBackup" class="nav-link">
                  <i class="fa fa-database"></i>
                  <p>Base de datos</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>


          <li class="nav-item has-treeview <?= $datos['menu'] == 'Personal' ? 'menu-open' : ''?>">
            <a href="#" class="nav-link <?= $datos['submenu'] == 'Cregistropersonal' ? 'active' : ''?>">
             <i class="fa fa-user"></i>
             <p>
                Personal
               <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <?php if ($this->session->userdata("Login")['session_Tipo'] == "Administrador"): ?>
              <li class="nav-item">
                <a href="<?= base_url() ?>cregistropersonal"class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Personal</p>
                </a>
              </li>
            <?php endif; ?>
              <li class="nav-item">
                <a href="<?= base_url() ?>Cjustificacion" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Justificacion</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>cpermisos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permisos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>Camonestacion" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Amonestacion</p>
                </a>
              </li>

            </ul>
          </li>

        


          <li class="nav-item has-treeview <?= $datos['menu'] == 'Pagos' ? 'menu-open' : ''?>" >

            <a href="#" class="nav-link <?= $datos['menu'] == 'Pagos' ? 'menu-open' : ''?>">
             <i class="fas fa-file-invoice"></i>
             <p>
                Pagos
               <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a href="<?= base_url() ?>Morosidad" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Morosidad</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>Pagos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pagos</p>
                </a>
              </li>
            </ul>
          </li>





          <li class="nav-item has-treeview <?= $datos['menu'] == 'Asistencia' ? 'menu-open' : ''?>">
            <a href="#" class="nav-link <?= $datos['submenu'] == 'Casistencia' ? 'active' : ''?>">
             <i class="fa fa-check"></i>
                <p>
                Asistencia
               <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>casistencia" class="nav-link">
                  <i class="fa fa-clipboard"></i>
                  <p>Registro Asistencia Diario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>casistencia/controlAsistencia" class="nav-link">
                  <i class="fa fa-table"></i>
                  <p>Control de Asistencia</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item">
            <a href="<?= base_url() ?>Creportes" class="nav-link">
              <i class="fa fa-print"></i>
              <p>
                Reportes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Acerca de
              </p>
            </a>
          </li> -->
        </ul>
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Bienvenido a SISCA.PP</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>Clogin/session_close">Cerrar Sesion</a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
