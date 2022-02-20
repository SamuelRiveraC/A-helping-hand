<?php 
class Nosotros extends CI_Controller {
  public function index() {
    $menu = array('datos' => array('menu' => '', 'submenu' => ''));
      $this->load->view('layout/header');
      $this->load->view('layout/menu', $menu);
      $this->load->view('nosotros');
      $this->load->view('layout/footer');
   	  $this->load->view('layout/scripts');
  }
  public function manualDeUsuario() {
    $this->load->helper('download');
    $data = file_get_contents(base_url("/assets/manualDeUsuario.pub"));
    force_download("manualDeUsuario.pub", $data);
  }
  public function manualDeProgramador() {
    $this->load->helper('download');
    $data = file_get_contents(base_url("/assets/manualDeProgramador.pdf"));
    force_download("manualDeProgramador.pdf", $data);
  }
} ?>