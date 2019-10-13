 <div class="col-md-12">
  <!-- Horizontal Form -->
<div class="card card-info">
<div class="card-header">
    <h3 class="card-title">Registrar Nuevo Personal</h3>
    </div>
              <!-- /.card-header -->
              <!-- form start -->
          <form action="<?php echo base_url();?>cregistropersonal/Guardar" method="POST" class="form-horizontal">

          <form >
         <div class="card-body">
         <div class="form-group">
         <label for="text" class="col-sm-4 control-label">Nombre</label>
         <div class="col-sm-10">
        <input type="text" class="form-control" name="P_nombre" id="P_nombre" placeholder="Ingrese su Nombre">
        </div>


        <div class="form-group">
         <label for="text" class="col-sm-4 control-label"> Segundo Nombre</label>
         <div class="col-sm-10">
        <input type="text" class="form-control" name="S_nombre" id="S_nombre" placeholder="Ingrese su  Segundo Nombre">
        </div>


        <div class="form-group">
         <label for="text" class="col-sm-4 control-label">Apellido</label>
         <div class="col-sm-10">
        <input type="text" class="form-control" name="P_apellido" id="P_apellido" placeholder="Ingrese su Apellido">
        </div>


        <div class="form-group">
         <label for="text" class="col-sm-4 control-label">Segundo Nombre</label>
         <div class="col-sm-10">
        <input type="text" class="form-control" name="S_apellido" id="S_apellido" placeholder="Ingrese su Segundo Apellido">
        </div>



        <div class="form-group">
         <label for="text" class="col-sm-4 control-label">Sexo</label>
        <select class="form-control" id="cboSexo" name='Sexo'>
            <div class="col-sm-10">
            <option value ="">Escoga una opción</option>
            <option value="Femenino">Femenino</option>
            <option value="Masculino">Masculino</option>
            <option value="Otro">Otro</option>
        </select>
        </div>

        <div class="form-group">
         <label for="text" class="col-sm-4 control-label">Nacionalidad</label>
         <div class="col-sm-10">
        <input type="text" class="form-control" name="Nacionalidad" id="Nacionalidad" placeholder="Ingrese su Nacionalidad">
        </div>


         <div class="form-group">
         <label for="text" class="col-sm-4 control-label">Estado Civil</label>
         <div class="col-sm-10">
        <select class="form-control" name='Estado_civil'>
            <option value ="">Escoga una opción</option>
            <option value="Soltero">Soltero/a</option>
            <option value="Casado">Casado/a</option>
            <option value="Divorciado">Divorciado/a</option>
            <option value="Viudo">Viudo/a</option>
            <option value="Otro">Otro</option>
        </select>
        </div>

        <div class="form-group">
         <label for="date" class="col-sm-4 control-label">Fecha de Nacimiento</label>
         <div class="col-sm-10">
        <input type="date" class="form-control" name="Fecha_n" id="Fecha_n" placeholder="Ingrese su Fecha de Nacimiento">
        </div>


         <div class="form-group">
         <label for="text" class="col-sm-4 control-label">Tipo de Personal</label>
         <div class="col-sm-10" >
        <select class="form-control" name='Tipo_pers'>
            <option value ="">Escoga una opción</option>
            <option value="Administrativo">Administrativo</option>
            <option value="Docente">Docente</option>
            <option value="Obrero">Obrero</option>
        </select>
        </div>


        <div class="form-group">
         <label for="text" class="col-sm-4 control-label">Edad</label>
         <div class="col-sm-10">
        <input type="text" class="form-control" name="Edad" id="Edad" placeholder="Ingrese su Edad">
        </div>

         <div class="card-footer">
         <button type="submit" class="btn btn-info">Guardar</button>
    </table>

        <div class="form-group">
         <label for="text" class="col-sm-4 control-label">Cedula</label>
         <div class="col-sm-10">
        <input type="text" class="form-control" name="C_I"  placeholder="Ingrese su Cedula">
        </div>


        <section>
            <br><br>
            <!-- <?php echo $output; ?> -->

        </section>



         <!-- <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?> -->




</div>
</div>
</div>
