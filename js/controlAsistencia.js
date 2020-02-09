$(function() {
  $('#Buscar').click(function() {
    jalar_data($('#rangofecha').val(), $('#rangofecha1').val())
  })
  $("#get_pdf").click(function () {
    fecha1 = $('#rangofecha').val().split('/'), fecha2 = $('#rangofecha1').val().split('/');
    fecha1 = fecha1[0]+'-'+fecha1[1]+'-'+fecha1[2]
    fecha2 = fecha2[0]+'-'+fecha2[1]+'-'+fecha2[2]
    // console.log(fecha1);
    window.open(base_url+`Impresiones/imp_data/${fecha1}/${fecha2}`, '_blank')
  })
  $('#dataTables-table').on('click','.asistencia',function() {
    var idr = $(this).attr('idr');
    $('#C_I').val(idr);
    $('#modal-overlay').modal('show');
  })

  $('#rangofecha').daterangepicker({
    opens: 'left',
    singleDatePicker: true,
    showDropdowns: true,
    startDate: formatFirstDate(new Date()),
    locale: {
      format: 'DD/MM/YYYY',
    }
  });
  $('#rangofecha1').daterangepicker({
    opens: 'left',
    singleDatePicker: true,
    showDropdowns: true,
    locale: {
      format: 'DD/MM/YYYY',
    }
  });

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

function formatFirstDate(date) {
  var monthNames = [
    "January", "February", "March",
    "April", "May", "June", "July",
    "August", "September", "October",
    "November", "December"
  ];

  var monthNumber = [
    "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"
  ];

  var day = "01";
  var monthIndex = date.getMonth();
  var year = date.getFullYear();

  return day + '-' + monthNumber[monthIndex] + '-' + year;
}


function jalar_data(rangofecha,rangofecha1) {
  var content_asistentes = '', content_inasistencia = ''
  $('#inasistencia').DataTable().destroy();
  $('#asistencia').DataTable().destroy();
  $.post(base_url+'Casistencia/count_list_personal',{rangofecha:rangofecha,rangofecha1:rangofecha1},function(data) {
    $.each(data.asistencia, function(i,item) {
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
      "language": {
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
    $('#asistencia').DataTable({
      "responsive": true,
      "language": {
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
