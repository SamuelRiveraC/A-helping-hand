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
        <h4 class="modal-title" id="title">Control de Amonestación</h4>
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
<script type="text/javascript">
$(function () {
  $('#btnNew').click(function() {
    $("#form1 input").val(""); // Nueva pago 
      comboselect(null, base_url+'Cpermisos/usuarios_select','Seleccione Personal', 'item.C_I','item.P_nombre','form1','C_I')
    $('#modal-overlay').modal('show');
  })

  jalar_data();

  $('#form1').submit(function(e) { //Enviar datos Nueva pago
      e.preventDefault()
      $('#Act').attr('disabled',true);
      $.ajax({
        url:`${base_url}pagos/insert`,
        data : $('#form1').serialize(),
        type: 'POST',
        success:function(data){
          $('#Act').attr('disabled',false);
          jalar_data();
          $('#modal_borrar').modal('hide')
          $("#modal-overlay").modal("hide");
        },
        error:function(data) {
          $('#Act').attr('disabled',false);
          alert('Error!','Hubo un error en el proceso','error')
        }
      })
    })
})


function jalar_data() { // Trae los datos de pago
  var content_asistentes = ''
  $('#tabla').DataTable().destroy();
  $.getJSON(base_url+'Camonestacion/list_amonestacion',function(data) {
    $.each(data, function(i,item) {
      content_asistentes += `
      <tr>
      <td>${item.Num_amon}</td>
      <td>${item.Fecha_amon} </td>
      <td>${item.Emisor_amon}</td>
      <td>${item.Motivo_amon}</td>
      <td>${item.Tipo_amon}</td>
      <td>${item.Cdula}</td>
      </tr>
      `
    });
    // Inicializacion de los DataTables
    $('#dataTables-table').html(content_asistentes)
    $('#tabla').DataTable({
      "responsive": true,
      "language":{
        "sSearch": 'Buscar:',
        "lengthMenu": 'Mostrando _MENU_ datos por pagina',
        "zeroRecords": 'No hay datos',
        "info": 'Mostrando _PAGE_ paginas de _PAGES_',
        "infoEmpty": 'No hay datos disponibles',
        "infoFiltered": '(Filtrando desde _MAX_ respuestas totales)',
        "paginate": {
          first: 'Primero',
          previous: 'Anterior',
          next: 'Siguiente',
          last: 'Ultima'
        }
      },
    });
  })
}
</script>


<!-- <script src="<?= base_url() ?>js/amonestacion.js" charset="utf-8"></script> !-->
