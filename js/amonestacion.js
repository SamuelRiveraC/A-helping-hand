$(function () {
  $('#btnNew').click(function() {
    $("#form1 input").val("");
      comboselect(null, base_url+'Cpermisos/usuarios_select','Seleccione Personal', 'item.C_I','item.P_nombre','form1','C_I')
    $('#modal-overlay').modal('show');
  })

  jalar_data();

  $('#form1').submit(function(e) {
      e.preventDefault()
      $('#Act').attr('disabled',true);
      $.ajax({
        url:`${base_url}Camonestacion/ins_Amonestacion`,
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


function jalar_data() {
  var content_asistentes = ''
  $('#amonestacion').DataTable().destroy();
  $.getJSON(base_url+'Camonestacion/list_amonestacion',function(data) {
    $.each(data, function(i,item) {
      content_asistentes += `
      <tr>
      <td>${item.Cod_amon}</td>
      <td>${item.Fecha_amon}</td>
      <td>${item.Emisor_amon}</td>
      <td>${item.Motivo_amon}</td>
      <td>${item.Tipo_amon}</td>
      <td>${item.Cdula}</td>
      </tr>
      `
    });
    $('#dataTables-table').html(content_asistentes)
    $('#amonestacion').DataTable({
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
