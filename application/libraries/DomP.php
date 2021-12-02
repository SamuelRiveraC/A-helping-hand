<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


require_once FCPATH.'/vendor/dompdf/dompdf/src/Autoloader.php';

  use Dompdf\Dompdf;

  class DomP extends Dompdf {
    public function __construct() {
      parent::__construct();
    }
  }

?>
