 <div class="col-md-12">
  <!-- Horizontal Form -->
  <!-- <div class="col-md-2" style="padding-bottom:20px">
    <button type="button" class="btn btn-block btn-primary" id='btnNew'>Registrar Asistencia</button>
  </div> -->

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Personal</h3>

    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <table id="personal" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Nombre</th>
          <th>Cedula</th>
          <th>Tipo</th>
          <th></th>
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
          <input type="hidden" name="C_I" id="C_I" value="">
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Asistencia</label>
            <div class="col-sm-10">
              <select class="form-control" id="asistencia" name="asistencia">
                <option selected value="Asistente">Asistente</option>
                <option value="Inasistente">Inasistente</option>
              </select>
            </div>
          </div>
          <div id="oculto_inasistencia" style="display:none">
            <div class="form-group">
               <label for="text" class="col-sm-4 control-label">Tipo inasistencia</label>
              <div class="col-sm-10">
                <select class="form-control" id="tipo_inasistencia" name="tipo_inasistencia">
                  <option value="Justificado">Justificado</option>
                  <option value="No Justificado">No Justificado</option>
                </select>
              </div>
            </div>
          </div>
          <div id="oculto_justificado" style="display:none">
            <div class="form-group" >
              <label for="text" class="col-sm-4 control-label">Nro de documento</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="Num_just" id="Num_just">
              </div>
            </div>
            <div class="form-group" >
              <label for="text" class="col-sm-4 control-label">Motivo</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="Motivo_just" id="Motivo_just">
              </div>
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

<div class="modal fade" id="modal_borrar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Borrar Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h1>¿Estás seguro de borrar este elemento?</h1>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id='borr_btn'>Eliminar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>



<?php $this->load->view('layout/scripts') ?>
<script src="<?= base_url() ?>js/asistencia.js" charset="utf-8"></script>
