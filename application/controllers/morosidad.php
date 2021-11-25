<?php 
class morosidad extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model("morosidad");
  }

  public function index() {
	$datos = array();
    if ($this->session->userdata('Login')) {
      $this->load->view('layout/header');
      $this->load->view('layout/menu');
      $this->load->view('vamonestacion');
      $this->load->view('layout/footer');
    } else {
      redirect(base_url(),'refresh');
    }
  }

  public function list() {
    $this->output->set_content_type('application/json')->set_output(json_encode($this->morosidad->index()));
  }

  public function insert() {
    $datos = array(
      #'Cod_moroso' => $this->input->post('Cod_moroso'),
      'Nro_factura_mora' => $this->input->post('Nro_factura_mora'),
      'Monto_mora' => $this->input->post('Monto_mora'),
      'Tiempo_retraso' => $this->input->post('Tiempo_retraso'),
    );
    $res = $this->morosidad->insert($datos); 
    if ($res) {
    	$this->output->set_content_type('application/json')->set_output(json_encode($res));
    }
  }





} ?>