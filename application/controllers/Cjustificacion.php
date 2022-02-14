<?php /**
 *
 */
class Cjustificacion extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Mjustificacion');
  }
  public function index() //La funcion predeterminada al momento de llamar al controlador
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
      $this->load->view('vjustificacion');
      $this->load->view('layout/footer');
    } else {
      redirect(base_url(),'refresh');
    }
  }

  public function listar() // Lista las justificaciones del personal
  {
    $res = $this->Mjustificacion->listar();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function reporte() {
    $res = $this->Mjustificacion->listar();

    $table = "";
        
    foreach ($res as $r) {
      $table .= "<tr>";
      $table .= " <td>$r->C_I</td>";
      $table .= " <td>$r->Num_just</td>";
      $table .= " <td>$r->Motivo_just</td>";
      $table .= " <td>$r->Fecha_just</td>";
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
              <th>Numero de Justificativo</th>
              <th>Motivo</th>
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
