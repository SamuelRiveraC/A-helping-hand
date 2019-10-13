 <div class="col-md-12">
  <!-- Horizontal Form -->
  <div class="col-md-2" style="padding-bottom:20px">
    <button type="button" class="btn btn-block btn-primary" id='btnNew'>Registrar Personal</button>
  </div>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Personal</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="Personal" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Cedula</th>
          <th>Tipo Personal</th>
          <th>Sexo</th>
          <th></th>
          <th></th>
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
        <h4 class="modal-title">Registrar Nuevo Personal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='form1'>
          <input type="hidden" name="idr" id="idr" value="">
          <input type="hidden" name="accion" id='accion' value="">
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label"> Nombre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="P_nombre" id="P_nombre" placeholder="Ingrese su Nombre">
            </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label"> Segundo Nombre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="S_nombre" id="S_nombre" placeholder="Ingrese su Segundo Nombre">
            </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label"> Apellido</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="P_apellido" id="P_apellido" placeholder="Ingrese su Apellido">
            </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label"> Segundo Apellido</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="S_apellido" id="S_apellido" placeholder="Ingrese su Segundo Apellido">
            </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Sexo</label>
             <div class="col-sm-10">
               <select class="form-control" id="cboSexo" name='Sexo'>
                 <option value ="">Escoga una opción</option>
                 <option value="Femenino">Femenino</option>
                 <option value="Masculino">Masculino</option>
                 <option value="Otro">Otro</option>
               </select>
             </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Nacionalidad</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="Nacionalidad" id="Nacionalidad" placeholder="Ingrese su Nacionalidad">
            </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Estado civil</label>
              <div class="col-sm-10">
                <select class="form-control" id='est_civ' name='Estado_civil'>
                    <option value ="">Escoga una opción</option>
                    <option value="Soltero">Soltero/a</option>
                    <option value="Casado">Casado/a</option>
                    <option value="Divorciado">Divorciado/a</option>
                    <option value="Viudo">Viudo/a</option>
                    <option value="Otro">Otro</option>
                </select>
              </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Fecha de Nacimiento</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="Fecha_n" id="Fecha_n">
            </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Tipo de Personal</label>
            <div class="col-sm-10">
              <select class="form-control" name='Tipo_pers' id="tipo_pers">
                  <option value ="">Escoga una opción</option>
                  <option value="Administrativo">Administrativo</option>
                  <option value="Docente">Docente</option>
                  <option value="Obrero">Obrero</option>
              </select>
            </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Edad</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="Edad" id="Edad" placeholder="Ingrese su Edad">
            </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Cedula</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="C_I" id="C_I" placeholder="Ingrese su Cedula">
            </div>
          </div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id='Guardar'>Guardar</button>
      </div>
    </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal_borrar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Borrar Personal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h1>Esta seguro de borrar este elemento?</h1>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id='eli_btn'>Eliminar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="modal_ver">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Datos Personal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>

          <table id='detalles'>

          </table>
        </center>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id='eli_btn'>Eliminar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>

<script src="<?= base_url() ?>js/registropersonal.js" charset="utf-8"></script>
