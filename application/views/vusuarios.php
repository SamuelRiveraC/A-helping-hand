 <div class="col-md-12">
  <!-- Horizontal Form -->
<style media="screen">
   .cli_li_list{
   list-style: none;
   border-left: solid 1px #c3c3c3;
   border-right: solid 1px #c3c3c3;
   border-bottom: solid 1px #c3c3c3;
   padding:10px 4px 10px 10px;
   cursor: pointer;
   width: 90%;
   }
   .cli_li_list_no{
   list-style: none;
   border-left: solid 1px #c3c3c3;
   border-right: solid 1px #c3c3c3;
   border-bottom: solid 1px #c3c3c3;
   padding:10px 4px 10px 10px;
   cursor: pointer;
   width: 90%;
   }
   .cli_li_list:hover{
     background-color: #31127c78;
     color:white;
   }
</style>
  <div class="col-md-2" style="padding-bottom:20px">
    <button type="button" class="btn btn-block btn-primary" id='btnNew'>Registrar Usuario</button>
  </div>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Usuarios</h3>

    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <table id="usuario" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Nombre</th>
          <th>Nombre de usuario</th>
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
        <h4 class="modal-title" id="title">Datos del Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='form1'>
          <input type="hidden" name="ID_usuario" id="ID_usuario" value="">
          <input type="hidden" name="accion" id='accion' value="">
          <input type="hidden" name="C_I" id="C_I" value="">
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Cedula</label>
              <div class="col-sm-10">
                <input type="text" name="C_Isearch" class="form-control" id="C_Isearch">
              </div>
          </div>
          <div id="listaUsuario">
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Usuario</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="Nom_usuario" required id="Nom_usuario" placeholder="Nombre de Usuario">
            </div>
          </div>

          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Contraseña</label>
            <div class="col-sm-10">
              <input type="Password" class="form-control" name="Password" id="Password" required placeholder="Contraseña">
            </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Confirmar Contraseña</label>
            <div class="col-sm-10">
              <input type="Password" class="form-control" name="confir_pass" id="confir_pass" required placeholder="Confirmar contraseña">
            </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Tipo de Cuenta</label>
              <div class="col-sm-10">
               <select class="form-control" id="Tipo_cuenta" name='Tipo_cuenta' required>
                 <option value ="">Escoga una opción</option>
                 <option value="Administrador">Administrativo</option>
                 <option value="Usuario">Usuario</option>
               </select>
             </div>


             <div class="form-group">
               <label for="text" class="col-sm-4 control-label">Pregunta 1</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" id="Preg_1" name="Preg_1" required  placeholder="Pregunta de Seguridad 1">
               </div>
             </div>

             <div class="form-group">
               <label for="text" class="col-sm-4 control-label">Respuesta 1</label>
               <div class="col-sm-10">
                 <input type="password"  class="form-control" name="Res_1" id="Res_1"  required placeholder="Respuesta de Seguridad 1">
               </div>
             </div>

             <div class="form-group">
               <label for="text" class="col-sm-4 control-label">Pregunta 2</label>
               <div class="col-sm-10">
                 <input type="text"  class="form-control" name="Preg_2" id="Preg_2"  required placeholder="Pregunta de Seguridad 2">
               </div>
             </div>

             <div class="form-group">
               <label for="text" class="col-sm-4 control-label">Respuesta 2</label>
               <div class="col-sm-10">
                 <input type="password"  class="form-control" name="Res_2" id="Res_2"  required placeholder="Respuesta de Seguridad 2">
               </div>
             </div>
             <div class="form-group">
               <label for="text" class="col-sm-4 control-label">Pregunta 3</label>
               <div class="col-sm-10">
                 <input type="text"  class="form-control" name="Preg_3" id="Preg_3"  required placeholder="Pregunta de Seguridad 3">
               </div>
             </div>
             <div class="form-group">
               <label for="text" class="col-sm-4 control-label">Respuesta 3</label>
               <div class="col-sm-10">
                 <input type="password"  class="form-control" name="Res_3" id="Res_3"  required placeholder="Respuesta de Seguridad 3">
               </div>
             </div>






      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id='Act'> <span id='mess'></span></button>
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
        <?php if ($this->session->userdata('Login')['session_Tipo'] == 'Administrador'): ?>
          <label>Mostrar respuestas</label>
          <button type="button" class="btn btn-primary" id="ver_answer" style="margin-left:10px">
            <span aria-hidden="true"><i class="fa fa-eye"></i></span>
          </button>
        <?php endif; ?>
        <table class="table table-striped" id="tabla_respuestas" style="display:none">
            <tbody id="respuestas_sec">

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
<script src="<?= base_url() ?>js/usuario.js" charset="utf-8"></script>
