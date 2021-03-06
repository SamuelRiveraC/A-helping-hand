var ifshow = false;
  $(function () {
    jalar_data();
    //nuevo usuario
    $('#btnNew').click(function() {
      $("input").val('')
      $("#mess").html('Guardar');
      $('#Password').attr('required',true);
      $('#confir_pass').attr('required',true);
      $('#modal-overlay').modal('show')
      $('#accion').val('creado')
    });
    //editar registro de usuario
    $('#dataTables-table').on('click','.edi_registro',function(e) {
      e.preventDefault()
      $("#mess").html('Actualizar');
      $('#Password').removeAttr('required');
      $('#confir_pass').removeAttr('required');
      var idr = $(this).attr('idr')
      $('#accion').val('editado')
      modalData(idr)
      $('#modal-overlay').modal('show')
    })
    //ver registro de usuario
    $('#dataTables-table').on('click','.ver_registro',function(e) {
      e.preventDefault()
      $('#tabla_respuestas').hide();
      var idr = $(this).attr('idr')
      modalData(idr)
      $('#modal_ver').modal('show')
    })

    //borrar datos de usuario
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
    //ver respuestas de las preguntas secretas
    $('#ver_answer').click(function() {
      if (ifshow) {
        ifshow = false;
        $('#tabla_respuestas').hide();
      } else {
        ifshow = true;
        $('#tabla_respuestas').show();
      }
    });
    //busqueda sensitiva de usuarios
    $("#Nom_usuario").keyup(function () {
      if($('#accion').val()=='creado'){
        $("#Act").attr('disabled', true)
       
        $.ajax({
          url: base_url+'Cusuarios/getUsers',
          type:'POST',
          data: {
            string: $(this).val()
          },
          success: (data) => {
            
            if(data==false){
              $("#Act").attr('disabled', false)
            }else{
              $("#Act").attr('disabled', true)
            }
          },
          error: (e) => {
            console.log('error'+e)
            alert('error')
          }
        })
      }
      
    })
    //envio de formulario de usuario

    $('#form1').submit(function(e) {
        e.preventDefault()
        if ($('#Password').val() == $('#confir_pass').val()) {
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

              alert('El nombre de usuario no se puede repetir')
            }
          })

        } else {
          alert('Las claves no coinciden');
        }
      })
    //detectar existencia de la cedula
    $('#C_Isearch').keyup(function () {
      var input = $('#C_Isearch').val();
      if (input != '') {
        if (input.length > 1) {
          getInput(input);
          
          getCI(input);
        }
      }
    });
    //obtener si cedula existe
    $('#listaUsuario').on('click', '.existCli', function (e) {
      $('#listaUsuario').empty();
      e.preventDefault();
      var id = $(this).data('id');
      var datos = $(this).html();
      $('#form1 #C_I').val(id);
      $('#C_Isearch').val(datos);
      string = datos.split('-');
      getCI(string[0].trim());
    });

  });
//obtener parecidos por cedeula y nombre
function getInput(input) {
  $('#listaUsuario').empty();
  $.post(base_url + 'Cusuarios/getLike_', { data: input }, function (data) {
    var count = Object.keys(data).length;
    var objectFor = {
      datos: data,
      objectLength: count,
    }
    comboselect1(objectFor,count);
  });
}

//function para obtener cedula identintidad existente
function getCI(input) {

  if($('#accion').val()=='creado'){
    $("#Act").attr('disabled', true)
   
    $.ajax({
      url: base_url+'Cusuarios/getCI',
      type:'POST',
      data: {
        string: input
      },
      success: (data) => {
        
        if(data==false){
          $("#Act").attr('disabled', true)
        }else{
          if(input.length >= 7 && input.length <= 9){
            $("#Act").attr('disabled', false)
          }
          
        }
      },
      error: (e) => {
        console.log('error'+e)
        alert('error')
      }
    })
  }
}
//comboselect dinamico
function comboselect1(object,count) {
  if (count > 0) {
    var lis = "";
    $.each(object.datos,function(i,item) {
      lis += `
        <li data-id="${item.C_I}" class="cli_li_list existCli">${item.C_I} - ${item.P_nombre} </li>
      `;
    });
    var lista = "";
    lista = `    
    <div class="row">
      <div class="col-sm-12">
        <ul class="cli_list" id="cli_list" style="padding-left:0px">
          ${lis}
          
        </ul>
      </div>
    </div>`;
    $('#listaUsuario').html(lista);
  } else {
    var lista = "";
    lista = `    
    <div class="row">
      <div class="col-sm-12">
        <ul class="cli_list" id="cli_list" style="padding-left:0px">
          <li class="cli_li_list_no">No hubo resultados en la busqueda</li>
          
        </ul>
      </div>
    </div>`;
    $('#listaUsuario').html(lista);
  }

}


//armado de modal ver y editar
  function modalData(usuario) {
    var detalle = '';
    var respuestas = "";
    $('#ID_usuario').val(usuario)
    $.getJSON(base_url+'Cusuarios/listar/'+usuario,function(data) {
      $('#Nom_usuario').val(data[0].Nom_usuario)
      $('#Tipo_cuenta').val(data[0].Tipo_cuenta)
      $('#Preg_1').val(data[0].Preg_1)
      $('#Preg_2').val(data[0].Preg_2)
      $('#Preg_3').val(data[0].Preg_3)
      $('#Res_1').val(data[0].Res_1)
      $('#Res_2').val(data[0].Res_2)
      $('#Res_3').val(data[0].Res_3)
      $('#C_I').val(data[0].C_I);
      $('#C_Isearch').val(data[0].C_I);

      detalle += `
      <tr><th>Usuario:</th><td>${data[0].Nom_usuario}</td></tr>
      <tr><th>Tipo de Cuenta:</th><td>${data[0].Tipo_cuenta}</td></tr>
      <tr><th>Pregunta 1:</th><td>${data[0].Preg_1}</td></tr>
      <tr><th>Pregunta 2:</th><td>${data[0].Preg_2}</td></tr>
      <tr><th>Pregunta 3:</th><td>${data[0].Preg_3}</td></tr>
      `;
      respuestas += `
      <tr><th>Respuesta 1:</th><td>${data[0].Res_1}</td></tr>
      <tr><th>Respuesta 2:</th><td>${data[0].Res_2}</td></tr>
      <tr><th>Respuesta 3:</th><td>${data[0].Res_3}</td></tr>
      `;
      $('#detalle_registro').html(detalle)
      $('#respuestas_sec').html(respuestas);
    })
  }


  function jalar_data() { //trae datos de base de datos para mostrar en la tabla
    var content = '';
    $.getJSON(base_url+'Cusuarios/listar',function(data) {
      $.each(data, function(i,item) {
        content += `
        <tr>
          <td>${item.Nom_usuario}</td>
          <td>${item.Tipo_cuenta}</td>
          <td class="ver_registro" idr="${item.ID_usuario}"> <i class="fa fa-eye"></i> </td>
          <td class="edi_registro" idr="${item.ID_usuario}"> <i class="fa fa-cog"></i> </td>
        `;
        if (item.Tipo_cuenta == "Administrador") {
          content += `<td></td>`
        } else {
          content += `<td class="bor_registro" idr="${item.ID_usuario}"> <i class="fa fa-trash"></i></td>`
        }
        content += `</tr>`
      })
      //inicializacion de datatable
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
