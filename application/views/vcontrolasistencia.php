<div class="col-md-12">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Inasistencia</h3>

    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <table id="inasistencia" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Nombre</th>
          <th>Cedula</th>
          <th>Inasistencia</th>
        </tr>
        </thead>
        <tbody id="dataTables-inasistencia">

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->


  </div>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Asistencias</h3>

    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <table id="asistencia" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Nombre</th>
          <th>Cedula</th>
          <th>Asistencias</th>
        </tr>
        </thead>
        <tbody id="dataTables-asistencia">

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->


  </div>



</div>


<?php $this->load->view('layout/scripts') ?>
<script src="<?= base_url() ?>js/controlAsistencia.js" charset="utf-8"></script>
