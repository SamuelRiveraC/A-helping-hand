<?php


class Cusuarios extends CI_Controller
{

	function __construct()
	{
	    parent::__construct();
        $this->load->model("mregistrousuario");

	}
    public function index(){
      $menu = array();
      $datos = array();
      $datos['menu'] = 'Configuracion';
      $datos['submenu'] = 'Cusuario';
      $menu = array('datos' => $datos);
			if ($this->session->userdata('Login')['session_Tipo'] == "Administrador") {
				$this->load->view('layout/header');
				$this->load->view('layout/menu',$menu);
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
        'C_I' => $this->input->post('C_I'),
        'Nom_usuario' => $this->input->post('Nom_usuario'),
        'Tipo_cuenta' => $this->input->post('Tipo_cuenta'),
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
      public function getUsers()
      {
       $res = $this->mregistrousuario->getUsers($this->input->post('string'));
       $this->output->set_content_type('application/json')
       ->set_output(json_encode($res));
      }
      public function eliminarDatos(){
        $res = $this->mregistrousuario->eliminarDatos($this->input->post('ID_usuario'));
        $this->output->set_content_type('application/json')
        ->set_output(json_encode($res));
       }

       public function getLike_()
       {
        $data = $this->input->post('data');
        $data = str_replace(' ','%',$data);

        $res = $this->mregistrousuario->getLike_($data);
        $this->output->set_content_type('application/json')
        ->set_output(json_encode($res));
       }
       public function getCI()
       {
        $res = $this->mregistrousuario->getCI($this->input->post('string'));
        $this->output->set_content_type('application/json')
        ->set_output(json_encode($res));
       }
}

?>
