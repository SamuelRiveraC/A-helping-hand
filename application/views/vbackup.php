<section class="content">


  <div class="row justify-content-center mb-5">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6">
	    <div class="card py-5 px-5">
    		<h2 class="pb-5">Exportar base de datos</h2>
    		<form id="formExport">
    		<a href="/CBackup/export" target="_blank" id="export_btn" class="btn btn-primary">
    			Exportar base de datos
    		</a>
    		</form>
   		</div>
   	 </div>
  </div>


  <div class="row justify-content-center mt-5">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6">
	    <div class="card py-5 px-5">
    		<h2 class="pb-5">Importar base de datos</h2>

    		<form enctype="multipart/form-data" method="post" id="formImport" action="/CBackup/import">

          <input id="filesql" type="file" name="mysqlfile" label="Importar base de datos">
    			<input id="import_btn" type="submit" class="btn btn-primary" value="Importar base de datos">

    		</form>
   		</div>
   	 </div>


  </div>
</section>

<?php $this->load->view("layout/scripts") ?>