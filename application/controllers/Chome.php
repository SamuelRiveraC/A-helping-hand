<?php /**
 *
 */
class Chome extends CI_controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('layout/header');
    $this->load->view('layout/menu');
    $this->load->view('vhome');
    $this->load->view('layout/footer');
  }
}
 ?>
