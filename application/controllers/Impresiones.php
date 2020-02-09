
<?php
require_once  ' dompdf / autoload.inc.php ' ;

class Impresiones extends CI_controller {


    function __construct()
    {
        parent ::__construct();
        $this->load->model('Modelo_pdf');
    }

    public function imp_data($id)
    {
        $html = $this->create_pdf($id);

        $this->load->library('DomP');
        $this->domp->loadHtml($html);

        $this->domp->setPaper('A4', 'portrait');
  

        $this->domp->render();

        $this->domp->stream('documentos',array("Attachment" => false));
    }

    public function create_pdf($id)
    {
        
    }
}
?>