var contador = 0;
var contadorDetalle = 0;
  $(function () {
    jalar_data();
    $('#btnNew').click(function() {
      contador = 0;
      view(contador);
      $("#C_I").attr('disabled', false)
      $('input').val('');
      $('#datosPer').show();
      $('#direccion').hide();
      $('#formacionAca').hide();
      $('#modal-overlay').modal('show')
      $('#accion').val('creado');
    })
  
    $('#sigPag').click(function() {
        contador += 1;
        view(contador);

    });

    $('#antPag').click(function() {
      contador -= 1;
      if (contador == 0) {
        $('#datosPer').show();
        $('#direccion').hide();
        $('#antPag').show();
        $('#sigPag').show();
        $('#Guardar').hide();
        $('#antPag').hide();
      } else if (contador == 1) {
        $('#direccion').show();
        $('#sigPag').show();
        $('#formacionAca').hide();
        $('#antPag').show();
        $('#Guardar').hide();
      } 
    });


    $('#sigPagDet').click(function() {
        contadorDetalle += 1;
        view_det(contadorDetalle); 
    });
  
    $('#antPagDet').click(function() {
      contadorDetalle -= 1;
      if (contadorDetalle == 0) {
        $('#0detalles').show();
        $('#1detalles').hide();
        $('#antPagDet').show();
        $('#sigPagDet').show();
        $('#Guardar').hide();
        $('#antPagDet').hide();
      } else if (contadorDetalle == 1) {
        $('#1detalles').show();
        $('#sigPagDet').show();
        $('#2detalles').hide();
        $('#antPagDet').show();
        $('#Guardar').hide();
      }
    });

    $('#seleccione').change(function(){
      var estado = $(this).val();
      if (estado != '') {
        if (estado == '0') {
          $('#Urb').hide();
          $('#zona').show();
        } else {
          $('#zona').hide();
          $('#Urb').show();
        }
      } else {
        $('#zona').hide();
        $('#Urb').hide();
      } 
    });
    
    $('#exp_lab').change(function(){
      var value = $(this).val();
      if (value != "") {
        if (value == 0) {
          $('#exp_lab_extra').hide();
        } else {
          $('#exp_lab_extra').show();
        }
      } else {
        $('#exp_lab_extra').hide();
      }
    });

    $('#Actual_instruct').change(function(){
      var value = $(this).val();
      if (value != "") {
        if (value == "No") {
          $('#extra_estudio').hide();
        } else {
          $('#extra_estudio').show();
        }
      } else {
        $('#extra_estudio').hide();
      }
    });

    $('#dataTables-table').on('click','.edi_registro',function(e) {
      e.preventDefault()
      $("#C_I").attr('disabled', true)
      var idr = $(this).attr('idr')
      $('#accion').val('editado')
      modalData(idr)
      $('#modal-overlay').modal('show')
    })

    $('#dataTables-table').on('click','.ver_registro',function(e) {
      e.preventDefault()
      contadorDetalle = 0;
      view_det(contadorDetalle);
      $('#0detalles').show();
      $('#1detalles').hide();
      $('#2detalles').hide();
      var idr = $(this).attr('idr')
      $('#accion').val('ver')
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

    $('#eli_btn').click(function() {
      $('#form1').submit()
    });

    $('#ExiHijos').change(function(){
      var value = $(this).val();
      if (value != "") {
        if (value == "Presenta") {
          $('#GradoHijo').show();
        } else {
          $('#GradoHijo').hide();
        }
      } else {
        $('#GradoHijo').hide();
      }
    });

    $('#form1').submit(function(e) {
        e.preventDefault()
        $('#Guardar').attr('disabled',true);

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
          url:`${base_url}Cregistropersonal/${destino}`,
          data : $('#form1').serialize(),
          type: 'POST',
          success:function(data){
            $('#C_I').attr('disabled',false)
            $('#Guardar').attr('disabled',false);
            if (data.exito == true) {
              $("#Personal").DataTable().destroy()
              jalar_data();
              alert(`${data.mensaje}`);
            } else {
              alert(`${data.mensaje}`);
            }
            $('#modal_borrar').modal('hide')
            $("#modal-overlay").modal("hide");
          },
          error:function(data) {
            $('#C_I').attr('disabled', false)
            $('#Guardar').attr('disabled',false);
            alert('Error!','Hubo un error en el proceso','error')
          }
        })
      })


  });

  $('.input-date-single-range').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    locale: {
      direction: 'YYYY-MM-DD',
    }
  });
  function view(contador) {
    if (contador == 1) {
      $('#antPag').show();
      $('#datosPer').hide();
      $('#direccion').show();
      $('#sigPag').show();
      $('#Guardar').hide();
    } else if (contador == 2) {
      $('#antPag').show();
      $('#sigPag').hide();
      $('#direccion').hide();
      $('#formacionAca').show();
      $('#Guardar').show();
    } else if (contador == 0) {
      $('#sigPag').show();
      $('#Guardar').hide();
      $('#antPag').hide();
    }
  }
  function view_det(contadorDetalle) {
    if (contadorDetalle == 1) {
      $('#antPagDet').show();
      $('#0detalles').hide();
      $('#1detalles').show();
      $('#sigPagDet').show();
      $('#Guardar').hide();
      
    } else if (contadorDetalle == 2) {
      $('#antPagDet').show();
      $('#sigPagDet').hide();
      $('#1detalles').hide();
      $('#2detalles').show();
      $('#Guardar').show();
      
    } else if (contadorDetalle == 0) {
      $('#sigPagDet').show();
      $('#antPagDet').hide();
    }
  }
  function modalData(idr) {
    var detalle = '';
    var detalle1 = "";
    var detalle2 = "";
    $.getJSON(base_url+'Cregistropersonal/listar/'+idr,function(data) {
      $('#P_nombre').val(data[0].P_nombre)
      $('#S_nombre').val(data[0].S_nombre)
      $('#P_apellido').val(data[0].P_apellido)
      $('#S_apellido').val(data[0].S_apellido)
      $('#C_I').val(data[0].C_I)
      $('#C_I').attr('disabled',true)
      $('#cboSexo').val(data[0].Sexo)
      $('#tipo_pers').val(data[0].Tipo_pers)
      $('#Fecha_n').val(data[0].Fecha_n)
      $('#Edad').val(data[0].Edad)
      $('#est_civ').val(data[0].Estado_civil)
      $('#idr').val(data[0].C_I)
      if (data[0].Num_calle != null) {
        $('#seleccione').val(1);
        $('#Num_calle').val(data[0].Num_calle)
        $('#Num_casa').val(data[0].Num_casa)
        $('#Urb').val(data[0].Urb)
      } else {
        $('#seleccione').val(0);
        $('#Calle').val(data[0].Calle)
        $('#Cod_postal').val(data[0].Cod_postal)
        $('#Sector').val(data[0].Sector)
      }

      $('#Nombre_inst').val(data[0].Nombre_inst)
      $('#Titulo').val(data[0].Titulo)
      $('#Grado').val(data[0].Grado)
      $('#Año_for_a').val(data[0].Año_for_a)
      $('#Nivel_curso').val(data[0].Nivel_curso)
      $('#Tipo_correo').val(data[0].Tipo_correo)
      $('#Area_telf').val(data[0].Area_telf)
      $('#Tipo_telf').val(data[0].Tipo_telf)
      $('#Num_telf').val(data[0].Num_telf)
      $('#turno').val(data[0].turno)
      $('#horas_trab').val(data[0].horas_trab)
      $('#habilidades').val(data[0].habilidades)
      $('#ocupacion_2').val(data[0].ocupacion_2)
      $('#exp_lab').val(data[0].exp_lab)
      $('#oficial_exp_lab').val(data[0].oficial_exp_lab)
      $('#priv_exp_lab').val(data[0].priv_exp_lab)
      $('#Nivel_curso').val(data[0].Nivel_curso)
      $('#Actual_instruct').val(data[0].Actual_instruct)
      $('#Grado_actual_instruc').val(data[0].Grado_actual_instruc)
      $('#titulo_fecha').val(data[0].titulo_fecha)
      $('#credencial_titulo').val(data[0].credencial_titulo)
      $('#cod_dir').val(data[0].Cod_dir)
      detalle += `
      <tr><th>Nombre:</th><td>${data[0].P_nombre}</td></tr>
      <tr><th>Segundo Nombre:</th><td>${data[0].S_nombre}</td></tr>
      <tr><th>Apellido:</th><td>${data[0].P_apellido}</td></tr>
      <tr><th>Segundo Apellido:</th><td>${data[0].S_apellido}</td></tr>
      <tr><th>Cedula de identidad:</th><td>${data[0].C_I}</td></tr>
      <tr><th>Sexo:</th><td>${data[0].Sexo}</td></tr>
      <tr><th>Tipo personal:</th><td>${data[0].Tipo_pers}</td></tr>
      <tr><th>Fecha de Nacimiento:</th><td>${data[0].Fecha_n}</td></tr>
      <tr><th>Edad:</th><td>${data[0].Edad}</td></tr>
      <tr><th>Estado civil:</th><td>${data[0].Estado_civil}</td></tr>
      <tr><th>Turno:</th><td>${data[0].turno}</td></tr>
      <tr><th>Horario:</th><td>${data[0].horas_trab}</td></tr>
      `;
      var dato;
      if(data[0].Urb != ''){
      dato = `
      <tr><th>Urbanizacion:</th><td>${data[0].Urb}</td></tr>
      <tr><th>Numero de calle:</th><td>${data[0].Num_calle}</td></tr>
      <tr><th>Numero de casa:</th><td>${data[0].Num_casa}</td></tr>
      `;
      } else {
      dato = `
      <tr><th>Sector:</th><td>${data[0].Sector}</td></tr>
      <tr><th>Calle:</th><td>${data[0].Calle}</td></tr>
      <tr><th>Codigo postal:</th><td>${data[0].Cod_postal}</td></tr>
        `
      }
      var exp_lab1 = '';
      if (data[0].exp_lab == 0) {
        exp_lab1 = `
        <tr><th>Experiencia laboral:</th><td>No presenta</td></tr>
        `
        ;
      } else {
        exp_lab1 = `
        <tr><th>Experiencia laboral:</th><td>Presenta</td></tr>
        <tr><th>Tiempo Oficial:</th><td>No presenta</td></tr>
        <tr><th>Tiempo Privada:</th><td>No presenta</td></tr>
        `;
      }
      detalle1 += `
      ${dato}
      
      <tr><th>Habilidades:</th><td>${data[0].habilidades}</td></tr>
      <tr><th>Ocupacion extra:</th><td>${data[0].ocupacion_2}</td></tr>
      ${exp_lab1}
      `;
      var extra = '';
      if (data[0].Actual_instruct == 'Si') {
        extra = `
      <tr><th>Intruccion actual:</th><td>${data[0].Actual_instruct}</td></tr>
      <tr><th>Grado:</th><td>${data[0].Grado_actual_instruc}</td></tr>
        `
      }
      var telefonos = '';
      $.each(data[0].numero,function(i,item){
        if (item.numero.Num_telf != '') {
          telefonos += `
          <tr><th>Numero de telefono ${i}:</th><td>${item.numero.Num_telf}</td></tr>
          `;
        }
      });
      detalle2 += `
      <tr><th>Nombre instituto:</th><td>${data[0].nombre_inst}</td></tr>
      <tr><th>Titulo:</th><td>${data[0].Titulo}</td></tr>
      <tr><th>Año:</th><td>${data[0].Año_for_a}</td></tr>
      <tr><th>Correo:</th><td>${data[0].Tipo_correo}</td></tr>
      <tr><th>Credencial de titulo:</th><td>${data[0].credencial_titulo}</td></tr>
      <tr><th>Grado actual:</th><td>${data[0].Grado_actual_instruc == null ? 'No existe' : data[0].Grado_actual_instruc}</td></tr>
      ${telefonos}
      ${extra}
      `;
      $('#detalles').html(detalle)
      $('#detalles1').html(detalle1)
      $('#detalles2').html(detalle2)
    });
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
          <td>${item.fecha_ingreso}</td>
          <td class="ver_registro" idr="${item.C_I}"><i class="fa fa-eye"></i></td>
          <td class="edi_registro" idr="${item.C_I}"><i class="fa fa-cog"></i></td>
          <td class="bor_registro" idr="${item.C_I}"><i class="fa fa-trash"></i></td>

        </tr>
        `;
      });
      $('#dataTables-table').html(content)
      $('#Personal').DataTable({
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
