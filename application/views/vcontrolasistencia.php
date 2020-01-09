<div class="col-md-12">

  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-lg-3 col-12 mb-30">
          <input type="text" class="form-control" name="rangofecha" id="rangofecha" value="">
        </div>
        <div class="col-lg-3 col-12 mb-30">
          <input type="text" class="form-control" name="rangofecha1" id="rangofecha1" value="">
        </div>
        <div class="col-lg-4 col-12">
          <button class="btn btn-primary" type="button" id="Buscar" name="button">Buscar</button>
        </div>
      </div>
    </div>
  </div>


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
