<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Justificaciones</h3>

    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <table id="justificacion" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Cedula</th>
          <th>Numero</th>
          <th>Motivo</th>
          <th>Fecha</th>
        </tr>
        </thead>
        <tbody id="dataTables-table">

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->

  </div>

</div>
<?php $this->load->view('layout/scripts') ?>
<script src="<?= base_url() ?>js/justificacion.js" charset="utf-8"></script>
