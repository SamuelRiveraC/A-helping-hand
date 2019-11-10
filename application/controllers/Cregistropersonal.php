<?php


class Cregistropersonal extends CI_Controller
{

		function __construct()
		{
		    parent::__construct();
	      $this->load->model("Mregistropersonal");


		}

    public function index(){
			if ($this->session->userdata('Login')['session_Tipo'] == "Administrador") {
				$this->load->view('layout/header');
				$this->load->view('layout/menu');
				$this->load->view("vregistropersonal");
				$this->load->view('layout/footer');
			} else {
				redirect('Clogin','refresh');
			}

    }

		public function listar($id=null)
		{
			$res = $this->Mregistropersonal->listar($id);
			$this->output->set_content_type('application/json')
			->set_output(json_encode($res));
		}

    public function ins(){

			$param = array(
				'P_nombre' => $this->input->post('P_nombre'),
				'S_nombre' => $this->input->post('S_nombre'),
				'P_apellido' => $this->input->post('P_apellido'),
				'S_apellido' => $this->input->post('S_apellido'),
				'C_I' => $this->input->post('C_I'),
				'Sexo' => $this->input->post('Sexo'),
				'Nacionalidad' => $this->input->post('Nacionalidad'),
				'Estado_civil' => $this->input->post('Estado_civil'),
				'Fecha_n' => $this->input->post('Fecha_n'),
				'Tipo_pers' => $this->input->post('Tipo_pers'),
				'Edad' => $this->input->post('Edad'),
			);

        $res = $this->Mregistropersonal->guardar($param);
				$this->output->set_content_type('application/json')
				->set_output(json_encode($res));

     }


       public function actualizarDatos(){

				 $paramact = array(
	 				'P_nombre' => $this->input->post('P_nombre'),
	 				'S_nombre' => $this->input->post('S_nombre'),
	 				'P_apellido' => $this->input->post('P_apellido'),
	 				'S_apellido' => $this->input->post('S_apellido'),
	 				'C_I' => $this->input->post('C_I'),
	 				'Sexo' => $this->input->post('Sexo'),
	 				'Nacionalidad' => $this->input->post('Nacionalidad'),
	 				'Estado_civil' => $this->input->post('Estado_civil'),
	 				'Fecha_n' => $this->input->post('Fecha_n'),
	 				'Tipo_pers' => $this->input->post('Tipo_pers'),
	 				'Edad' => $this->input->post('Edad'),
	 			);
        $res = $this->Mregistropersonal->actualizarDatos($paramact,$this->input->post('idr'));
				$this->output->set_content_type('application/json')
				->set_output(json_encode($res));


       }

      public function eliminarDatos(){
				$res = $this->Mregistropersonal->eliminarDatos($this->input->post('idr'));
				$this->output->set_content_type('application/json')
				->set_output(json_encode($res));

			}
       }






?>
