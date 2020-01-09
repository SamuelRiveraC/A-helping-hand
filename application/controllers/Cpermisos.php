<?php /**
 *
 */
class Cpermisos extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Mpermisos');
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
      $this->load->view('vpermisos');
      $this->load->view('layout/footer');
    } else {
      redirect(base_url(),'refresh');
    }
  }

  public function listar($id=null)
  {
    $res = $this->Mpermisos->listar($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function ins()
  {
    $datos = array(
      'Fecha_perm' => $this->input->post('Fecha_perm'),
      'Tipo_perm' => $this->input->post('Tipo_perm'),
      'Observ_perm' => $this->input->post('Observ_perm'),
      'dias_perm' => $this->input->post('dias_perm'),
      'fecha_inicio' => $this->input->post('fecha_inicio'),
      'fecha_culm' => $this->input->post('fecha_culm'),
    );

    $id_permiso = $this->Mpermisos->ins($datos);
    if ($id_permiso) {
      $datos_extra = array(
        'C_I' => $this->input->post('C_I'),
        'Cod_perm' => $id_permiso,
      );
      $res = $this->Mpermisos->ins_extra($datos_extra);
    }

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function upd()
  {
    $datos = array(
      'Fecha_perm' => $this->input->post('Fecha_perm'),
      'Tipo_perm' => $this->input->post('Tipo_perm'),
      'Observ_perm' => $this->input->post('Observ_perm'),
      'dias_perm' => $this->input->post('dias_perm'),
    );
    $res=$this->Mpermisos->upd($datos,$this->input->post('Cod_perm'));
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function usuarios_select()
  {
    $res = $this->Mpermisos->usuarios_select();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }


}
 ?>
