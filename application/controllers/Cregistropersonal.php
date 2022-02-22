<?php


class Cregistropersonal extends CI_Controller
{

		function __construct()
		{
		    parent::__construct();
	      $this->load->model("Mregistropersonal");


		}
//Genera la vista de Registro de Personal
    public function index(){
		$menu = array();
		$datos = array();
		$datos['menu'] = 'Personal';
		$datos['submenu'] = 'Cregistropersonal';
		$menu = array('datos' => $datos);
			if ($this->session->userdata('Login')['session_Tipo'] == "Administrador") { // Si el tipo de sesion es Administrador se va cargar la vista 
				$this->load->view('layout/header');
				$this->load->view('layout/menu',$menu);
				$this->load->view("vregistropersonal");
				$this->load->view('layout/footer');
			} else {
				redirect('Clogin','refresh');
			}

    }

		public function listar($id=null) //Muestra todo el personal que esta registrado
		{
			$res = $this->Mregistropersonal->listar($id);
			foreach ($res as $key => $value) {
				$telres = $this->Mregistropersonal->get_number($value->C_I);
				foreach ($telres as $k => $v) {
					$var[$k] = array(
						'numero' => $v,
					);
					$res[$key]->numero = $var;
				}
			}
			$this->output->set_content_type('application/json')
			->set_output(json_encode($res));
		}

    public function ins(){ // Inserta los datos completos de personal 
			$res = "";
			$hoy = date("Y-m-d");
			$hoy = explode('-',$hoy);
			$fn = explode('-',$this->input->post('Fecha_n'));
			if ( $fn[0] === "") {
				$edad = 23;
			} else {
				$edad = $hoy[0] - $fn[0];
			}



			if($edad > 23 && $edad < 68){ // Rango permitido de edad
				$res = array(
					'exito' => false,
					'mensaje' => 'No se permite registrar personal que no este entre la edad de 23 y 68',
				); 
			} else {
				$param = array( //Datos de Personal
					'P_nombre' => $this->input->post('P_nombre'),
					'S_nombre' => $this->input->post('S_nombre'),
					'P_apellido' => $this->input->post('P_apellido'),
					'S_apellido' => $this->input->post('S_apellido'),
					'C_I' => $this->input->post('C_I'),
					'Sexo' => $this->input->post('Sexo'),
					'Estado_civil' => $this->input->post('Estado_civil'),
					'Fecha_n' => $this->input->post('Fecha_n'),
					'Tipo_pers' => $this->input->post('Tipo_pers'),
					'Edad' => $edad,
					'habilidades' =>  $this->input->post('habilidades'),
					'ocupacion_2' =>  $this->input->post('ocupacion_2'),
					'fecha_ingreso' => date('Y-m-d H:i:s'),
				);
				$datosHijos = array( // Existencia de Hijos personal
					'C_I' => $this->input->post('C_I'),
					'ExiHijos' => $this->input->post('ExiHijos'),
					'gradoCursoHijos' => $this->input->post('gradoCursoHijo'),
				);
				$datosExp = array( // Experiencia laboral
					'C_I' => $this->input->post('C_I'),
					'exp_lab' =>  $this->input->post('exp_lab'),
				);
				// Si presenta experiencia laboral, se rellenan los campos extras
				if ($this->input->post('exp_lab') != 0) {
					$datosExp['oficial_exp_lab'] = $this->input->post('oficial_exp_lab');
					$datosExp['priv_exp_lab'] = $this->input->post('priv_exp_lab');
				}
				$res = $this->Mregistropersonal->guardar($param);
				//Datos de Direccion
				$datosdireccion = array(
					'C_I' => $this->input->post('C_I'),
					'Calle' => $this->input->post('Calle'),
					'Cod_postal' => $this->input->post('Cod_postal'),
					'Num_calle' => $this->input->post('Num_calle'),
					'Num_casa' => $this->input->post('Num_casa'),
					'Sector' => $this->input->post('Sector'),
					'Urb' => $this->input->post('Urb'),
				);
				$Cod_dir = $this->Mregistropersonal->datos_direccion($datosdireccion);
				//Telefono de personal Casa
				$telefono = array(
					'Tipo_telf' => 'Casa',
					'Area_telf' => $this->input->post('Area_telf_casa'),
					'Num_telf' => $this->input->post('Numero_casa'),
					'C_I' => $this->input->post('C_I'),
				);
				// Telefono de Personal Opcional 
				if($this->input->post('Area_telf_celular')!='' && $this->input->post('Area_telf_celular')!=null){
					$telefono1 = array(
						'Tipo_telf' => 'Celular',
						'Area_telf' => $this->input->post('Area_telf_celular'),
						'Num_telf' => $this->input->post('Numero_celular'),
						'C_I' => $this->input->post('C_I'),
					);
				}else{
					$telefono1 = false;
				}
				//Correo de personal
				$correo = array('Tipo_correo' => $this->input->post('Tipo_correo'),'C_I' => $this->input->post('C_I'));
				//Instituto donde curso 
				$instituto = array('Nombre_inst' => $this->input->post('Nombre_inst'),'Cod_dir' => $Cod_dir);
				//Horario de trabajo y turno 
				$horario = array(
					'C_I' => $this->input->post('C_I'),
					'turno' => $this->input->post('turno'),
					'horas_trab' => $this->input->post('horas_trab'),
				);
				// Datos de Formacion Academica 
				$datosformacion = array(
					'Titulo' => $this->input->post('Titulo'),
					'Año_for_a' => $this->input->post('Año_for_a'),
					'C_I' => $this->input->post('C_I'),
					'Actual_instruct' => $this->input->post('Actual_instruct'),
					'titulo_fecha' => $this->input->post('titulo_fecha'),
					'credencial_titulo' => $this->input->post('credencial_titulo'),
					'nivel_curso' => $this->input->post('Nivel_curso'),
				);
				// Si presenta instruccion actual, se rellenan los campos extras
				if ($this->input->post('Actual_instruct') != 'No') {
					$datosformacion['Grado_actual_instruc'] = $this->input->post('Grado_actual_instruc');
				}
				$this->Mregistropersonal->instituto($instituto);
				$this->Mregistropersonal->horario($horario);
				$this->Mregistropersonal->telefono($telefono);
				if($telefono1!=false){
					$this->Mregistropersonal->telefono($telefono1);
				}
				$this->Mregistropersonal->correo($correo);
				$this->Mregistropersonal->datosHijos($datosHijos);
				$this->Mregistropersonal->datosExp($datosExp);
				$res = $this->Mregistropersonal->datos_formacion($datosformacion);
				$res = array(
					'exito' => true,
					'mensaje' => 'Exito al momento de registar al personal',
				);
			}


			$this->output->set_content_type('application/json')->set_output(json_encode($res));

	 }
	 













	 
	public function actualizarDatos(){ // Actualiza los datos de Personal

			$res = "";
			$hoy = date("Y-m-d");
			$hoy = explode('-',$hoy);
			$fn = explode('-',$this->input->post('Fecha_n'));
			$edad = "";
			$edad = $hoy[0] - $fn[0];
			if($edad > 23 && $edad < 68){
				$paramact = array(
					'P_nombre' => $this->input->post('P_nombre'),
					'S_nombre' => $this->input->post('S_nombre'),
					'P_apellido' => $this->input->post('P_apellido'),
					'S_apellido' => $this->input->post('S_apellido'),
					'Sexo' => $this->input->post('Sexo'),
					'Estado_civil' => $this->input->post('Estado_civil'),
					'Fecha_n' => $this->input->post('Fecha_n'),
					'Tipo_pers' => $this->input->post('Tipo_pers'),
					'Edad' => $edad,
					'habilidades' =>  $this->input->post('habilidades'),
					'ocupacion_2' =>  $this->input->post('ocupacion_2'),
				);
				$datosHijos = array(
					'ExiHijos' => $this->input->post('ExiHijos'),
					'gradoCursoHijos' => $this->input->post('gradoCursoHijo'),
				);
				$datosExp = array(
					'exp_lab' =>  $this->input->post('exp_lab'),
				);
				if ($this->input->post('exp_lab') != 0) {
					$datosExp['oficial_exp_lab'] = $this->input->post('oficial_exp_lab');
					$datosExp['priv_exp_lab'] = $this->input->post('priv_exp_lab');
				}
				$datosdireccion = array(
					'Calle' => $this->input->post('Calle'),
					'Cod_postal' => $this->input->post('Cod_postal'),
					'Num_calle' => $this->input->post('Num_calle'),
					'Num_casa' => $this->input->post('Num_casa'),
					'Sector' => $this->input->post('Sector'),
					'Urb' => $this->input->post('Urb'),
				);
				$this->Mregistropersonal->upd_datos_direccion($datosdireccion,$this->input->post('cod_dir'));
				$telefono = array(
					'Tipo_telf' => 'Casa',
					'Area_telf' => $this->input->post('Area_telf_casa'),
					'Num_telf' => $this->input->post('Numero_casa'),
				);
				$tipo = 'Casa';
				if($this->input->post('Area_telf_celular')!=null && $this->input->post('Area_telf_celular')!=''){
					$telefono1 = array(
						'Tipo_telf' => 'Celular',
						'Area_telf' => $this->input->post('Area_telf_celular'),
						'Num_telf' => $this->input->post('Numero_celular'),
					);
					$tipo_ = 'Celular';
				}else{
					$telefono1 = false;
				}
				
				$correo = array('Tipo_correo' => $this->input->post('Tipo_correo'));
				$instituto = array('Nombre_inst' => $this->input->post('Nombre_inst'));
				$horario = array(
					'turno' => $this->input->post('turno'),
					'horas_trab' => $this->input->post('horas_trab'),
				);
				$datosformacion = array(
					'Titulo' => $this->input->post('Titulo'),
					'Año_for_a' => $this->input->post('Año_for_a'),
					'Actual_instruct' => $this->input->post('Actual_instruct'),
					'Grado_actual_instruc' => $this->input->post('Grado_actual_intruc'),
					'titulo_fecha' => $this->input->post('titulo_fecha'),
					'credencial_titulo' => $this->input->post('credencial_titulo'),
				);
				if ($this->input->post('Actual_instruct') != 'No') {
					$datosformacion['Grado_actual_instruc'] = $this->input->post('Grado_actual_instruc');
				}
				$this->Mregistropersonal->upd_instituto($instituto,$this->input->post('cod_dir'));
				$this->Mregistropersonal->upd_horario($horario,$this->input->post('idr'));
				$this->Mregistropersonal->upd_telefono($telefono,$this->input->post('idr'), $tipo);
				if($telefono1!=false){
					$this->Mregistropersonal->upd_telefono($telefono1,$this->input->post('idr'),$tipo_);
				}
				$this->Mregistropersonal->upd_datosHijos($datosHijos,$this->input->post('idr'));
				$this->Mregistropersonal->upd_datosExp($datosExp,$this->input->post('idr'));
				$this->Mregistropersonal->upd_correo($correo,$this->input->post('idr'));
				$this->Mregistropersonal->upd_formacion_academica($datosformacion,$this->input->post('idr'));
				$res = $this->Mregistropersonal->upd_guardar($paramact,$this->input->post('idr'));
				$res = array(
					'exito' => true,
					'mensaje' => 'Exito al momento de actualizar al personal',
				);
			} else {
				$res = array(
					'exito' => false,
					'mensaje' => 'No se permite ingresar personal que no este entre la edad de 23 y 68',
				); 
			}
		$this->output->set_content_type('application/json')
		->set_output(json_encode($res));
    }

    public function eliminarDatos(){ //Elimina los Datos de personal

		$res = $this->Mregistropersonal->eliminarDatos($this->input->post('idr'));
		if ($res) {
			$res = array('exito' => true,'mensaje' => 'Exito al borrar '.$this->input->post('idr'));
		} else {
			$res = array('exito' => false,'mensaje' => 'Ocurrio un error al borrar');
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($res));

	}

	










	public function reporte() {

	$res = $this->Mregistropersonal->listar(null);

    $table = "";

    foreach ($res as $r) {
      $table .= "<tr>";
      $table .= " <td>$r->C_I</td>";
      $table .= " <td>$r->P_nombre $r->S_nombre</td>";
      $table .= " <td>$r->P_apellido $r->S_apellido</td>";
      $table .= " <td>$r->Sexo</td>";
      $table .= " <td>$r->Estado_civil</td>";
      $table .= " <td>$r->Edad</td>";
      $table .= " <td>$r->Fecha_n</td>";
      $table .= " <td>$r->Tipo_pers</td>";
      $table .= " <td>$r->fecha_ingreso</td>";
      $table .= "</tr>";
    }
    
    $html = "
      <!DOCTYPE html>
      <html lang='en' dir='ltr'>
        <head>
          <meta charset='utf-8'>
          <title>Vista pdf</title>
          <style>
                body {
                  color: #001028;
                  background: #FFFFFF;
                  margin: 20mm 0mm 0mm 0mm;
                  text-align: justify;
                  font-family: Arial, sans-serif;
                  font-family: Arial;
                }
                table {
                  width: 100%; border:1px solid #ddd; border-collapse: collapse;
                }
                th, td {
                  text-align: left;padding: 8px; border:1px solid #ddd;
                }
                tr:nth-child(even) {
                  background-color: #f2f2f2;
                } 

          </style>
        </head>

        <body>
          <div style='width:100%; text-align:center;'>
            <p> REPUBLICA BOLIVARIANA DE VENEZUELA </p>
            <p> MINISTERIO DEL PODER POPULAR PARA LA EDUCACION </p>
            <p> INSCRITO EN EL M.P.P.E COD. DEA PD02350320 </p>
            <p> UNIDAD EDUCATIVA PRIVADA FRANCESCO FORGIORE PADRE PIO </p>
            <p> EL TIGRE - ESTADO ANZOATEGUI – VENEZUELA </p>
          </div>

          <div> 
            <table>
              <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Sexo</th>
                <th>Estado civil</th>
                <th>Edad</th>
                <th>Fecha de nacimiento</th>
                <th>Tipo de personal</th>
                <th>Fecha de Ingreso</th>
              </tr>

              $table

            </table>
          </div> 
        </body>
      </html>
    ";

    $this->load->library('DomP');
    $this->domp->loadHtml($html);
    $this->domp->setPaper('A4', 'portrait');
    $this->domp->render();
    $this->domp->stream('documentos',array("Attachment" => false));
    return $html;
  }
}






?>
