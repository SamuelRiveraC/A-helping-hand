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

  public function index()// La funcion predeterminada al momento de llamar al controlador
  {
		$menu = array();
		$datos = array();
		$datos['menu'] = 'Personal';
		$datos['submenu'] = 'Cregistropersonal';
		$menu = array('datos' => $datos);
    //Division de Vista General en vistas pequeñas
    if ($this->session->userdata('Login')) {
      $this->load->view('layout/header');
      $this->load->view('layout/menu',$menu);
      $this->load->view('vpermisos');
      $this->load->view('layout/footer');
    } else {
      redirect(base_url(),'refresh');
    }
  }

  public function listar($id=null) // Lista los permisos de personal
  {
    $res = $this->Mpermisos->listar($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function ins() //Inserta datos de permiso
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

  public function upd() // Actualiza el permiso
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

  public function usuarios_select() // Listar de comboselect de personal 
  {
    $res = $this->Mpermisos->usuarios_select();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }




  
  public function reporte() {
    $res = $this->Mpermisos->listar(null);
    $table="";
    
    foreach ($res as $r) {
      $table .= "<tr>";
      $table .= " <td>$r->C_I</td>";
      $table .= " <td>$r->Tipo_perm</td>";
      $table .= " <td>$r->Observ_perm</td>";
      $table .= " <td>$r->fecha_inicio</td>";
      $table .= " <td>$r->fecha_culm</td>";
      $table .= " <td>".($r->dias_perm == "1" ? "1 dia" : $r->dias_perm." dias")." </td>";
      $table .= " <td>$r->Fecha_perm</td>";
      $table .= "</tr>";
    }

    $html = "
    <!DOCTYPE html>
    <html lang='en' dir='ltr'>
      <head>
        <meta charset='utf-8'>
        <title>Vista pdf</title>
        <style>
              body {
                color: #001028;
                background: #FFFFFF;
                margin: 20mm 0mm 0mm 0mm;
                text-align: justify;
                font-family: Arial, sans-serif;
                font-family: Arial;
              }
              table {
                width: 100%; border:1px solid #ddd; border-collapse: collapse;
              }
              th, td {
                text-align: left;padding: 8px; border:1px solid #ddd;
              }
              tr:nth-child(even) {
                background-color: #f2f2f2;
              } 

        </style>
      </head>

      <body>
        <div style='width:100%; text-align:center;'>
          <p> REPUBLICA BOLIVARIANA DE VENEZUELA </p>
          <p> MINISTERIO DEL PODER POPULAR PARA LA EDUCACION </p>
          <p> INSCRITO EN EL M.P.P.E COD. DEA PD02350320 </p>
          <p> UNIDAD EDUCATIVA PRIVADA FRANCESCO FORGIORE PADRE PIO </p>
          <p> EL TIGRE - ESTADO ANZOATEGUI – VENEZUELA </p>
        </div>

        <div> 
          <table>
            <tr>
              <th>Cedula</th>
              <th>Tipo de permiso</th>
              <th>Observaciones</th>
              <th>Fecha de inicio</th>
              <th>Fecha de culminacion</th>
              <th>Duracion en dias</th>
              <th>Fecha de emision</th>
            </tr>

            $table

          </table>
        </div> 
      </body>
    </html>
    ";

    $this->load->library('DomP');
    $this->domp->loadHtml($html);
    $this->domp->setPaper('A4', 'portrait');
    $this->domp->render();
    $this->domp->stream('documentos',array("Attachment" => false));
    return $html;
  }
}
?>
