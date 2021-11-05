<section class="content">
  <div class="row justify-content-center mb-5">
    <div class="col-md-12">
    	<h1>Lorem	</h1>
    </div>

    <div class="col-12 col-sm-10 col-md-8 col-lg-6">
	    <div class="card">
    		<h2>Importar base de datos</h2>
    		<form id="formImport">
    		<button id="import_btn" class="btn btn-primary">
    			Importar base de datos
    		</button>
    		</form>
   		</div>
   	 </div>
 </div>


 <div class="row justify-content-center mt-5">

    <div class="col-12 col-sm-10 col-md-8 col-lg-6">
	    <div class="card">
    		<h2>Exportar base de datos</h2>

    		<form enctype="multipart/form-data" id="formExportar">
    			<input type="file" name="mysqlfile" label="Exportar base de datos">

    			<button id="export_btn" type="button" class="btn btn-primary">
    				Importar base de datos
    			</button>
    		</form>
   		</div>
   	 </div>


  </div>
</section>

<?php $this->load->view("layout/scripts") ?>


<script type="text/javascript">
$(document).ready((){

	$('#formExportar').submit(function(e) { //Enviar datos Nueva Amonestacion
      e.preventDefault()
      
      $('#export_btn').attr('disabled',true);

      $.ajax({
        url:`${base_url}Camonestacion/ins_Amonestacion`,
        data : $('#formExportar').serialize(),
        type: 'POST',
        success:function(data){
          $('#export_btn').attr('disabled',false);
          alert('Base de datos exportada exitosamente')
        },
        error:function(data) {
          $('#export_btn').attr('disabled',false);
          alert('Error!','Hubo un error en el proceso','error')
        }
      })
    })


	$('#formImport').submit(function(e) { //Enviar datos Nueva Amonestacion
      e.preventDefault()
      
      $('#import_btn').attr('disabled',true);

      $.ajax({
        url:`${base_url}Camonestacion/ins_Amonestacion`,
        data : $('#formImport').serialize(),
        type: 'POST',
        success:function(data){
          $('#import_btn').attr('disabled',false);
          alert('Base de datos exportada exitosamente')
        },
        error:function(data) {
          $('#import_btn').attr('disabled',false);
          alert('Error!','Hubo un error en el proceso','error')
        }
      })
    })

})
</script>