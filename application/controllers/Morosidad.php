<?php 
class Morosidad extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model("Mmorosidad");
    $this->load->model("Mregistropersonal");
  }


  public function index() {
	$datos = array();
    $datos = array('menu' => 'Pagos', 'submenu' => 'Pagos');
    $menu = array('datos' => $datos);
    $data = array("personal"=>$this->Mregistropersonal->listar());

    if ($this->session->userdata('Login')) {
      $this->load->view('layout/header');
      $this->load->view('layout/menu',$menu);
      $this->load->view('morosidad',$data);
      $this->load->view('layout/footer');
    } else {
      redirect(base_url(),'refresh');
    }
  }

  public function list() {
    $this->output->set_content_type('application/json')->set_output(json_encode($this->Mmorosidad->index()));
  }

  public function insert() {
    $datos = array(
      'cod_personal' => $this->input->post('C_I'),
      'Nro_factura_mora' => $this->input->post('Nro_factura_mora'),
      'Monto_mora' => $this->input->post('Monto_mora'),
      'Tiempo_retraso' => $this->input->post('Tiempo_retraso'),
    );
    $res = $this->Mmorosidad->insert($datos); 
    if ($res) {
    	$this->output->set_content_type('application/json')->set_output(json_encode($res));
    }
  }





} ?>
