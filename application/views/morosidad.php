 <div class="col-md-12">
  <!-- Horizontal Form -->
  <div class="col-md-2" style="padding-bottom:20px">
    <button type="button" class="btn btn-block btn-primary" id='btnNew'>Registrar Moroso</button>
  </div>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Moroso</h3>

    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <table id="tabla" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Codigo Mora</th>
          <th>Nro de factura con mora</th>
          <th>Monto de mora</th>
          <th>Tiempo de retraso</th>
          <th>Representante</th>
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
        <h4 class="modal-title" id="title">Control</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='form1'>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Personal moroso</label>
            <div class="col-sm-10">
              <select class="form-control" name="C_I">
                <?php foreach($personal as $persona) {
                  echo "<option value='$persona->C_I'> $persona->P_nombre $persona->P_apellido - $persona->C_I </option>";         
                } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Numero de Factura</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" min="0" name="Nro_factura_mora" id="Nro_factura_mora">
            </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Monto que debe</label>
            <div class="col-sm-10">
              <input class="form-control" type="number" min="0" name="Monto_mora" id="Monto_mora">
            </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Tiempo de cuando tuvo que haber hecho el pago</label>
            <div class="col-sm-10">
              <input class="form-control"  type="date" min="2000-01-01" max="<?php echo date("Y-m-d") ?>" name="Tiempo_retraso" id="Tiempo_retraso">
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
    $("#form1 input").val(""); // Nuevo 
    $('#modal-overlay').modal('show');
  })

  jalar_data();

  $('#form1').submit(function(e) { //Enviar datos
      e.preventDefault()
      $('#Act').attr('disabled',true);
      $.ajax({
        url:`${base_url}morosidad/insert`,
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
          alert('Error! Hubo un error en el proceso','error')
        }
      })
    })
})


function jalar_data() { // Trae los datos de amonestacion
  var content_asistentes = ''
  $('#tabla').DataTable().destroy();
  $.getJSON(base_url+'morosidad/list',function(data) {
    $.each(data, function(i,item) {
      content_asistentes += `
      <tr>
      <td>${item.cod_moroso}</td>
      <td>${item.nro_factura_mora}</td>
      <td>${item.monto_mora}</td>
      <td>${item.tiempo_retraso}</td>
      <td>${item.P_nombre} ${item.P_apellido} - ${item.cod_personal}</td>
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