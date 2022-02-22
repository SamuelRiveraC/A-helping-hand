 <div class="col-md-12">
  <!-- Horizontal Form -->
  <div class="col-md-2" style="padding-bottom:20px">
    <button type="button" class="btn btn-block btn-primary" id='btnNew'>Registrar Pago</button>
  </div>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Pagos</h3>

    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <table id="tabla" class="table table-bordered table-hover">
        <thead>
        <tr>
			     <th>Codigo de pago</th>
			     <th>Monto Abonado</th>
			     <th>Numero del pago</th>
			     <th>Control de pago</th>
           <th>Pagador</th>
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
        <h4 class="modal-title" id="title">Control</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='form1'>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Personal Pago</label>
            <div class="col-sm-10">
              <select class="form-control" name="C_I">
                <?php foreach($personal as $persona) {
                  echo "<option value='$persona->C_I'> $persona->P_nombre $persona->P_apellido - $persona->C_I </option>";         
                } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Monto abonado</label>
            <div class="col-sm-10">
              <input class="form-control" type="number" min="0" name="abono" id="abono">
            </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Numero del factura</label>
            <div class="col-sm-10">
              <input class="form-control" type="number" min="0" name="num_pago" id="num_pago">
            </div>
          </div>
          <div class="form-group">
             <label for="text" class="col-sm-4 control-label">Control de pago</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="control_pago" id="control_pago">
            </div>
          </div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id='Act'>Guardar</button>
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
  $.getJSON(base_url+'pagos/listar',function(data) {
    $.each(data, function(i,item) {
      content_asistentes += `
      <tr>
      <td>${item.cod_pago}</td>
      <td>${item.abono}</td>
      <td>${item.num_pago}</td>
      <td>${item.control_pago}</td>
      <td>${item.P_nombre} ${item.P_apellido} - ${item.cod_personal}</td>
      <td> <a class="btn btn-primary" href="/Pagos/print/${item.cod_pago}" target="_blank"> Imprimir factura </a> </td>
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