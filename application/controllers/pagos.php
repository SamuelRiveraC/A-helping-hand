<?php 
class Pagos extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model("Mpagos");
    $this->load->model("Mregistropersonal");
  }

  public function index() {
    $datos = array('menu' => 'Pagos ', 'submenu' => 'Pagos');
    $menu = array('datos' => $datos);
    $data = array("personal"=>$this->Mregistropersonal->listar());

    if ($this->session->userdata('Login')) {
      $this->load->view('layout/header');
      $this->load->view('layout/menu',$menu);
      $this->load->view('pagos',$data);
      $this->load->view('layout/footer');
    } else {
      redirect(base_url(),'refresh');
    }
  }

  public function listar() {
    $this->output->set_content_type('application/json')->set_output(json_encode($this->Mpagos->index()));
  }

  public function insert() {
    $datos = array(
      'cod_personal' => $this->input->post('C_I'),
      #'Tipo_pago' => $this->input->post('Tipo_pago'), // Moroso - Solvente
      'abono' => $this->input->post('abono'),
      'num_pago' => $this->input->post('num_pago'),
      'control_pago' => $this->input->post('control_pago'),
    );
    $res = $this->Mpagos->insert($datos); 
    if ($res) {
    	$this->output->set_content_type('application/json')->set_output(json_encode($res));
    }
  }




















  public function print($id) {

    $res = $this->Mpagos->get($id)[0]; 

    $html = "
      <!DOCTYPE html>
      <html lang='en' dir='ltr'>
        <head>
          <meta charset='utf-8'>
          <title>Vista pdf</title>
          <style>
                html {
                  margin: 0;
                  padding: 0;
                }
                body {
                  color: #001028;
                  background: #FFFFFF;
                  margin: 20mm 0mm 0mm 0mm;
                  text-align: justify;
                  font-family: Arial, sans-serif;
                  font-size:20px;
                  font-family: Arial;
                }
                h1{
                  color:#a1bedc;
                  text-align: center;
                  margin-top: 14mm;
                }
                #title {
                  margin-top: 30mm;
                }
                #caja {
                  background-color: #4b545c;
                  position: absolute;
                  top: -58;
                  width: 80mm;
                  height: 40.7mm;
                  float:left;
                  border-radius: 0mm 45mm 0mm 0mm;
                  z-index: 10;
                }
                #franja{
                  background-color: #007bff;
                  position: fixed;
                  top:0;
                  width: 100%;
                  height: 40mm;
                  z-index: 0;
                }
                .tablita{
                  text-align:left;
                  margin-left: 30;
                  padding: 0;
                  position: relative;
                }
                .content {
                  width:90%; margin:auto;
                }
                .col {
                  display:inline-block;
                  width:50%;
                  margin:0;
                }
          </style>
        </head>

        <body>
          <div id='caja'>
            <h1>SISCA.PP</h1>
          </div>

          <div id='title' class='content'>
            <div class='col'>
             <h2>Factura #$res->cod_pago</h2>
             <small> Pago: #$res->num_pago </small>
            </div>
            <div id='franja'></div>
          </div>
          
  
          <div class='content'>
            <h3>Unidad educativa Padre Pio </h3>
            <br>
            <br>
            <p>Cobrar a: $res->P_nombre $res->P_apellido CI: $res->C_I </p>
          </div>
  
          <div class='content'>
          <br>
          <br>
          </div>
  
          <div class='content' style='text-align:right'>
            <p><b>Subtotal: </b>".($res->abono*.84)."Bss</p>
            <p><b>IVA (16%):</b>".($res->abono*.16)."Bss </p>
            <p><b>Total:    </b>".($res->abono)."Bss</p>
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

} ?>