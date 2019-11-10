  $(function () {
    jalar_data();
    $('#btnNew').click(function() {
      $('#modal-overlay').modal('show')
      $('#accion').val('creado')

    })

    $('#dataTables-table').on('click','.edi_registro',function(e) {
      e.preventDefault()
      var idr = $(this).attr('idr')
      $('#accion').val('editado')
      modalData(idr)
      $('#modal-overlay').modal('show')
    })
    $('#dataTables-table').on('click','.ver_registro',function(e) {
      e.preventDefault()

      var idr = $(this).attr('idr')
      modalData(idr)
      $('#modal_ver').modal('show')
    })


    $('#dataTables-table').on('click','.bor_registro',function(e) {
      e.preventDefault()

      var idr = $(this).attr('idr')
      $('#accion').val('borrado')
      modalData(idr)
      $('#modal_borrar').modal('show')
    })

    $('#borr_btn').click(function() {
      $('#form1').submit()
    })



    $('#form1').submit(function(e) {
        e.preventDefault()
        $('#Act').attr('disabled',true);

        let accion = $("#accion").val()
        switch (accion) {
          case 'creado':
          var destino = 'ins'
          break;
          case 'editado':
          var destino = 'actualizarDatos'
          break;
          case 'borrado':
          var destino = 'eliminarDatos'
          break;

        }
        $.ajax({
          url:`${base_url}Cusuarios/${destino}`,
          data : $('#form1').serialize(),
          type: 'POST',
          success:function(data){
            $('#Act').attr('disabled',false);
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


  function modalData(usuario) {
    var detalle = '';
    $('#ID_usuario').val(usuario)
    $.getJSON(base_url+'Cusuarios/listar/'+usuario,function(data) {
      $('#Nom_usuario').val(data[0].Nom_usuario)
      $('#Tipo_cuenta').val(data[0].Tipo_cuenta)
      $('#Preg_1').val(data[0].Preg_1)
      $('#Res_1').val(data[0].Res_1)
      $('#Preg_2').val(data[0].Preg_2)
      $('#Res_2').val(data[0].Res_2)
      $('#Preg_3').val(data[0].Preg_3)
      $('#Res_3').val(data[0].Res_3)
      $('#estado').val(data[0].Activo)


      detalle += `
      <tr><th>Usuario:</th><td>${data[0].Nom_usuario}</td></tr>
      <tr><th>Tipo de Cuenta:</th><td>${data[0].Tipo_cuenta}</td></tr>
      <tr><th>Pregunta 1:</th><td>${data[0].Preg_1}</td></tr>
      <tr><th>Respuesta 1:</th><td>${data[0].Res_1}</td></tr>
      <tr><th>Pregunta 2:</th><td>${data[0].Preg_2}</td></tr>
      <tr><th>Respuesta 2:</th><td>${data[0].Res_2}</td></tr>
      <tr><th>Pregunta 3:</th><td>${data[0].Preg_3}</td></tr>
      <tr><th>Respuesta 3:</th><td>${data[0].Res_3}</td></tr>
      <tr><th>Estado:</th><td>${data[0].Activo}</td></tr>
      `;
      $('#detalle_registro').html(detalle)
    })
  }


  function jalar_data() {
    var content = '';
    $.getJSON(base_url+'Cusuarios/listar',function(data) {
      // console.log(data)
      $.each(data, function(i,item) {
        content += `
        <tr>
          <td>${item.Nom_usuario}</td>
          <td>${item.Tipo_cuenta}</td>
          <td>${item.Activo}</td>

          <td class="ver_registro" idr="${item.ID_usuario}"> <i class="fa fa-search"></i> </td>
          <td class="edi_registro" idr="${item.ID_usuario}"> <i class="fa fa-pencil"></i> </td>
          <td class="bor_registro" idr="${item.ID_usuario}"> <i class="fa fa-trash"></i>  </td>

        </tr>
        `;
      })
      $('#dataTables-table').html(content)
      $('#usuario').DataTable({
                  "responsive": true,
                  oLanguage:{
                    sSearch: 'Buscar:'
                  },
      });
    })
  }
