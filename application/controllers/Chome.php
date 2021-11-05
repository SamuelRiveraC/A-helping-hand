<?php
class Chome extends CI_controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index() //La funcion predeterminada al momento de llamar al controlador
  {
      $menu = array();
      $datos = array();
      $datos['menu'] = 'algo';
      $datos['submenu'] = 'algo';
      $menu = array('datos' => $datos);
    if ($this->session->userdata('Login')) {
      $this->load->view('layout/header');
      $this->load->view('layout/menu',$menu);
      $this->load->view('vhome');
      $this->load->view('layout/footer');
    } else {
      redirect('Clogin','refresh');
    }
  }
}
 ?>
