<?php


class Cusuarios extends CI_Controller
{

	function __construct()
	{
    parent::__construct();
    $this->load->model("mregistrousuario");
    $this->load->library('encrypt');
  }

    public function index(){ //funcion predeterminada al momento de llamar al controlador
      $menu = array();
      $datos = array();
      $datos['menu'] = 'Configuracion';
      $datos['submenu'] = 'Cusuario';
      $menu = array('datos' => $datos);
			if ($this->session->userdata('Login')['session_Tipo'] == "Administrador") {// Si el tipo de sesion es Administrador se va cargar la vista

        //Division de Vista General en vistas pequeñas
				$this->load->view('layout/header');
				$this->load->view('layout/menu',$menu);
				$this->load->view("vusuarios");
				$this->load->view('layout/footer');
			} else {
				redirect('Clogin','refresh');
			}

    }

   public function listar($idusuario=null) // Lista los usuarios registrados
    {
      $res = $this->mregistrousuario->listar($idusuario);
      $this->output->set_content_type('application/json')
      ->set_output(json_encode($res));
    }

    public function ins(){ // Inserta los datos de usuario

      $usuario = array(
        'C_I' => $this->input->post('C_I'),
        'Nom_usuario' => $this->input->post('Nom_usuario'),
        'Tipo_cuenta' => $this->input->post('Tipo_cuenta'),

        'Password' => $this->encrypt->encode($this->input->post('Password') ) ,

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


       public function actualizarDatos(){ // Actualiza los datos de usuario

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
        //Valida que la contraseña se este actualizando
				if ($this->input->post('Password') != '') {
          $usuario['Password'] = $this->encrypt->encode($this->input->post('Password') );
				}

        $res = $this->mregistrousuario->actualizarDatos($usuario,$this->input->post('ID_usuario'));
        $this->output->set_content_type('application/json')
        ->set_output(json_encode($res));



       }
      public function getUsers() // Buscador dinamico de usuarios por nombre de usuario al momento de registrar
      {
       $res = $this->mregistrousuario->getUsers($this->input->post('string'));
       $this->output->set_content_type('application/json')
       ->set_output(json_encode($res));
      }
      public function eliminarDatos(){ // Eliminar datos de usuario
        $res = $this->mregistrousuario->eliminarDatos($this->input->post('ID_usuario'));
        $this->output->set_content_type('application/json')
        ->set_output(json_encode($res));
       }

       public function getLike_() // Buscador dinamico de usuarios por nombre principal de usuario y cedula
       {
        $data = $this->input->post('data');
        $data = str_replace(' ','%',$data);

        $res = $this->mregistrousuario->getLike_($data);
        $this->output->set_content_type('application/json')
        ->set_output(json_encode($res));
       }
       public function getCI() // Buscador dinamico de usuario por cedula al momento de registrar
       {
        $res = $this->mregistrousuario->getCI($this->input->post('string'));
        $this->output->set_content_type('application/json')
        ->set_output(json_encode($res));
       }
}

?>
