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

  public function index()
  {
    if ($this->session->userdata("Login")) {
      $this->load->view('layout/header');
      $this->load->view('layout/menu');
      $this->load->view('vasistencia');
      $this->load->view('layout/footer');
    } else {
      redirect('clogin','refresh');
    }
  }

  public function controlAsistencia()
  {
    if ($this->session->userdata("Login")) {
      $this->load->view('layout/header');
      $this->load->view('layout/menu');
      $this->load->view('vcontrolasistencia');
      $this->load->view('layout/footer');
    } else {
      redirect('clogin','refresh');
    }
  }

  public function listar()
  {
    $datos['personal'] = $this->Masistencia->listar();
    $res['asistentes'] = $this->Masistencia->listar_asistencia();
    $res['inasistencia'] = $this->Masistencia->listar_inasistentes();

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


  public function ins_datos()
  {
    $turno = $this->input->post('turno');
    $asistencia = $this->input->post('asistencia');
    $datos = "";
    $fecha = date("Y-m-d");
    $res = false;
    if ($asistencia == "Asistente") {
      //tabla horario asistencia
      $datos = array(
        'Hora_e' => $this->input->post('hora_entrada'),
        'Hora_s' => $this->input->post('hora_salida'),
        'Turno_asist' => $turno,
        'Fecha_asist' => date("Y-m-d"),
        'Total_asist' => 1,
      );
      $id_asistencia = $this->Masistencia->ins_datos_asistencia($datos);
      if ($id_asistencia) {
        //tabla n:n asistencia
        $data_extra = array(
          'C_I' => $this->input->post('C_I'),
          'Cod_hor_asist' => $id_asistencia,
        );
      $res = $this->Masistencia->ins_personal_lleva_horario($data_extra);
      }
    } else {

      if ($this->input->post('tipo_inasistencia') == "Justificado") {
        //tabla justificacion
        $justificacion = array(
          'Num_just' => $this->input->post('Num_just'),
          'Motivo_just' => $this->input->post('Motivo_just'),
          'Fecha_just' => date('Y-m-d'),
        );
        $id_justificacion = $this->Masistencia->ins_Justificacion($justificacion);
        if ($id_justificacion) {
          $justificacion_extra = array(
            'C_I' => $this->input->post('C_I'),
            'Cod_just' => $id_justificacion,
          );
          $this->Masistencia->ins_extraJustificacion($justificacion_extra);
        }
      } else {
        //tabla inasistencia
        $datos = array(
          'Fecha_inasist' => date("Y-m-d"),
          'Num_inasist' => 1,
          'Tipo_inasist' => $this->input->post('tipo_inasistencia'),
        );
        $id_inasistencia = $this->Masistencia->ins_datos_inasistencia($datos);
        if ($id_inasistencia) {
          $data_extra = array(
            'C_I' => $this->input->post('C_I'),
            'Cod_inasist' => $id_inasistencia,
          );
          $res = $this->Masistencia->ins_personal_cumple_inasistecia($data_extra);
        }
      }
    }
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }


  public function count_list_personal()
  {
    $res['asistencia'] = $this->Masistencia->listar_asistencia_cuenta();
    $res['inasistencia'] = $this->Masistencia->listar_inasistencia_cuenta();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }
}
 ?>
