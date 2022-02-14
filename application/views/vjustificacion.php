<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-6">
          <h3 class="card-title">Justificativo</h3>
        </div>
        <div class="col-6 text-right">
          <a class="btn btn-info btn-sm" href="/Cjustificacion/reporte" target="_blank"> Imprimir Reporte </a>
        </div>
      </div>
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
