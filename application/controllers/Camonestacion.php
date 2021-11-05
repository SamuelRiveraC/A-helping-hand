<?php /**
 * CODEIGNITER ESTA ESTRUCTURADO POR MVC
 Controlador ---- Se encarga de las funciones
 Modelo----- Consulta y manda a la base de datos 
 Vista ------ Genera la vista que es HTML

 */
class Camonestacion extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Mamonestacion'); 
  }

  public function index() // La funcion predeterminada al momento de llamar al controlador
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
      $this->load->view('vamonestacion');
      $this->load->view('layout/footer');
    } else {
      redirect(base_url(),'refresh');
    }
  }

  public function list_amonestacion() // Lista las amonestaciones traida de la base de datos
  {
    $res = $this->Mamonestacion->list_amonestacion();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function ins_Amonestacion() // Inserta las amonestaciones traida de la base de datos
  {
    $datos = array(
      'Fecha_amon' => date('Y-m-d'),
      'Num_amon' => '1',
      'Motivo_amon' => $this->input->post('Motivo_amon'),
      'Tipo_amon' => 'Escrita',
      'Emisor_amon' => $this->input->post('emitido'),
    );
    $id_amonestacion = $this->Mamonestacion->ins_Amonestacion($datos); // Si la insercion a la tabla amonestacion es verdadera, se genera la insercion a la tabla personal general amonestacion en la base de datos 
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
