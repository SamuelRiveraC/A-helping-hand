  $(function () {
    jalar_data();
    // nuevo permiso
    $('#btnNew').click(function() {
      $('#fecha_inicio').attr('disabled', false);
      $('#fecha_culm').attr('disabled', false);
      $("#form1 input").val("");
      comboselect(null, base_url+'Cpermisos/usuarios_select','Seleccione Personal', 'item.C_I','item.P_nombre','form1','C_I')

      $('#modal-overlay').modal('show')
      $('#accion').val('creado')

    })
    //editar permiso
    $('#dataTables-table').on('click','.edi_registro',function(e) {
      e.preventDefault()
      $('#fecha_inicio').attr('disabled',true);
      $('#fecha_culm').attr('disabled',true);
      var idr = $(this).attr('idr')
      $('#accion').val('editado')
      modalData(idr)
      $('#modal-overlay').modal('show')
    })
    //ver permiso
    $('#dataTables-table').on('click','.ver_registro',function(e) {
      e.preventDefault()

      var idr = $(this).attr('idr')
      modalData(idr)
      $('#modal_ver').modal('show')
    })




    $('#borr_btn').click(function() {
      $('#form1').submit()
    })


    //envio de formulario de permiso
    $('#form1').submit(function(e) {
        e.preventDefault()
        $('#Act').attr('disabled',true);

        let accion = $("#accion").val()
        switch (accion) {
          case 'creado':
          var destino = 'ins'
          break;
          case 'editado':
          var destino = 'upd'
          break;

        }
        $.ajax({
          url:`${base_url}Cpermisos/${destino}`,
          data : $('#form1').serialize(),
          type: 'POST',
          success:function(data){
            $('#Act').attr('disabled',false);

            $('#fecha_inicio').attr('disabled',false);
            $('#fecha_culm').attr('disabled',false);
            $("#usuario").DataTable().destroy()
            jalar_data();
            $('input').val('')
            $('#modal_borrar').modal('hide')
            $("#modal-overlay").modal("hide");
            alert(`Se ha ${accion} satisfactoriamente`)
          },
          error:function(data) {
            $('#Act').attr('disabled',false);

            alert('Hubo un error en el proceso')
          }
        })
      })


  });

  //estructurar modal ver
  function modalData(cod_perm) {
    var detalle = '';
    $.getJSON(base_url+'Cpermisos/listar/'+cod_perm,function(data) {
      $('#accion').val('editado')
      comboselect(data[0].C_I, base_url+'Cpermisos/usuarios_select','Seleccione Personal', 'item.C_I','item.P_nombre','form1','C_I')
      $('#Cod_perm').val(cod_perm)
      $('#Fecha_perm').val(data[0].Fecha_perm)
      $('#Tipo_perm').val(data[0].Tipo_perm)
      $('#Observ_perm').val(data[0].Observ_perm)
      $('#dias_perm').val(data[0].dias_perm)

      detalle += `
      <tr><th>Fecha permiso:</th><td>${data[0].Fecha_perm}</td></tr>
      <tr><th>Tipo de permiso:</th><td>${data[0].Tipo_perm}</td></tr>
      <tr><th>Observacion permiso:</th><td>${data[0].Observ_perm}</td></tr>
      <tr><th>Dias permiso:</th><td>${data[0].dias_perm}</td></tr>
      <tr><th>Fecha inicio:</th><td>${data[0].fecha_inicio}</td></tr>
      <tr><th>Fecha culminacion:</th><td>${data[0].fecha_culm}</td></tr>
      `;
      $('#detalle_registro').html(detalle)
    })
  }


  function jalar_data() {//traer datos de tabla
    var content = '';
    $.getJSON(base_url+'Cpermisos/listar',function(data) {
      // console.log(data)
      $.each(data, function(i,item) {
        content += `
        <tr>
          <td>${item.C_I}</td>
          <td>${item.Fecha_perm}</td>
          <td>${item.Tipo_perm}</td>
          <td>${item.Observ_perm}</td>
          <td>${item.dias_perm}</td>
          <td>${item.fecha_inicio}</td>
          <td>${item.fecha_culm}</td>
          <td class="edi_registro" idr="${item.Cod_perm}"> <i class="fa fa-cog" idr="${item.Cod_perm}"></i> </td>
        </tr>
        `;
      })
      //inicializar datatable
      $('#dataTables-table').html(content)
      $('#usuario').DataTable({
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
