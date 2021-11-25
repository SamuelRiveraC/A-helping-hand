<?php 
class pagos extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model("pagos");
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
    $this->output->set_content_type('application/json')->set_output(json_encode($this->pagos->index()));
  }

  public function insert() {
    $datos = array(
      // 'Cod_pago' => $this->input->post('Cod_pago'),
      'Tipo_pago' => $this->input->post('Tipo_pago'), // Moroso - Solvente
      'Monto_deuda_total' => $this->input->post('Monto_deuda_total'),
      'abono' => $this->input->post('abono'),
      'Num_pago' => $this->input->post('Num_pago'),
      'Deuda' => $this->input->post('Deuda'),
      'Control_pago' => $this->input->post('Control_pago'),
    );
    $res = $this->pagos->insert($datos); 
    if ($res) {
    	$this->output->set_content_type('application/json')->set_output(json_encode($res));
    }
  }

  
  //Copiarse impresiones


} ?>