<?php
class Chome extends CI_controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    if ($this->session->userdata('Login')) {
      $this->load->view('layout/header');
      $this->load->view('layout/menu');
      $this->load->view('vhome');
      $this->load->view('layout/footer');
    } else {
      redirect('Clogin','refresh');
    }
  }
}
 ?>
