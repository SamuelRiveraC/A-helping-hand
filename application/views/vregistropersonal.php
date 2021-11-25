<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="col-md-2" style="padding-bottom:20px">
        <button type="button" class="btn btn-block btn-primary" id='btnNew'>Registrar Personal</button>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Personal</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="Personal" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Cedula</th>
                        <th>Tipo Personal</th>
                        <th>Sexo</th>
                        <th>Fecha ingreso</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="dataTables-table">

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="modal fade" id="modal-overlay" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Registrar Datos del Nuevo Personal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id='form1'>
                        <input type="hidden" name="idr" id="idr" value="">
                        <input type="hidden" name="accion" id='accion' value="">
                        <input type="hidden" name="cod_dir" id="cod_dir" value="">











                        <div id="datosPer">
                            <div class="form-group">
                                <label for="text" class="col-sm-4 control-label">Cedula</label>
                                <div class="col-12">
                                    <input type="number" class="form-control" name="C_I" id="C_I" placeholder="Ingrese su Cedula">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-6 control-label"> Nombre</label>
                                <label for="text" class="col-6 control-label"> Segundo Nombre</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="P_nombre" id="P_nombre" placeholder="Ingrese su Nombre">
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="S_nombre" id="S_nombre" placeholder="Ingrese su Segundo Nombre">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-6 control-label"> Apellido</label>
                                <label for="text" class="col-6 control-label"> Segundo Apellido</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="P_apellido" id="P_apellido" placeholder="Ingrese su Apellido">
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="S_apellido" id="S_apellido" placeholder="Ingrese su Segundo Apellido">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-6 control-label">Sexo</label>
                                <label for="text" class="col-6 control-label">Estado civil</label>
                                <div class="col-6">
                                    <select class="form-control" id="cboSexo" name='Sexo'>
                                        <option value="">Escoga una opción</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Masculino">Masculino</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select class="form-control" id='est_civ' name='Estado_civil'>
                                        <option value="">Escoga una opción</option>
                                        <option value="Soltero">Soltero/a</option>
                                        <option value="Casado">Casado/a</option>
                                        <option value="Divorciado">Divorciado/a</option>
                                        <option value="Viudo">Viudo/a</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="text" class="col-sm-4 control-label">Fecha de Nacimiento</label>
                                <div class="col-12">
                                    <input type="date" class="form-control" name="Fecha_n" id="Fecha_n" required>
                                </div>
                            </div>
                        </div>



















                        <div id="datosPer2"  style="display:none">
                            <div class="form-group">
                                <label for="text" class="col-12 control-label">Tipo de Personal</label>
                                <div class="col-12">
                                    <select class="form-control" name='Tipo_pers' id="tipo_pers">
                                        <option value="">Escoga una opción</option>
                                        <option value="Administrativo">Administrativo</option>
                                        <option value="Docente">Docente</option>
                                        <option value="Obrero">Obrero</option>
                                        <option value="Vigilante">Vigilante</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-6 control-label">Turno</label>
                                <label for="text" class="col-6 control-label">Horario</label>
                                <div class="col-6">
                                    <select class="form-control" name='turno' id="turno">
                                        <option value="">Escoga una opción</option>
                                        <option value="Mañana">Mañana</option>
                                        <option value="Tarde">Tarde</option>
                                        <option value="Ambos">Ambos</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <input class="form-control" name="horas_trab" id="horas_trab" type="text" placeholder="8:00 AM - 5:00 PM">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="text" class="col-12 control-label">Indique si tiene niños en la institucion</label>
                                <div class="col-12">
                                    <select name="ExiHijos" class="form-control" id="ExiHijos">
                                        <option value="">Seleccione si presenta</option>
                                        <option value="Presenta">Tiene</option>
                                        <option value="No presenta">No tiene</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="GradoHijo" style="display:none">
                                <label for="text" class="col-12 control-label">Indique grado cursante del hijo</label>
                                <div class="col-12">
                                    <input type="text" name="gradoCursoHijo" class="form-control" id="gradoCursoHijo">
                                </div>
                            </div>
                        </div>




















                        <div id="direccion" style="display:none">
                            <div class="form-group">
                                <label for="text" class="col-sm-4 control-label">Seleccione</label>
                                <div class="col-12">
                                    <select class="form-control" name="seleccione" id="seleccione">
                                        <option value="">Seleccione</option>
                                        <option value="1">Urbanizacion</option>
                                        <option value="0">Zona</option>
                                    </select>
                                </div>
                            </div>
                            <div id="zona" style="display:none">
                                <div class="form-group">
                                    <label for="text" class="col-sm-4 control-label">Sector</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="Sector" id="Sector" placeholder="Sector">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text" class="col-sm-4 control-label">Calle</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="Calle" id="Calle" placeholder="Calle">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text" class="col-sm-4 control-label">Codigo postal</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="Cod_postal" id="Cod_postal" placeholder="Codigo postal">
                                    </div>
                                </div>
                            </div>
                            <div id="Urb" style="display:none">
                                <div class="form-group">
                                    <label for="text" class="col-sm-4 control-label">Num de calle</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="Num_calle" id="Num_calle" placeholder="N° de Calle">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text" class="col-sm-4 control-label">Num de casa</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="Num_casa" id="Num_casa" placeholder="N° de casa">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text" class="col-sm-4 control-label">Urbanizacion</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="Urb" id="Urb" placeholder="Urbanizacion">
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label for="text" class="col-sm-4 control-label">Habilidades extra</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="habilidades" id="habilidades" placeholder="Habilidades">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text" class="col-sm-4 control-label">Ocupacion extra</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="ocupacion_2" id="ocupacion_2" placeholder="Segundo trabajo (Si presenta)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text" class="col-sm-4 control-label">Experiencias laborales</label>
                                    <div class="col-12">
                                        <select class="form-control" name="exp_lab" id="exp_lab">
                                            <option value="">Seleccione</option>
                                            <option value="0">No presenta</option>
                                            <option value="1">Presenta</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="exp_lab_extra" style="display:none">
                                    <div class="form-group">
                                        <label for="text" class="col-sm-4 control-label">Tiempo instituciones oficiales</label>
                                        <div class="col-12">
                                            <input type="text" class="form-control" name="oficial_exp_lab" id="oficial_exp_lab" placeholder="2 años">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="text" class="col-sm-4 control-label">Tiempo instituciones privadas</label>
                                        <div class="col-12">
                                            <input type="text" class="form-control" name="priv_exp_lab" id="priv_exp_lab" placeholder="3 años">
                                        </div>
                                    </div>
                                </div>
                        </div>












                        <div id="formacionAca" style="display:none">
                            <div class="form-group">
                                <label for="text" class="col-sm-4 control-label">Nombre Instituto</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="Nombre_inst" required id="Nombre_inst" placeholder="Instituto">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="text" class="col-sm-4 control-label">Titulo</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="Titulo" required id="Titulo" placeholder="Titulo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="text" class="col-sm-4 control-label">Año de formacion</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="Año_for_a" required id="Año_for_a" placeholder="Año de formacion">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="text" class="col-sm-4 control-label">Nivel curso</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="Nivel_curso" required id="Nivel_curso" placeholder="Nivel curso">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="text" class="col-sm-4 control-label">Estudio actual</label>
                                <div class="col-12">
                                    <select class="form-control" name="Actual_instruct" id="Actual_instruct">
                                        <option value="">Seleccione</option>
                                        <option value="No">No presenta</option>
                                        <option value="Si">Presenta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="extra_estudio" style="display:none">
                                <label for="text" class="col-sm-4 control-label">Grado Actual</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="Grado_actual_instruc" id="Grado_actual_instruc" placeholder="Grado">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="text" class="col-sm-4 control-label">Fecha titulo</label>
                                <div class="col-12">
                                    <input type="text" class="form-control input-date-single-range" name="titulo_fecha" id="titulo_fecha">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="text" class="col-sm-4 control-label">Credencial del titulo</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="credencial_titulo" id="credencial_titulo" placeholder="Ingrese su Numero de Credencial">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="text" class="col-sm-4 control-label">Correo</label>
                                <div class="col-12">
                                    <input type="email" class="form-control" name="Tipo_correo" id="Tipo_correo" placeholder="Ingrese su Correo">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    
                                    <div class="col-4">
                                        <label for="text" class="col-12 control-label">Codigo area</label>
                                        <input type="number" class="form-control" name="Area_telf_casa" id="Area_telf_casa" placeholder="Codigo de area de casa">
                                    </div>
                                    
                                    <div class="col-8">
                                        <label for="text" class="col-12 control-label">Numero</label>
                                        <input type="number" class="form-control" name="Numero_casa" id="Numero_casa" placeholder="Ingrese su Numero de casa">
                                    </div>
                                </div>
                            </div>
                        </div>
















                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-default" id="antPag">Anterior</button>
                            <button type="button" class="btn btn-default" id="sigPag">Siguiente</button>
                            <button type="submit" class="btn btn-primary" id='Guardar' style="display:none">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
                <!-- /.modal-content -->
        </div>
            <!-- /.modal-dialog -->
    </div>
        <!-- /.modal -->

        <div class="modal fade" id="modal_borrar">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Borrar Personal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h1>¿Estás seguro de borrar este elemento?</h1>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id='eli_btn'>Eliminar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="modal fade" id="modal_ver">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Datos Personal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <table class="table table-striped" id="0detalles">
                                <tbody id="detalles">

                                </tbody>
                            </table>
                            <table class="table table-striped" id="1detalles">
                                <tbody id="detalles1">

                                </tbody>
                            </table>
                            <table class="table table-striped" id="2detalles">
                                <tbody id="detalles2">

                                </tbody>
                            </table>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-default" id="antPagDet">Anterior</button>
                        <button type="button" class="btn btn-default" id="sigPagDet">Siguiente</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <?php $this->load->view('layout/scripts') ?>
            <script src="<?= base_url() ?>js/registropersonal.js" charset="utf-8"></script>
