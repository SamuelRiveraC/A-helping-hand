<?php /**
 *
 */
class Camonestacion extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Mamonestacion');
  }

  public function index()
  {
    if ($this->session->userdata('Login')) {
      $this->load->view('layout/header');
      $this->load->view('layout/menu');
      $this->load->view('vamonestacion');
      $this->load->view('layout/footer');
    } else {
      redirect(base_url(),'refresh');
    }
  }

  public function list_amonestacion()
  {
    $res = $this->Mamonestacion->list_amonestacion();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function ins_Amonestacion()
  {
    $datos = array(
      'Fecha_amon' => date('Y-m-d'),
      'Num_amon' => '1',
      'Motivo_amon' => $this->input->post('Motivo_amon'),
      'Tipo_amon' => $this->input->post('Tipo_amon'),
    );
    $id_amonestacion = $this->Mamonestacion->ins_Amonestacion($datos);
    if ($id_amonestacion) {
      $datos_extra = array(
        'C_I' => $this->input->post('C_I'),
        'Cod_amon' => $id_amonestacion,
      );
    $res = $this->Mamonestacion->ins_detalleAmonestacion($datos_extra);
    }
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }


}
 ?>
