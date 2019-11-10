 <div class="col-md-12">
  <!-- Horizontal Form -->
  <div class="col-md-2" style="padding-bottom:20px">
    <button type="button" class="btn btn-block btn-primary" id='btnNew'>Nuevo Permiso</button>
  </div>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Permisos</h3>

    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <table id="usuario" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Nombre</th>
          <th>Fecha creacion</th>
          <th>Tipo</th>
          <th>Observacion</th>
          <th>Dias</th>
          <th>Fecha Inicio</th>
          <th>Fecha Culminacion</th>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="title">Datos del permiso</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='form1'>
          <input type="hidden" name="Cod_perm" id="Cod_perm" value="">
          <input type="hidden" name="accion" id='accion' value="">
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Personal</label>
            <div class="col-sm-10">
              <select class="form-control" name="C_I" id="C_I">

              </select>
            </div>
          </div>

          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Fecha</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="Fecha_perm" id="Fecha_perm" required placeholder="Contraseña">
            </div>
          </div>


          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Tipo permiso</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="Tipo_perm" id="Tipo_perm" value="">
             </div>
           </div>

             <div class="form-group">
               <label for="text" class="col-sm-4 control-label">Observacion</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" id="Observ_perm" name="Observ_perm" required  placeholder="Observacion">
               </div>
             </div>

             <div class="form-group">
               <label for="text" class="col-sm-4 control-label">Dias permiso</label>
               <div class="col-sm-10">
                 <input type="number"  class="form-control" name="dias_perm" id="dias_perm"  required>
               </div>
             </div>

             <div class="form-group">
               <label for="text" class="col-sm-4 control-label">Fecha inicio</label>
               <div class="col-sm-10">
                 <input type="date"  class="form-control" name="fecha_inicio" id="fecha_inicio"  required>
               </div>
             </div>

             <div class="form-group">
               <label for="text" class="col-sm-4 control-label">Fecha culminacion</label>
               <div class="col-sm-10">
                 <input type="date"  class="form-control" name="fecha_culm" id="fecha_culm"  required>
               </div>
             </div>






      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id='Act'>Crear</button>
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


<div class="modal fade" id="modal_ver">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Ver Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
            <tbody id="detalle_registro">

            </tbody>
        </table>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<?php $this->load->view('layout/scripts') ?>
<script src="<?= base_url() ?>js/permisos.js" charset="utf-8"></script>
