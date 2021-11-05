<?php /**
 *
 */
class Casistencia extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Masistencia');
  }
//La funcion predeterminada al momento de llamar al controlador. Genera la vista de Asistencia 
  public function index()
  {
      $menu = array();
      $datos = array();
      $datos['menu'] = 'Asistencia';
      $datos['submenu'] = 'Casistencia';
      $menu = array('datos' => $datos);
    if ($this->session->userdata("Login")) {
      //Division de Vista General en vistas pequeñas
      $this->load->view('layout/header');
      $this->load->view('layout/menu',$menu);
      $this->load->view('vasistencia');
      $this->load->view('layout/footer');
    } else {
      redirect('clogin','refresh');
    }
  }

  public function controlAsistencia()
  {
    // Vista de control de asistencia 
      $menu = array();
      $datos = array();
      $datos['menu'] = 'Asistencia';
      $datos['submenu'] = 'Casistencia';
      $menu = array('datos' => $datos);
    if ($this->session->userdata("Login")) {      
    //Division de Vista General en vistas pequeñas 
      $this->load->view('layout/header');
      $this->load->view('layout/menu',$menu);
      $this->load->view('vcontrolasistencia');
      $this->load->view('layout/footer');
    } else {
      redirect('clogin','refresh');
    }
  }

  public function listar() // Lista el personal que no ha presentado asistencia o inasistencia diaria
  {
    $datos['personal'] = $this->Masistencia->listar();
    $res['asistentes'] = $this->Masistencia->listar_asistencia();
    $res['inasistencia'] = $this->Masistencia->listar_inasistentes();
// Se recorre la respuesta del personal para determinar si el personal tiene un permiso el dia de hoy
    foreach ($datos['personal'] as $key) {
      $if_can = $this->Masistencia->compruebe_ci_permiso($key->C_I);
      if ($if_can) {
        $res['personal'][] = array(
          'C_I' => $key->C_I,
          'P_nombre' => $key->P_nombre,
          'P_apellido' => $key->P_apellido,
          'Tipo_pers' => $key->Tipo_pers,
        );
      }
    }

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  // Inserta los datos para llevar la asistencia
  public function ins_datos()
  {
    $turno = $this->input->post('turno');
    $asistencia = $this->input->post('asistencia');
    $datos = "";
    $C_I = $this->input->post('C_I');
    $fecha = date("Y-m-d");
    $res = false;
    $horario_id = $this->Masistencia->getIdHorario($C_I);
    if ($asistencia == "Asistente") {
      //tabla n:n asistencia
      $data_extra = array(
        'horario_id' => $horario_id,
      );
      $Cod_hor_asist = $this->Masistencia->ins_personal_lleva_horario($data_extra);
      if ($Cod_hor_asist) {
        //tabla horario asistencia
        $datos = array(
          'Fecha' => date("Y-m-d"),
          'Cod_hor_asist' => $Cod_hor_asist,
          'total' => 1,
        );
        $res = $this->Masistencia->ins_datos_asistencia($datos);
      }
    } else {

      if ($this->input->post('tipo_inasistencia') == "Justificado") {
        //tabla justificacion
        $justificacion = array(
          'Num_just' => $this->input->post('Num_just'),
          'Motivo_just' => $this->input->post('Motivo_just'),
          'Fecha_just' => date('Y-m-d'),
        );
        // Inserta los datos en la tabla justificacion
        $id_justificacion = $this->Masistencia->ins_Justificacion($justificacion);
        if ($id_justificacion) {
          $justificacion_extra = array(
            'C_I' => $this->input->post('C_I'),
            'Cod_just' => $id_justificacion,
          );
          $res = $this->Masistencia->ins_extraJustificacion($justificacion_extra);
        }
      } else {
          $data_extra = array(
            'horario_id' => $horario_id,
          );
          $Cod_inasist = $this->Masistencia->ins_personal_cumple_inasistencia($data_extra);
        if ($Cod_inasist) {
        //tabla inasistencia
        $datos = array(
          'Cod_inasist' => $Cod_inasist,
          'fecha_inasist' => date("Y-m-d"),
          'total_inasist' => 1,
          'tipo_inasist' => $this->input->post('tipo_inasistencia'),
        );
        $res = $this->Masistencia->ins_datos_inasistencia($datos);
        }
      }
    }
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }


  public function count_list_personal() // Lista el total de asistencias e inasistencias de un personal por un rango de fecha
  {
    $fecha = $this->input->post('rangofecha');
    $fecha1 = $this->input->post('rangofecha1');
    $fech1= explode("/",$fecha);
    $fech2= explode("/",$fecha1);
    $fech2 = $fech2[2]."-".$fech2[1]."-".$fech2[0];
    $fech1 = $fech1[2]."-".$fech1[1]."-".$fech1[0];
    $res['asistencia'] = $this->Masistencia->listar_asistencia_cuenta($fech1,$fech2);
    $res['inasistencia'] = $this->Masistencia->listar_inasistencia_cuenta($fech1,$fech2);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }
}
 ?>
