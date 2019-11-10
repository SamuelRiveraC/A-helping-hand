var res1, res2,res3,id
$(function() {

  $('#lost_pas').click(function() {
    var nombre = $('#NomUsuario').val()
    if ($('#NomUsuario').val().length > 3) {
      $.post(BASE_URL+'Clogin/obtener_preg/'+nombre,function(data) {
        // console.log(data[0].Preg_1)
        $('#Pregunta_1').html(data[0].Preg_1)
        $('#Pregunta_2').html(data[0].Preg_2)
        $('#Pregunta_3').html(data[0].Preg_3)
        res1 = data[0].Res_1
        res2 = data[0].Res_2
        res3 = data[0].Res_3
        id = data[0].ID_usuario
        $('#modal-overlay').modal('show')
      })
    } else {
      alert('El campo Usuario no puede estar vacio')
    }
  })


  $('#recu').click(function() {
    var preg1 = $('#preg1').val()
    var preg2 = $('#preg2').val()
    var preg3 = $('#preg3').val()
    if (res1 == preg1 && res2 == preg2 && res3 == preg3) {
    $.getJSON(BASE_URL+'Clogin/recuperar_contra/'+id,function(data) {
      $('#clavImp').html(data)
      $('#modal-overlay').modal('hide')
      $('#modal-overlay-last').modal('show')

    })
    } else {
      alert('Sus Respuestas no coinciden')
    }
  })


})
