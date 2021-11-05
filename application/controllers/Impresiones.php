
<?php
// require_once  ' dompdf/autoload.inc.php ' ;

class Impresiones extends CI_controller {


    function __construct()
    {
        parent ::__construct();
        $this->load->model('Modelo_pdf');
    }

    public function imp_data($fecha, $fecha1)
    {
        $fecha = $fecha;
        $fecha1 = $fecha1;
        $fech1= explode("-",$fecha);
        $fech2= explode("-",$fecha1);
        $fech2 = $fech2[2]."-".$fech2[1]."-".$fech2[0];
        $fech1 = $fech1[2]."-".$fech1[1]."-".$fech1[0];

        $html = $this->create_pdf($fech1, $fech2);
        $this->load->library('DomP');
        $this->domp->loadHtml($html);

        $this->domp->setPaper('A4', 'portrait');
  

        $this->domp->render();

        $this->domp->stream('documentos',array("Attachment" => false));
    }

    public function create_pdf($fech1, $fech2)
    {
        $data = $this->Modelo_pdf->get_data($fech1, $fech2);
        $datos = "";
        
        foreach ($data as $key => $value) {
          $datos = $datos . 
            "
            <tr>
            <td></td>
            <td style='text-align: left'>".$value['nombre']."</td>
            <td style='text-align: left'>".$value['C_I']."</td>
            <td>".$value['inasistencia']."</td>
            <td>".$value['asistencia']."</td>
            </tr>
            ";
         }

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
                table{
                    font-size:20px;
                    width:100%;
                    text-align: center;
                    margin-right: 10mm;
                    margin-top: 5mm
                  }
                  th{
                    border-bottom: 1px solid #ddd

                  }
                  h3{
                      text-align: center;
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
            </style>
          </head>
          <body>
          <div id='caja'>
          <h1>SISCA.PP</h1>
          </div>
          <div id='title'>
          <h3>Lista de asistencias</h3>
          </div>
          <div id='franja'>
          </div>

          
          <div class='tablita'>
          <table cellpadding='0' cellspacing='0' >
          <thead>
          <tr >
            <th></th>
            <th style='text-align: left'>Nombre</th>
            <th style='text-align: left'>Cedula</th>
            <th>Inasistencias</th>
            <th>Asistencias</th>
          </tr>
          </thead>
          <tbody>

          ".$datos."

          </tbody>
         
        </body>
        <html>
        ";
        return $html;
    }
}
?>