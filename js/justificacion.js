  $(function () {
    jalar_data();

  });



  function jalar_data() { //Traer datos de justificacion 
    var content = '';
    $.getJSON(base_url+'Cjustificacion/listar',function(data) {
      // console.log(data)
      $.each(data, function(i,item) {
        content += `
        <tr>
          <td>${item.C_I}</td>
          <td>${item.Num_just}</td>
          <td>${item.Motivo_just}</td>
          <td>${item.Fecha_just}</td>
        </tr>
        `;
      })
      $('#dataTables-table').html(content) // Inicializacion de datatables
      $('#justificacion').DataTable({
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
