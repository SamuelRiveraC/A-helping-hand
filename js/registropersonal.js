  $(function () {
    jalar_data();
    $('#btnNew').click(function() {
      $('#modal-overlay').modal('show')
      $('#accion').val('nuevo')
    })

    $('#dataTables-table').on('click','.edi_registro',function(e) {
      e.preventDefault()

      var idr = $(this).attr('idr')
      $('#accion').val('editar')
      modalData(idr)
      $('#modal-overlay').modal('show')
    })

    $('#dataTables-table').on('click','.ver_registro',function(e) {
      e.preventDefault()

      var idr = $(this).attr('idr')
      $('#accion').val('ver')
      modalData(idr)
      $('#modal_ver').modal('show')
    })

    $('#dataTables-table').on('click','.bor_registro',function(e) {
      e.preventDefault()

      var idr = $(this).attr('idr')
      $('#accion').val('borrar')
      modalData(idr)
      $('#modal_borrar').modal('show')
    })

    $('#eli_btn').click(function() {
      $('#form1').submit()
    })



    $('#form1').submit(function(e) {
        e.preventDefault()
        $('#Guardar').attr('disabled',true);

        let accion = $("#accion").val()
        switch (accion) {
          case 'nuevo':
          var destino = 'ins'
          break;
          case 'editar':
          var destino = 'actualizarDatos'
          break;
          case 'borrar':
          var destino = 'eliminarDatos'
          break;

        }
        $.ajax({
          url:`${base_url}Cregistropersonal/${destino}`,
          data : $('#form1').serialize(),
          type: 'POST',
          success:function(data){
            $('#Guardar').attr('disabled',false);
            $("#Personal").DataTable().destroy()
            jalar_data();
            $('#modal_borrar').modal('hide')
            $("#modal-overlay").modal("hide");
          },
          error:function(data) {
            alert('Error!','Hubo un error en el proceso','error')
          }
        })
      })


  });


  function modalData(idr) {
    var detalle = '';
    $.getJSON(base_url+'Cregistropersonal/listar/'+idr,function(data) {
      $('#P_nombre').val(data[0].P_nombre)
      $('#S_nombre').val(data[0].S_nombre)
      $('#P_apellido').val(data[0].P_apellido)
      $('#S_apellido').val(data[0].S_apellido)
      $('#cboSexo').val(data[0].Sexo)
      $('#Nacionalidad').val(data[0].Nacionalidad)
      $('#Fecha_n').val(data[0].Fecha_n)
      $('#Edad').val(data[0].Edad)
      $('#C_I').val(data[0].C_I)
      $('#est_civ').val(data[0].Estado_civil)
      $('#tipo_pers').val(data[0].Tipo_pers)
      $('#idr').val(data[0].C_I)



      detalle += `
      <tr><th>Nombre:</th><td>${data[0].P_nombre}</td></tr>
      <tr><th>Segundo Nombre:</th><td>${data[0].S_nombre}</td></tr>
      <tr><th>Apellido:</th><td>${data[0].P_apellido}</td></tr>
      <tr><th>Segundo Apellido:</th><td>${data[0].S_apellido}</td></tr>
      <tr><th>Sexualidad:</th><td>${data[0].Sexo}</td></tr>
      <tr><th>Nacionalidad:</th><td>${data[0].Nacionalidad}</td></tr>
      <tr><th>Fecha:</th><td>${data[0].Fecha_n}</td></tr>
      <tr><th>Edad:</th><td>${data[0].Edad}</td></tr>
      <tr><th>Cedula de identidad:</th><td>${data[0].C_I}</td></tr>
      <tr><th>Estado civil:</th><td>${data[0].Estado_civil}</td></tr>
      <tr><th>Tipo personal:</th><td>${data[0].Tipo_pers}</td></tr>

      `;
      $('#detalles').html(detalle)
    })
  }


  function jalar_data() {
    var content = '';
    $.getJSON(base_url+'Cregistropersonal/listar',function(data) {
      $.each(data, function(i,item) {
        content += `
        <tr>
          <td>${item.P_nombre +' '+item.S_nombre}</td>
          <td>${item.P_apellido+' '+item.S_apellido}</td>
          <td>${item.C_I}</td>
          <td>${item.Tipo_pers}</td>
          <td>${item.Sexo}</td>
          <td class="ver_registro" idr="${item.C_I}"><i class="fa fa-search"></i> </td>
          <td class="edi_registro" idr="${item.C_I}"><i class="fa fa-pencil"></i> </td>
          <td class="bor_registro" idr="${item.C_I}"><i class="fa fa-trash-o"></i> </td>

        </tr>
        `;
      })
      $('#dataTables-table').html(content)
      $('#Personal').DataTable({
                  "responsive": true,
                  oLanguage:{
                    sSearch: 'Buscar:'
                  },
      });
    })
  }
