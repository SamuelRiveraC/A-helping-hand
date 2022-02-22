<?php 
class Morosidad extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model("Mmorosidad");
    $this->load->model("Mregistropersonal");
  }


  public function index() {
	$datos = array();
    $datos = array('menu' => 'Pagos', 'submenu' => 'Pagos');
    $menu = array('datos' => $datos);
    $data = array("personal"=>$this->Mregistropersonal->listar());

    if ($this->session->userdata('Login')) {
      $this->load->view('layout/header');
      $this->load->view('layout/menu',$menu);
      $this->load->view('morosidad',$data);
      $this->load->view('layout/footer');
    } else {
      redirect(base_url(),'refresh');
    }
  }

  public function list() {
    $this->output->set_content_type('application/json')->set_output(json_encode($this->Mmorosidad->index()));
  }

  public function insert() {
    $datos = array(
      'cod_personal' => $this->input->post('C_I'),
      'Nro_factura_mora' => $this->input->post('Nro_factura_mora'),
      'Monto_mora' => $this->input->post('Monto_mora'),
      'Tiempo_retraso' => $this->input->post('Tiempo_retraso'),
    );
    $res = $this->Mmorosidad->insert($datos); 
    if ($res) {
    	$this->output->set_content_type('application/json')->set_output(json_encode($res));
    }
  }
public function reporte() {
    $res = $this->Mmorosidad->index();
    $table = "";

    foreach ($res as $r) {
      $table .= "<tr>";
      $table .= " <td>$r->cod_personal</td>";
      $table .= " <td>$r->monto_mora</td>";
      $table .= " <td>$r->nro_factura_mora</td>";
      $table .= " <td>$r->tiempo_retraso</td>";
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
              <th>Monto de mora</th>
              <th>Numero de factura</th>
              <th>Tiempo de retraso</th>
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