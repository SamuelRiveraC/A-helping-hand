<?php /**
 *
 */
class Creportes extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Mreportes');
  }

  public function index()
  {
    if ($this->session->userdata('Login')) {
      $this->load->view('layout/header');
      $this->load->view('layout/menu');
      $this->load->view('vreportes');
      $this->load->view('layout/footer');
    } else {
      redirect(base_url(),'refresh');
    }
  }

  public function count_list_personal()
  {
    $res['asistencia'] = $this->Mreportes->listar_asistencia_cuenta();
    $res['inasistencia'] = $this->Mreportes->listar_inasistencia_cuenta();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function list_prue()
  {
    $datos[] = array();
    $res = $this->Mreportes->list_prue();
    foreach ($res as $key => $value) {
      $datoscount = count($datos);
      for ($i=0; $i <= $datoscount; $i++) {
          if (count($datos) > 1 || $datos[$i]->Fecha_asist == $value->Fecha_asist) {
            $datos[$i]->cuenta = $datos[$i]->cuenta + $value->cuenta;
          } else {
            $datos[$key] = array(
              'Fecha_asist' => $value->Fecha_asist,
              'cuenta' => $value->cuenta,
            );
          }
        }
      }

    print_r($datos);
    return;
  }
}
 ?>
