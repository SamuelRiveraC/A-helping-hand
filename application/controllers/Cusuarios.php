<?php


class Cusuarios extends CI_Controller
{

	function __construct()
	{
	    parent::__construct();
        $this->load->model("mregistrousuario");

	}
    public function index(){
			if ($this->session->userdata('Login')['session_Tipo'] == "Administrador") {
				$this->load->view('layout/header');
				$this->load->view('layout/menu');
				$this->load->view("vusuarios");
				$this->load->view('layout/footer');
			} else {
				redirect('Clogin','refresh');
			}

    }

   public function listar($idusuario=null)
    {
      $res = $this->mregistrousuario->listar($idusuario);
      $this->output->set_content_type('application/json')
      ->set_output(json_encode($res));
    }

    public function ins(){


      $usuario = array(
        'Nom_usuario' => $this->input->post('Nom_usuario'),
        'Tipo_cuenta' => $this->input->post('Tipo_cuenta'),
				'Activo' => $this->input->post('estado'),
        'Password' => $this->input->post('Password'),
        'Preg_1' => $this->input->post('Preg_1'),
        'Res_1' => $this->input->post('Res_1'),
        'Preg_2' => $this->input->post('Preg_2'),
        'Res_2' => $this->input->post('Res_2'),
        'Preg_3' => $this->input->post('Preg_3'),
        'Res_3' => $this->input->post('Res_3'),

        );


        $res = $this->mregistrousuario->guardarusuario($usuario);
        $this->output->set_content_type('application/json')
        ->set_output(json_encode($res));

     }


       public function actualizarDatos(){

			  $usuario = array(
				   'Nom_usuario' => $this->input->post('Nom_usuario'),
				   'Tipo_cuenta' => $this->input->post('Tipo_cuenta'),
					 'Activo' => $this->input->post('estado'),
				   'Preg_1' => $this->input->post('Preg_1'),
				   'Res_1' => $this->input->post('Res_1'),
				   'Preg_2' => $this->input->post('Preg_2'),
				   'Res_2' => $this->input->post('Res_2'),
				   'Preg_3' => $this->input->post('Preg_3'),
				   'Res_3' => $this->input->post('Res_3'),

				   );
				if ($this->input->post('Password') != '') {
					$usuario['Password'] = $this->input->post('Password');
				}

        $res = $this->mregistrousuario->actualizarDatos($usuario,$this->input->post('ID_usuario'));
        $this->output->set_content_type('application/json')
        ->set_output(json_encode($res));



       }

      public function eliminarDatos(){
        $res = $this->mregistrousuario->eliminarDatos($this->input->post('ID_usuario'));
        $this->output->set_content_type('application/json')
        ->set_output(json_encode($res));
       }
}

?>
