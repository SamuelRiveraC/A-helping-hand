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
  public function index()
  {
		$menu = array();
		$datos = array();
		$datos['menu'] = 'Personal';
		$datos['submenu'] = 'Cregistropersonal';
		$menu = array('datos' => $datos);
    if ($this->session->userdata('Login')) {
      $this->load->view('layout/header');
      $this->load->view('layout/menu',$menu);
      $this->load->view('vjustificacion');
      $this->load->view('layout/footer');
    } else {
      redirect(base_url(),'refresh');
    }
  }

  public function list()
  {
    $res = $this->Mjustificacion->list();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

}
 ?>
