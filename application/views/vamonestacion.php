 <div class="col-md-12">
  <!-- Horizontal Form -->
  <div class="col-md-2" style="padding-bottom:20px">
    <button type="button" class="btn btn-block btn-primary" id='btnNew'>Registrar Amonestacion</button>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-6">
          <h3 class="card-title">Amonestacion</h3>
        </div>
        <div class="col-6 text-right">
          <a class="btn btn-info btn-sm" href="/Camonestacion/reporte" target="_blank"> Imprimir Reporte </a>
        </div>
      </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <table id="amonestacion" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Codigo amonestacion</th>
          <th>Fecha</th>
          <th>Emisor</th>
          <th>Motivo</th>
          <th>Tipo</th>
          <th>Cedula</th>
        </tr>
        </thead>
        <tbody id="dataTables-table">

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->

  </div>



<div class="modal fade" id="modal-overlay">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="title">Control de asistencia</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='form1'>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Personal</label>
            <div class="col-sm-10">
              <select class="form-control" id="C_I" name="C_I">

              </select>
            </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Emitido</label>
            <div class="col-sm-10">
              <select class="form-control" id="emitido" name="emitido">
                <option value="">Seleccione emisor</option>
                <option value="Coordinador">Coordinador</option>
                <option value="Directivo">Directivo</option>
              </select>
            </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Motivo</label>
            <div class="col-sm-10">
              <textarea name="Motivo_amon" id="Motivo_amon" rows="5" cols="50"></textarea>
            </div>
          </div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id='Act'>Actualizar</button>
      </div>

    </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</div>




<?php $this->load->view('layout/scripts') ?>
<script src="<?= base_url() ?>js/amonestacion.js" charset="utf-8"></script>
