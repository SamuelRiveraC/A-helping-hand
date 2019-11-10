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
  $('#form1 #tipo_inasistencia').on('change',function() {
    if ($(this).val() != '') {
      if ($(this).val() == 'Justificado') {
        $('#oculto_justificado').show();
      } else {

        $('#oculto_justificado').hide();
      }

    } else {

      $('#oculto_justificado').hide();
    }
  })

  $('#form1 #asistencia').on('change',function() {
    if ($(this).val() != '') {
      console.log($(this).val())
      if ($(this).val() == 'Asistente') {
        $('#oculto_asistencia').show()
        $('#oculto_inasistencia').hide()
        $('#Act').attr('disabled',false)
      } else {
        $('#Act').attr('disabled',false)
        $('#oculto_asistencia').hide()
        $('#oculto_inasistencia').show()
      }
    } else {
      $('#Act').attr('disabled',true)
    }
  })

})

function jalar_data() {
  var content = ''
  $('#personal').DataTable().destroy();
  $.getJSON(base_url+'Casistencia/listar',function(data) {
    $.each(data.personal, function(i,item) {
      content += `
      <tr>
      <td>${item.P_nombre + ' ' + item.P_apellido}</td>
      <td>${item.C_I}</td>
      <td>${item.Tipo_pers}</td>
      <td class="asistencia" idr="${item.C_I}"> <i class="fa fa-search"></i> </td>
      </tr>
      `
    })
    $('#dataTables-table').html(content)
    $('#personal').DataTable({
      "responsive": true,
      oLanguage:{
        sSearch: 'Buscar:'
      },
    });
  })
}
