<div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Actualizar Datos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
    <form action="<?php echo base_url();?>cregistropersonal/actualizarDatos" method="POST" class="form-horizontal">
                  
         <div class="card-body">
         <div class="form-group">
         <label for="text" class="col-sm-4 control-label">Nombre</label>
         <div class="col-sm-10">
        <input type="text" class="form-control" name="P_nombre" id="inputEmail3" placeholder="Ingrese su Nombre">
        </div>


        <div class="form-group">
         <label for="text" class="col-sm-4 control-label"> Segundo Nombre</label>
         <div class="col-sm-10">
        <input type="text" class="form-control" name="S_nombre" id="inputEmail3" placeholder="Ingrese su  Segundo Nombre">
        </div>
     

        <div class="form-group">
         <label for="text" class="col-sm-4 control-label">Apellido</label>
         <div class="col-sm-10">
        <input type="text" class="form-control" name="P_apellido" id="inputEmail3" placeholder="Ingrese su Apellido">
        </div>


        <div class="form-group">
         <label for="text" class="col-sm-4 control-label"> Segundo Nombre</label>
         <div class="col-sm-10">
        <input type="text" class="form-control" name="S_apellido" id="inputEmail3" placeholder="Ingrese su Segundo Apellido">
        </div>

  

        <div class="form-group">
         <label for="text" class="col-sm-4 control-label">Cedula</label>
         <div class="col-sm-10">
        <input type="text" class="form-control" name="C_I" id="inputEmail3" placeholder="Ingrese su Cedula">
        </div>

        <div class="form-group">
         <label for="text" class="col-sm-4 control-label">Sexo</label>
         <div class="col-sm-10">
        <input type="text" class="form-control" name="Sexo" id="inputEmail3" placeholder="Ingrese su Sexo">
        </div>
    

        <div class="form-group">
         <label for="text" class="col-sm-4 control-label">Nacionalidad</label>
         <div class="col-sm-10">
        <input type="text" class="form-control" name="Nacionalidad" id="inputEmail3" placeholder="Ingrese su Nacionalidad">
        </div>

        <div class="form-group">
         <label for="text" class="col-sm-4 control-label">Estado Civil</label>
         <div class="col-sm-10">
        <input type="text" class="form-control" name="Estado_civil" id="inputEmail3" placeholder="Ingrese su Estado Civil">
        </div>

        <div class="form-group">
         <label for="date" class="col-sm-4 control-label">Fecha de Nacimiento</label>
         <div class="col-sm-10">
        <input type="date" class="form-control" name="Fecha_n" id="inputEmail3" placeholder="Ingrese su Fecha de Nacimiento">
        </div>

        <div class="form-group">
         <label for="text" class="col-sm-4 control-label">Tipo de Personal</label>
         <div class="col-sm-10">
        <input type="text" class="form-control" name="Tipo_pers" id="inputEmail3" placeholder="Ingrese su Cargo">
        </div>


        <div class="form-group">
         <label for="text" class="col-sm-4 control-label">Edad</label>
         <div class="col-sm-10">
        <input type="text" class="form-control" name="Edad" id="inputEmail3" placeholder="Ingrese su Edad">
        </div>

         <div class="card-footer">
         <button type="submit" class="btn btn-info">Actualizar</button>
         <button type="submit" class="btn btn-default float-right">Cancel</button>
         </div>
    </form>  


<div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Eliminar Datos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
    <form action="<?php echo base_url();?>cregistropersonal/eliminarDatos" method="POST" class="form-horizontal">
                  
         <div class="card-body">
         <div class="form-group">
         <label for="text" class="col-sm-4 control-label">Eliminar por Cedula</label>
         <div class="col-sm-10">
        <input type="text" class="form-control" name="C_I" id="inputEmail3" placeholder="Ingrese su Cedula">
        </div>
             <div class="card-footer">
         <button type="submit" class="btn btn-info">Eliminar</button>
         <button type="submit" class="btn btn-default float-right">Cancel</button>
         </div>
        </div>
    </div>
</form>
