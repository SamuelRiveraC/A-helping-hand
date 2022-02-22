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


  
  public function reporte() {
    $res = $this->Mamonestacion->list_amonestacion();

    $table = "";

    foreach ($res as $r) {
      $table .= "<tr>";
      $table .= " <td>$r->Cdula</td>";
      $table .= " <td>$r->Num_amon</td>";
      $table .= " <td>$r->Tipo_amon</td>";
      $table .= " <td>$r->Motivo_amon</td>";
      $table .= " <td>$r->Emisor_amon</td>";
      $table .= " <td>$r->Fecha_amon</td>";
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
                <th>Numero de Amonestacion</th>
                <th>Tipo</th>
                <th>Motivo</th>
                <th>Emisor</th>
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