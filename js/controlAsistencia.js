$(function() {
  jalar_data()

  $('#dataTables-table').on('click','.asistencia',function() {
    var idr = $(this).attr('idr');
    $('#C_I').val(idr);
    $('#modal-overlay').modal('show');
  })

  $('#form1').submit(function(e) {
      e.preventDefault()
      $('#Act').attr('disabled',true);
      $.ajax({
        url:`${base_url}Casistencia/ins_datos`,
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
  var content_asistentes = '', content_inasistencia = ''
  $('#inasistencia').DataTable().destroy();
  $('#asistencia').DataTable().destroy();
  $.getJSON(base_url+'Casistencia/count_list_personal',function(data) {
    $.each(data.asistentes, function(i,item) {
      content_asistentes += `
      <tr>
      <td>${item.P_nombre}</td>
      <td>${item.C_I}</td>
      <td>${item.cuenta}</td>
      </tr>
      `
    })
    $.each(data.inasistencia, function(i,item) {
      content_inasistencia += `
      <tr>
      <td>${item.P_nombre}</td>
      <td>${item.C_I}</td>
      <td>${item.cuenta}</td>
      </tr>
      `
    })
    $('#dataTables-inasistencia').html(content_inasistencia)
    $('#dataTables-asistencia').html(content_asistentes)
    $('#inasistencia').DataTable({
      "responsive": true,
      oLanguage:{
        sSearch: 'Buscar:'
      },
    });
    $('#asistencia').DataTable({
      "responsive": true,
      oLanguage:{
        sSearch: 'Buscar:'
      },
    });
  })
}
