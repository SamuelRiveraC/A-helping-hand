<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BIENVENIDOS A SISCA.PP</title>


  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<style>
  .login-page {
    background-image: url("<?php echo base_url();?>assets/bg.jpeg");
    background-size: cover;
  }
</style>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="<?php echo base_url();?>/assets/siscapp.png" alt="logo" width="256px">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Iniciar Sesion</p>

       <form action="<?php echo base_url();?>clogin/ingresar" method="POST">

        <div class="input-group mb-3">
          <input type="text" class="form-control" id="NomUsuario" name="Nom_usuario" placeholder="Ingrese su Usuario">
          <div class="input-group-append input-group-text">
              <span class="fas fa-user"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="Password" placeholder="Ingrese su Contraseña">
          <div class="input-group-append input-group-text">
              <span class="fas fa-lock"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-1">
        <a href="#" id='lost_pas'>¿Ha olvidado su contraseña?</a><br>
      </p>

      <?php if ($mensaje) { ?>
        <div class="alert alert-danger my-5 text-center">
          <?php echo $mensaje;?>
        </div>
      <?php } ?>


    </div>
    <!-- /.login-card-body -->
  </div>
</div>






      <div class="modal fade" id="modal-overlay">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Recuperando contraseña</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id='form1'>
                <div class="form-group">
                  <label  class="col-sm-4 control-label" id='Pregunta_1'>Pregunta 1</label>

                  <div class="col-sm-10">
                    <input type="input" class="form-control" id="preg1" placeholder="Respuesta">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-4 control-label" id='Pregunta_2'>Preguntas 2</label>

                  <div class="col-sm-10">
                    <input type="input" class="form-control" id="preg2" placeholder="Respuesta">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-4 control-label" id='Pregunta_3'>Preguntas 3</label>

                  <div class="col-sm-10">
                    <input type="input" class="form-control" id="preg3" placeholder="Respuesta">
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id='recu'>Recuperar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->




      <div class="modal fade" id="modal-overlay-last">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Contraseña Generada</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h2 id='clavImp'></h2>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

  <!-- /.login-box -->
  </div>
  <!-- /.content-wrapper -->
 <footer class="login-footer text-center text-light">
    <strong>Copyright &copy; <?php echo date("Y") ?> SISCA.PP by MSSN</a>.</strong>  All rights reserved.
    <br>  <img src="<?php echo base_url();?>/assets/ueppp.png" alt="logo" width="128px">
  </div>
  </footer>
<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
  const BASE_URL = '<?= base_url() ?>';
</script>
<script src="<?php echo base_url(); ?>js/login.js" charset="utf-8"></script>
</body>
</html>
