<?php /**
 *
 */
class Cjustificacion extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Mjustificacion');
  }
  public function index() //La funcion predeterminada al momento de llamar al controlador
  {
		$menu = array();
		$datos = array();
		$datos['menu'] = 'Personal';
		$datos['submenu'] = 'Cregistropersonal';
		$menu = array('datos' => $datos);
    if ($this->session->userdata('Login')) {
     //Division de Vista General en vistas pequeñas 
      $this->load->view('layout/header');
      $this->load->view('layout/menu',$menu);
      $this->load->view('vjustificacion');
      $this->load->view('layout/footer');
    } else {
      redirect(base_url(),'refresh');
    }
  }

  public function listar() // Lista las justificaciones del personal
  {
    $res = $this->Mjustificacion->listar();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

}
 ?>
