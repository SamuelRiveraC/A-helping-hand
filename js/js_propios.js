

/** FUNCIONES PARA SMARTSOL ****/
function _activaTab(tab){
  $('.nav-tabs a[href="#' + tab + '"]').tab('show');
}

function comboselect(id,ruta,frase,id_valor,id_muestra,form,campodestino,retorno=null) {
//alert(ruta);
//console.log(id+' '+id_valor);

    const promesa = new Promise(function(resolve, reject) {
               var lista='<option value=""> '+frase+' </option>';
               var ret = new Array();
                  var selected='';
                  $.getJSON(ruta, function(data) {
                    $.each(data, function(k,item){

                      if (parseInt(eval(id_valor))==parseInt(id)) {selected=" selected"; } else {selected="";};
                      lista=lista+'<option value="'+eval(id_valor)+'" '+selected+'>'+eval(id_muestra)+' </option> ';

                      if (retorno != null ) {
                        //Retorno devuelve un array con el valor indicado
                        ret[eval(id_valor)] = eval(retorno);
                        console.log(eval(retorno));
                      }

                      }); // Fin de Each

                    $('#'+form+' #'+campodestino).html(lista);
                    $('#'+form+' #'+campodestino).val(id).trigger("change");

                    resolve(ret);

                  });
    });

    return promesa;

}

function comboselectmultiple(id,ruta,frase=null,id_valor,id_muestra,form,campodestino) {
//       console.log(id+' '+id_valor);
 var lista='';
    var selected='';
    $.getJSON(ruta, function(data) {
      $.each(data, function(k,item){


        lista+='<option value="'+eval(id_valor)+'" >'+eval(id_muestra)+' </option> ';
        }); // Fin de Each
 //       console.log('#'+form+' #'+campodestino+' '+lista);
      $('#'+form+' #'+campodestino).html(lista);
      $('#'+form+' #'+campodestino).val(id).trigger("change");
    });

}

    function limpiaForm(miForm) {
// recorremos todos los campos que tiene el formulario
$('#'+miForm).find(':input').each(function(){
  var type = this.type, tag = this.tagName.toLowerCase();
  if (type == 'text' || type == 'password' || tag == 'textarea' || type == 'number' || type == 'date')
    this.value = '';
  else if (type == 'checkbox' || type == 'radio')
    this.checked = false;
  else if (tag == 'select')
    this.selectedIndex = 0;
})

}


function dateFormat(date,format='DD-MM-YYYY') {
  fech = moment(`${date}`).format(format)

  if (fech === "Invalid date") {
      fech = date;
      console.log(`Error al formato: ${date}`);
  }

  return fech;
}





Number.prototype.padLeft = function(base,chr){
   var  len = (String(base || 10).length - String(this).length)+1;
   return len > 0? new Array(len).join(chr || '0')+this : this;
}


function fechaActual() { // YYYY/MM/DD hh:mm:ss
  var d = new Date();
  dformat = [d.getFullYear(),(d.getMonth()+1).padLeft(), d.getDate().padLeft()].join('/')+
  ' ' +
  [ d.getHours().padLeft(),
    d.getMinutes().padLeft(),
    d.getSeconds().padLeft()].join(':');
    return dformat;
  }


  function horaNow() { // YYYY/MM/DD hh:mm:ss
    var d = new Date();
    var dformat = [ d.getHours().padLeft(),
      d.getMinutes().padLeft(),
      d.getSeconds().padLeft()].join(':');
      return dformat;
    }




/*
  parsePhone
  @param num -> numero de telefono sin codigo

*/

function utfdecode(s) {
var r = s.toLowerCase();
    r = r.trim();
   r = r.replace(/<[^>]*>/g, '')
   r = r.replace(/[A-Z a-z]*\//g,"")
return r;
}

function parsePhone(num) {
  num = num.replace(/\s/g, "");
  num = num.replace(/-/g, "");
  num = num.replace(/[A-z]/g, "");
  return num;
}
