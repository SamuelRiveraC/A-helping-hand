$(function() {
  //Buscar por rango de fecha 
  $('#Buscar').click(function() {
    jalar_data($('#rangofecha').val(), $('#rangofecha1').val())
  })
  // Mostrar PDF en el rango de fecha
  $("#get_pdf").click(function () {
    fecha1 = $('#rangofecha').val().split('/'), fecha2 = $('#rangofecha1').val().split('/');
    fecha1 = fecha1[0]+'-'+fecha1[1]+'-'+fecha1[2]
    fecha2 = fecha2[0]+'-'+fecha2[1]+'-'+fecha2[2]
    // console.log(fecha1);
    window.open(base_url+`Impresiones/imp_data/${fecha1}/${fecha2}`, '_blank')
  })
 // Inicialiacion de datatables

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
    maxDate: new Date(),
    locale: {
      format: 'DD/MM/YYYY',
    }
  });





})
// Rango fecha
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

//Traer datos de rango fecha
function jalar_data(rangofecha,rangofecha1) {
  var content_asistentes = '', content_inasistencia = ''
  $('#inasistencia').DataTable().destroy();
  $('#asistencia').DataTable().destroy();
  $.post(base_url+'Casistencia/count_list_personal',{rangofecha:rangofecha,rangofecha1:rangofecha1},function(data) {
    if (Object.keys(data.asistencia).length == 0 && Object.keys(data.inasistencia).length == 0){
      $("#get_pdf").attr('disabled', true);
   }else{
      $("#get_pdf").attr('disabled', false);
   } 
   // Recorre los datos para llenar la datatable
    $.each(data.asistencia, function(i,item) {
      content_asistentes += `
      <tr>
      <td>${item.P_nombre}</td>
      <td>${item.C_I}</td>
      <td>${item.cuenta}</td>
      </tr>
      `
    })
    // Recorre los datos para llenar la datatable
    $.each(data.inasistencia, function(i,item) {
      content_inasistencia += `
      <tr>
      <td>${item.P_nombre}</td>
      <td>${item.C_I}</td>
      <td>${item.cuenta}</td>
      </tr>
      `
    })
    //Inicializacion de datatables
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
